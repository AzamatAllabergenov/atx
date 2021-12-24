<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Autoservice;
use Upload;

class AutoserviceController extends Controller
{
    public function index()
    {
    	$items = Autoservice::latest()->paginate(10);
    	return view('backend.autoservice.index', compact('items'));
    }

    public function form($id = null)
    {
    	$item = null;
    	if ($id) {
    		$item = Autoservice::find($id);
    	}

    	return view('backend.autoservice.form', compact('item'));
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
    		$item = Autoservice::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
            $data['alias'] = \App\Library\Helper::getUniqueAlias(new Autoservice, $data['title_ru']);
    		$item = Autoservice::create($data);
            $request->session()->flash('success', 'Created successfully!');
    	}

        if ($request->hasFile('file')) {
            Upload::saveFile('autoservice', $item->id, $request->file('file'));
        }


    	return redirect()->action('Backend\AutoserviceController@index');
    }

    public function delete(Request $request, $id)
    {
        $item = Autoservice::find($id);

        if ($item) {
            Upload::removeFile('autoservice', $item->id);
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\AutoserviceController@index');
    }
}
