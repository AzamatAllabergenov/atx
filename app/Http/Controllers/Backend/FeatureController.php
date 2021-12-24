<?php

namespace App\Http\Controllers\Backend;

use App\Models\Feature;
use App\Models\FeatureGroup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    public function index()
    {
		$items = Feature::latest()->paginate(10);
    	return view('backend.feature.index', compact('items'));
    }

    public function form($id = null)
    {
    	$item = null;
    	if ($id) {
    		$item = Feature::find($id);
    	}
		$groups = FeatureGroup::all()->pluck('name_ru', 'id');
    	return view('backend.feature.form', compact('item', 'groups'));
    }

    public function save(Request $request, $id = null)
    {
    	$this->validate($request, [
			'name_ru' 			=> 'required',
			'feature_group_id'	=> 'required|exists:feature_groups,id'
    	]);

    	$data = $request->only(
    		'name_ru',
			'name_uz',
			'feature_group_id'
    	);

    	if ($id) {
    		$item = Feature::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
    		$item = Feature::create($data);
            $request->session()->flash('success', 'Created successfully!');
        }

    	return redirect()->action('Backend\FeatureController@index');
    }

    public function delete(Request $request, $id)
    {
        $item = Feature::find($id);

        if ($item) {
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\FeatureController@index');
    }
}
