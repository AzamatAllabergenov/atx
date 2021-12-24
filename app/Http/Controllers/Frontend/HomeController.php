<?php

namespace App\Http\Controllers\Frontend;

use Mail;
use Carbon\Carbon;

use App\Models\Car;
use App\Models\News;
use App\Models\Page;
use App\Mail\Contact;
use App\Models\Slider;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

        $news = News::latest()->limit(3)->get();
        $sliders = Slider::latest()->limit(6)->get();
        $cars = Car::latest()->get();
        
        return view('frontend.page.index',compact('news','sliders','cars'));
    }

     public function show($alias)
    {
        $item = Page::where('alias', $alias)->first();

        if (!$item) {
            abort(404);
        }

        return view('frontend.page.show', compact('item'));
    }




}
