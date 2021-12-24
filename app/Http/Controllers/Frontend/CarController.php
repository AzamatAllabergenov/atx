<?php

namespace App\Http\Controllers\Frontend;

use App;
use App\Models\Car;
use App\Models\CarColor;
use App\Models\Option;
use App\Models\Feature;
use App\Models\Position;
use App\Models\FeatureGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function show($alias){

        $item = Car::where('alias', $alias)->with('positions')->first();

        if (!$item) {
            abort(404);
        }

        $available_options = $item->options->pluck('id');
        $options = Option::whereIn('id', $available_options)->get();

        return view('frontend.car.show', compact('item', 'options'));
    }

    public function compare()
    {
        $cars = Car::with('positions')->get();
        $features = Feature::all()->groupBy('feature_group_id');
        $feature_groups = FeatureGroup::all()->pluck('name_'.App::getLocale(), 'id')->toArray();

        return view('frontend.car.compare', compact('cars', 'features', 'feature_groups'));
    }

    public function position($id)
    {
        $position = Position::find($id);
        if (!$position) {
            return response()->json([]);
        }
        $features = $position->features->pluck('pivot.value_'.App::getLocale(), 'id')->toArray();
        $features['0'] = number_format($position->cost, 0, 0, ' ');
        return response()->json([
            'url' => action('Frontend\CarController@show', $position->car->alias),
            'features' => $features
        ]);
    }

}
