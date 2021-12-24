<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
  /**
   * Новости
   */
    public function index()
    {
        $items = News::latest()->paginate(9);
        return view('frontend.news.index', compact('items'));
    }


    public function show($alias)
    {
        $item = News::where('alias', $alias)->first();
        $tops = News::orderBy('id', 'desc')->get();

        if (!$item) {
            abort(404);
        }

      return view('frontend.news.show', compact('item','tops'));
    }
}
