<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Autoservice;

class AutoserviceController extends Controller
{

    public function show($alias)
    {
        $item = Autoservice::where('alias', $alias)->first();

        if (!$item) {
            abort(404);
        }
        return view('frontend.autoservice.show', compact('item'));
    }
}
