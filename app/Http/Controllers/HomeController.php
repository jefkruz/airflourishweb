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

class HomeController extends Controller
{
    //

    public function __construct()
    {

        $this->data['hotels'] = Hotel::all();
        $this->data['tours'] = Tour::all();
        $this->data['quotes'] = Testimonial::all();
        $this->data['services'] = Service::all();
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


}
