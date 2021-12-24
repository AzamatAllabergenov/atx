<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Upload;

class NewsController extends Controller
{
    public function index()
    {
    	$items = News::latest()->paginate(10);
    	return view('backend.news.index', compact('items'));
    }

    public function form($id = null)
    {
    	$item = null;
    	if ($id) {
    		$item = News::find($id);
    	}

    	return view('backend.news.form', compact('item'));
    }

    public function save(Request $request, $id = null)
    {
    	$this->validate($request, [
    		'title_ru' 		=> 'required',
    		'short_text_ru' => 'required',
    		'text_ru' 		=> 'required',
    	]);

    	$data = $request->only(
    		'title_ru',
    		'title_uz',
    		'short_text_ru',
    		'short_text_uz',
    		'text_ru',
    		'text_uz'
    	);

    	if ($id) {
    		$item = News::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
            $data['alias'] = \App\Library\Helper::getUniqueAlias(new News, $data['title_ru']);
    		$item = News::create($data);
            $request->session()->flash('success', 'Created successfully!');
    	}

        if ($request->hasFile('file')) {
            Upload::saveFile('news', $item->id, $request->file('file'));
        }

    	return redirect()->action('Backend\NewsController@index');
    }

    public function delete(Request $request, $id)
    {
        $item = News::find($id);

        if ($item) {
            Upload::removeFile('news', $item->id);
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\NewsController@index');
    }
}
