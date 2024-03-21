<?php

namespace App\Http\Controllers;

use App\Models\Booker;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Service;
use App\Models\Slide;
use App\Models\Testimonial;
use App\Models\Tour;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{
    //

    public function __construct()
    {


        $this->data['hotels'] = Hotel::all();
        $this->data['tours'] = Tour::all();
        $this->data['quotes'] = Testimonial::all();
        $this->data['services'] = Service::all();
       $this->data['posts'] = Post::latest()->paginate(3);
        $this->data['news'] = Post::limit(3)->latest()->get();
    }

    public function showRegistration($username = 'airflourish')
    {
        $data = $this->data;
        $data['reg_menu'] = true;
        $data['refer'] = Booker::whereUsername($username)->firstOrFail();
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

        ],[

            'email.unique' => 'This email is already taken.',
            'username.unique' => 'This username is already taken.',
            'username.alpha_dash' => 'The username may only contain letters, numbers, dashes, and underscores.',
            'username.min' => 'The username must be at least 4 characters.'

        ]);

        $refer = Booker::findOrFail($request->referral_id);

        $userExists = Booker::whereEmail($request->email)->orWhere('username', $request->username)->exists();
        if($userExists){
            return back()->withInput()->with('error', 'User exists already');
        }

        $user = new Booker();
        $user->referral_id = $refer->id;
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->country = $request->country;

        $user->save();
        session()->put('user',$user);
        return to_route('home');
    }

    public function home()
    {
        $data = $this->data;
      $data['page_title'] = 'Home';
        $data['home_menu'] = true;
      $data['slides'] = Slide::all();
      return view('pages.home',$data);
    }

    public function dashboard()
    {
        $data = $this->data;
        $data['page_title'] = 'Dashboard';
        $data['user'] = session('user');

        $data['dash_menu'] = true;
        return view('pages.dashboard',$data);
    }

    public function hotels()
    {
        $data = $this->data;
        $data['hotel_menu'] = true;
        $data['page_title'] = 'Hotels';
        return view('pages.hotels',$data);
    }
    public function news()
    {
        $data = $this->data;
        $data['blog_menu'] = true;
        $data['page_title'] = 'Our News';

        return view('pages.news', $data);
    }

    public function services()
    {
        $data = $this->data;
        $data['service_menu'] = true;
        $data['page_title'] = 'Our Services';

        return view('pages.services', $data);
    }

    public function tours()
    {
        $data = $this->data;
        $data['tour_menu'] = true;
        $data['page_title'] = 'Tours';

        return view('pages.tours', $data);
    }

    public function viewNews($slug)
    {
        $data = $this->data;
        $data['news'] = Post::where('slug',$slug)->firstOrFail();
        $news =  $data['news'];
        $data['blog_menu'] = true;
        $data['page_title'] = $news->title;

        return view('pages.view_news',$data);
    }

    public function contact()
    {
        $data = $this->data;
        $data['page_title'] = 'Contact  Us';
        $data['contact_menu'] = true;
        return view('pages.contact',$data);
    }

    public function logout()
    {
        session()->flush();
        return to_route('home');
    }
}
