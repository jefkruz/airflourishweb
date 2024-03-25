<?php

namespace App\Http\Controllers;

use App\Models\Booker;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function __construct()
    {

        $this->data['hotels'] = Hotel::all();
        $this->data['tours'] = Tour::all();
        $this->data['quotes'] = Testimonial::all();
        $this->data['services'] = Service::all();
    }

    public function authorizeLogin(Request $request)
    {

        $accessToken = $request->accessToken;
        $profile = $this->fetchKcProfile($accessToken)->profile;
        $image =$profile->user->avatar_url;
        $phone = $profile->phone_number;
        $username = $profile->user->username;
        $phone = str_replace('+', '', $phone);

        $user = User::where('phone', $phone)->orWhere('username', $username)->first();

        if(!$user){
            $user = new User();
            $user->first_name = $profile->user->name;

        }

            $user->email = $profile->email->address;
            $user->phone = $profile->phone_number;
            $user->username = $profile->user->username;
            $user->image = $profile->user->avatar_url;
            $user->token = md5(time(). uniqid());
            $user->save();
            return redirect()->route('kc.login',$user->token);


    }

    public function successfulKcLogin($token)
    {
        $user = User::whereToken($token)->firstOrFail();
        $user->token = null;
        $user->save();
        session()->put('user', $user);
        return to_route('dashboard');
    }


    public function showRegistration($username = 'airflourish')
    {
        $data = $this->data;
        $data['reg_menu'] = true;
        $data['refer'] = User::whereUsername($username)->firstOrFail();
        $data['countries'] = Country::all();
        $data['page_title'] = 'Register';
        return view('pages.register',$data);
    }

    public function showLogin()
    {
        $data = $this->data;
        $data['log_menu'] = true;
        $data['page_title'] = 'Login';
        return view('pages.login',$data);
    }

    public function login(Request $request)
    {
        $user = Booker::whereEmail($request->login)->orWhere('username', $request->login)->first();
        if(!$user){
            return back()->withInput()->with('error', 'No Account fund for this User');
        }
        session()->put('user',$user);
        return to_route('dashboard');

    }

    public function register(Request $request)
    {
        $request->validate([
            'referral_id' => 'required',
            'email' => 'required|unique:users|email',
            'username' => 'unique:bookers|alpha_dash|min:4',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'password' => 'required|confirmed|min:6',

        ],[

            'email.unique' => 'This email is already taken.',
            'min' => 'The password must be at least 6 characters.',
            'username.unique' => 'This username is already taken.',
            'username.alpha_dash' => 'The username may only contain letters, numbers, dashes, and underscores.',
            'username.min' => 'The username must be at least 4 characters.'

        ]);

        $refer = User::findOrFail($request->referral_id);

        $userExists = User::whereEmail($request->email)->orWhere('username', $request->username)->exists();
        if($userExists){
            return back()->withInput()->with('error', 'User exists already');
        }

        $user = new User();
        $user->referral_id = $refer->id;
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->country = $request->country;
        $user->password =  bcrypt($request->password);
        $user->token =  null;

        $user->save();
        session()->put('user',$user);
        return to_route('dashboard');
    }

    public function logout()
    {
        session()->flush();
        return to_route('home');
    }

    private function fetchKcProfile($accessToken)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://connect.kingsch.at/api/profile',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $accessToken
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);

    }

}
