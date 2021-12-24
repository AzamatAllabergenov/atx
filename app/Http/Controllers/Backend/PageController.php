<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function dashboard()
    {
    	return view('backend.page.dashboard');
    }

    public function index()
    {
    	$items = Page::latest()->paginate(10);
    	return view('backend.page.index', compact('items'));
    }

    public function form($id = null)
    {
    	$item = null;
    	if ($id) {
    		$item = Page::find($id);
    	}

    	return view('backend.page.form', compact('item'));
    }

    public function save(Request $request, $id = null)
    {
    	$this->validate($request, [
    		'title_ru' 		=> 'required',
    		'text_ru' 		=> 'required',
    	]);

    	$data = $request->only(
    		'title_ru',
    		'title_uz',
    		'text_ru',
    		'text_uz'
    	);

    	if ($id) {
    		$item = Page::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
            $data['alias'] = \App\Library\Helper::getUniqueAlias(new Page, $data['title_ru']);
    		$item = Page::create($data);
            $request->session()->flash('success', 'Created successfully!');
    	}


    	return redirect()->action('Backend\PageController@index');
    }

    public function delete(Request $request, $id)
    {
        $item = Page::find($id);

        if ($item) {
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\PageController@index');
	}
	
	public function fm()
    {
    	return view('backend.page.fm');
    }
}
