<?php

namespace App\Http\Controllers\Backend;

use App\Models\Option;
use App\Models\Feature;

use App\Models\Position;
use App\Models\FeatureGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    public function index($car_id)
    {
    	$items = Position::latest()->where('car_id', $car_id)->paginate(10);
    	return view('backend.position.index', compact('items', 'car_id'));
    }

    public function form($car_id, $id = null)
    {
        $item = null;
        $fts = [];
    	if ($id) {
            $item = Position::find($id);
            $fts = $item->features->keyBy('id')->toArray();
        }
        $options = Option::all();
        $features = Feature::all()->groupBy('feature_group_id');
        $feature_groups = FeatureGroup::all()->pluck('name_ru', 'id')->toArray();

    	return view('backend.position.form', compact('item', 'options', 'car_id', 'fts', 'features', 'feature_groups'));
    }

    public function save(Request $request, $car_id, $id = null)
    {
    	$this->validate($request, [
            'name_ru' 		=> 'required',
            'cost'          => 'required',
            'options'       => 'array'
    	]);

    	$data = $request->only(
    		'name_ru',
    		'name_uz',
    		'cost'
        );
        $data['car_id'] = $car_id;

    	if ($id) {
    		$item = Position::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
    		$item = Position::create($data);
            $request->session()->flash('success', 'Created successfully!');
        }
        // dd($item);
        $item->features()->sync($request->features);
        $item->options()->sync($request->options);

    	return redirect()->action('Backend\PositionController@index', $car_id);
    }

    public function delete(Request $request, $id)
    {
        $item = Position::find($id);

        if ($item) {
            $item->options()->sync([]);
            $item->features()->sync([]);
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\PositionController@index');
    }
}
