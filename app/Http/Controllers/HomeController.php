<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //


    public function home()
    {
      $data['page_title'] = 'Home';
      $data['slides'] = Slide::all();
      return view('pages.home',$data);
    }
    public function contact()
    {
        $data['page_title'] = 'Contact  Us';
        return view('pages.contact',$data);
    }
}
