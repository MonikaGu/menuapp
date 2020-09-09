<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller{
    public function index(Request $request){
        if(isset($request->menu_id) && $request->menu_id !== 0)
            $restaurants = \App\Restaurant::where('menu_id', $request->menu_id)->orderBy('title')->get();
        else
            $restaurants = \App\Restaurant::orderBy('title')->get();
        $menus = \App\Menu::orderBy('title')->get();
        return view('restaurants.index', ['restaurants' => $restaurants, 'menus' => $menus]);
    }
    // ATTENTION :: we need countries to be able to assign them
    public function create(){
        $menus = \App\Menu::orderBy('title')->get();
        return view('restaurants.create', ['menus' => $menus]);
    }
    public function store(Request $request){
        $restaurant = new Restaurant();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $restaurant->fill($request->all());
        $restaurant->save();
        return redirect()->route('restaurant.index');
    }
    public function show(Restaurant $restaurant){
        //
    }
    // ATTENTION :: we need countries to be able to assign them
    public function edit(Restaurant $restaurant){
        $menus = \App\Menu::orderBy('title')->get();
        return view('restaurants.edit', ['restaurant' => $restaurant, 'menus' => $menus]);
    }
    public function update(Request $request, Restaurant $restaurant){
        $restaurant->fill($request->all());
        $restaurant->save();
        return redirect()->route('restaurant.index');
    }
    public function destroy(Restaurant $restaurant, Request $request){
        $restaurant->delete();
        // return redirect()->route('restaurant.index');
        return redirect()->route('restaurant.index', ['menu_id'=>$request->input('menu_id')]);
    }
}