<?php

namespace App\Http\Controllers\Backend;

use Upload;
use App\Models\Car;
use App\Models\Option;
use App\Models\CarColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function index()
    {
    	$items = Car::latest()->paginate(10);
    	return view('backend.car.index', compact('items'));
    }

    public function form($id = null)
    {
    	$item = null;
    	if ($id) {
    		$item = Car::find($id);
        }
        $options = Option::all();

    	return view('backend.car.form', compact('item', 'options'));
    }

    public function save(Request $request, $id = null)
    {
    	$this->validate($request, [
    		'name_ru' 		    => 'required',
    		'transmission'      => 'required',
    		'fuel_consumption' 	=> 'required',
    		'cargo_space' 	    => 'required',
    	]);

    	$data = $request->only(
    		'name_ru',
    		'name_uz',
    		'transmission',
    		'fuel_consumption',
    		'cargo_space',
    		'abs',
            'video',
    		'interior_ru',
    		'interior_uz',
    		'exterior_ru',
    		'exterior_uz'
    	);

    	if ($id) {
    		$item = Car::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
            $data['alias'] = \App\Library\Helper::getUniqueAlias(new Car, $data['name_ru']);
    		$item = Car::create($data);
            $request->session()->flash('success', 'Created successfully!');
    	}

        if ($request->has('deleted_interior_files')) {
            $deleted_interior_files = explode(',', $request->deleted_interior_files);
            Upload::removeFiles('interior', $item->id, $deleted_interior_files);
        }

        if ($request->hasFile('interior_files')) {
            Upload::saveFiles('interior', $item->id, $request->file('interior_files'));
        }

        if ($request->has('deleted_exterior_files')) {
            $deleted_exterior_files = explode(',', $request->deleted_exterior_files);
            Upload::removeFiles('exterior', $item->id, $deleted_exterior_files);
        }

        if ($request->hasFile('exterior_files')) {
            Upload::saveFiles('exterior', $item->id, $request->file('exterior_files'));
        }

        if ($request->hasFile('file')) {
            Upload::saveFile('car', $item->id, $request->file('file'));
        }

        if ($request->has('options')) {
            $item->options()->sync($request->options);
        }

    	return redirect()->action('Backend\CarController@index');
    }

    public function delete(Request $request, $id)
    {
        $item = Car::find($id);

        if ($item) {
            // Remove images
            Upload::removeFile('car', $item->id);
            Upload::removeFile('exterior', $item->id);
            Upload::removeFile('interior', $item->id);

            // Remove colors
            foreach ($item->colors as $c) {
                Upload::removeFile('car-color', $c->id);
            }
            $item->colors()->delete();

            // Remove positions
            \DB::table('option_position')->whereIn('position_id', $item->positions->pluck('id'));
            $item->positions()->delete();

            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\CarController@index');
    }

    public function colors($id)
    {
        $item = Car::find($id);

        if (!$item) {
            abort(404);
        }

        return view('backend.car.colors', compact('item'));
    }

    public function handleColors(Request $request, $id)
    {
        $car = Car::find($id);

        if (!$car) {
            abort(404);
        }

        $this->validate($request, [
    		'code' 		=> 'required',
    		'file'      => 'required'
    	]);

    	$data = $request->only(
    		'code'
    	);
        $data['car_id'] = $id;

        $item = CarColor::create($data);

        $request->session()->flash('success', 'Created successfully!');

        if ($request->hasFile('file')) {
            Upload::saveFile('car-color', $item->id, $request->file('file'));
        }

        return redirect()->action('Backend\CarController@colors', $id);
    }

    public function deleteColor(Request $request, $id)
    {
        $item = CarColor::find($id);
        
        $car_id = $item->car_id;
        if ($item) {
            Upload::removeFile('car-color', $item->id);
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\CarController@colors', $car_id);
    }
}
