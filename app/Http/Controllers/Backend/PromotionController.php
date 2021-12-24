<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Promotion;
use Upload;
use Carbon\Carbon;

class PromotionController extends Controller
{
    public function index()
    {
    	$items = Promotion::latest()->paginate(10);
    	return view('backend.promotion.index', compact('items'));
    }

    public function form($id = null)
    {
    	$item = null;
    	if ($id) {
    		$item = Promotion::find($id);
    	}

    	return view('backend.promotion.form', compact('item'));
    }

    public function save(Request $request, $id = null)
    {
    	$this->validate($request, [
    		'title_ru' 		    => 'required',
    		'short_text_ru'     => 'required',
            'text_ru' 		    => 'required',
            'expiration_date'   => 'required|date:d-m-Y'
    	]);

    	$data = $request->only(
    		'title_ru',
    		'title_uz',
    		'short_text_ru',
    		'short_text_uz',
    		'text_ru',
            'text_uz',
            'expiration_date'
        );

        $data['expiration_date'] = Carbon::parse($data['expiration_date'])->format('Y-m-d');
    	if ($id) {
    		$item = Promotion::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
            $data['alias'] = \App\Library\Helper::getUniqueAlias(new Promotion, $data['title_ru']);
            // dd($data);
            $item = Promotion::create($data);
            $request->session()->flash('success', 'Created successfully!');
    	}

        if ($request->hasFile('file')) {
            Upload::saveFile('promotion', $item->id, $request->file('file'));
        }


    	return redirect()->action('Backend\PromotionController@index');
    }

    public function delete(Request $request, $id)
    {
        $item = Promotion::find($id);

        if ($item) {
            Upload::removeFile('promotion', $item->id);
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\PromotionController@index');
    }

    public function status($id)
    {
        $item = Promotion::find($id);
        
        if ($item) {
            $item->show = !$item->show;
            $item->save();
            
            return response()->json([
                'show' => $item->show
            ]);
        }

        return response()->json([
            'show' => 0
        ]);
    }
}
