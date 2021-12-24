<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use Upload;

class SliderController extends Controller
{
    public function index()
    {
    	$items = Slider::latest()->paginate(10);
    	return view('backend.slider.index', compact('items'));
    }

    public function form($id = null)
    {
    	$item = null;
    	if ($id) {
    		$item = Slider::find($id);
    	}

    	return view('backend.slider.form', compact('item'));
    }

    public function save(Request $request, $id = null)
    {
    	$this->validate($request, [
            'url_ru' 		=> 'required',
            'file_ru'       => 'required'
    	]);

    	$data = $request->only(
    		'url_ru',
    		'url_uz'
    	);

    	if ($id) {
    		$item = Slider::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
    		$item = Slider::create($data);
            $request->session()->flash('success', 'Created successfully!');
        }
        

        if ($request->hasFile('file_ru')) {
            Upload::saveFile('slider-ru', $item->id, $request->file('file_ru'));
        }

        if ($request->hasFile('file_uz')) {
            Upload::saveFile('slider-uz', $item->id, $request->file('file_uz'));
        }


    	return redirect()->action('Backend\SliderController@index');
    }

    public function delete(Request $request, $id)
    {
        $item = Slider::find($id);

        if ($item) {
            Upload::removeFiles('slider_ru', $item->id);
            Upload::removeFiles('slider_uz', $item->id);
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\SliderController@index');
    }
}
