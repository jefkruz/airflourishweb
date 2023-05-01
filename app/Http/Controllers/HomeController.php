<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //


    public function home()
    {
      $data['page_title'] = 'Home';
      return view('pages.home',$data);
    }
    public function contact()
    {
        $data['page_title'] = 'Contact  Us';
        return view('pages.contact',$data);
    }
}
