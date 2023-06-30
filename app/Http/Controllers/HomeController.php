<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Slide;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{
    //

    public function __construct()
    {


        $this->data['hotels'] = Hotel::all();
       $this->data['posts'] = Post::latest()->paginate(3);
        $this->data['news'] = Post::limit(3)->latest()->get();
    }

    public function home()
    {
        $data = $this->data;
      $data['page_title'] = 'Home';
        $data['home_menu'] = true;
      $data['slides'] = Slide::all();
      return view('pages.home',$data);
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
        $data['page_title'] = 'Contact  Us';
        return view('pages.contact',$data);
    }
}
