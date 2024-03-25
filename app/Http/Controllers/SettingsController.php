<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function showSecurityForm()
    {
        $m = new MenuController();
        $data['page_title'] = 'Security Settings';
        $data['menu'] = $m->fetchMenu();
        return view('pages.security', $data);
    }

    public function showUserAccessForm()
    {
        $m = new MenuController();
        $data['page_title'] = 'User Access';
        $data['menu'] = $m->fetchMenu();
        $data['users'] = User::where('role', '!=', 'admin')->get();
        return view('pages.user_access', $data);
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $userExists = User::whereEmail($request->email)->exists();
        if($userExists){
            return back()->with('error', 'User exists already');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();

        return back()->with('message', 'User has been added successfully');
    }

    public function toggleUserAccess($id)
    {
        $user = User::findOrFail($id);
        $user->status = ($user->status == 'active') ? 'inactive' : 'active';
        $user->save();
        return back()->with('message', 'User access modified');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::findOrFail(Session::get('user')->id);
        $validated = password_verify($request->current_password, $user->password);
        if(!$validated){
            return back()->with('error', 'Incorrect password');
        }
        $user->password = bcrypt($request->password);
        $user->save();
        return back()->with('message', 'Password updated successfully');
    }
}
