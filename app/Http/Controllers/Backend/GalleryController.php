<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Album;
use Upload;

class GalleryController extends Controller
{
    public function index()
    {
    	$items = Album::latest()->paginate(10);
    	return view('backend.gallery.index', compact('items'));
    }

    public function form($id = null)
    {
    	$item = null;
    	if ($id) {
    		$item = Album::find($id);
    	}

    	return view('backend.gallery.form', compact('item'));
    }

    public function save(Request $request, $id = null)
    {
    	$this->validate($request, [
    		'name_ru' 		=> 'required',
    	]);

    	$data = $request->only(
    		'name_ru',
    		'name_uz'
    	);

    	if ($id) {
    		$item = Album::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
    		$item = Album::create($data);
            $request->session()->flash('success', 'Created successfully!');
        }
        
        if ($request->has('deleted_files')) {
            $deleted_files = explode(',', $request->deleted_files);
            Upload::removeFiles('gallery', $item->id, $deleted_files);
        }

        if ($request->hasFile('files')) {
            Upload::saveFiles('gallery', $item->id, $request->file('files'));
        }


    	return redirect()->action('Backend\GalleryController@index');
    }

    public function delete(Request $request, $id)
    {
        $item = Album::find($id);

        if ($item) {
            Upload::removeFiles('gallery', $item->id);
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\GalleryController@index');
    }
}
