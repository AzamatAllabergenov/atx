<?php

namespace App\Http\Controllers\Backend;

use App\Models\FeatureGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureGroupController extends Controller
{
    public function index()
    {
    	$items = FeatureGroup::latest()->paginate(10);
    	return view('backend.feature_group.index', compact('items'));
    }

    public function form($id = null)
    {
    	$item = null;
    	if ($id) {
    		$item = FeatureGroup::find($id);
    	}

    	return view('backend.feature_group.form', compact('item'));
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
    		$item = FeatureGroup::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
    		$item = FeatureGroup::create($data);
            $request->session()->flash('success', 'Created successfully!');
        }

    	return redirect()->action('Backend\FeatureGroupController@index');
    }

    public function delete(Request $request, $id)
    {
        $item = FeatureGroup::find($id);

        if ($item) {
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\FeatureGroupController@index');
    }
}
