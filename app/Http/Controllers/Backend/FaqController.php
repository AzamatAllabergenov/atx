<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
    	$items = Faq::latest()->paginate(10);
    	return view('backend.faq.index', compact('items'));
    }

    public function form($id = null)
    {
    	$item = null;
    	if ($id) {
    		$item = Faq::find($id);
    	}

    	return view('backend.faq.form', compact('item'));
    }

    public function save(Request $request, $id = null)
    {
    	$this->validate($request, [
    		'question_ru' 		=> 'required',
    		'answer_ru' 		=> 'required',
    	]);

    	$data = $request->only(
    		'question_ru',
    		'question_uz',
    		'answer_ru',
    		'answer_uz'
    	);

    	if ($id) {
    		$item = Faq::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
    		$item = Faq::create($data);
            $request->session()->flash('success', 'Created successfully!');
    	}


    	return redirect()->action('Backend\FaqController@index');
    }

    public function delete(Request $request, $id)
    {
        $item = Faq::find($id);

        if ($item) {
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\FaqController@index');
    }
}
