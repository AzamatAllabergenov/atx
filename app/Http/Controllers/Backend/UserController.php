<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
    	$items = User::latest()->paginate(10);
    	return view('backend.user.index', compact('items'));
    }

    public function form($id = null)
    {
    	$item = null;
    	if ($id) {
    		$item = User::find($id);
    	}

    	return view('backend.user.form', compact('item'));
    }

    public function save(Request $request, $id = null)
    {
    	$this->validate($request, [
            'name' 		=> 'required',
            'email'     => 'required',
            'password'  => 'min:6'
    	]);

    	$data = $request->only(
            'name',
            'email'
    	);
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }
    	if ($id) {
    		$item = User::find($id);

    		if ($item) {
    			$item->update($data);
                $request->session()->flash('success', 'Updated successfully!');
    		}
    	} else {
    		$item = User::create($data);
            $request->session()->flash('success', 'Created successfully!');
        }

    	return redirect()->action('Backend\UserController@index');
    }

    public function delete(Request $request, $id)
    {
        $item = User::find($id);

        if ($item && $item->id != 1) {
            $item->delete();
            $request->session()->flash('success', 'Deleted successfully!');
        }

        return redirect()->action('Backend\UserController@index');
    }
}
