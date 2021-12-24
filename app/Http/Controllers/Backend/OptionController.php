<?php

namespace App\Http\Controllers\Backend;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
    public function index()
    {
    	$items = Option::latest()->paginate(10);
    	return view('backend.option.index', compact('items'));
    }

    public function form($id = null)
    {
    	$item = null;
    	if ($id) {
    		$item = Option::find($id);
    	}

    	return view('backend.option.form', compact('item'));
    }

    public function save(Request $request, $id = null)
    {
    	$this->validate($request, [
    		'name_ru' 		=> 'required|unique:options,name_ru',
            'name_uz'       => 'required|unique:options,name_uz',
    	]);

    	$data = $request->only(
    		'name_ru',
    		'name_uz'
    	);

    	if ($id) {
    		$item = Option::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
    		$item = Option::create($data);
            $request->session()->flash('success', 'Created successfully!');
        }

    	return redirect()->action('Backend\OptionController@index');
    }

    public function delete(Request $request, $id)
    {
        $item = Option::find($id);

        if ($item) {
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\OptionController@index');
    }
}
