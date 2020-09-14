<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        return view('menus.index', ['menus' => Menu::orderBy('title')->orderBy('price', 'asc')->get() ]);
    }
    public function create() {
        return view('menus.create');
    }
    public function store(Request $request) {
       
        // $this->validate($request, [
        //     // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
        //     // galime pažiūrėti, kas bus jei bus neteisingas
        //        'title' => 'required',
        //        'price' => 'required',
        //        'weight' => 'required',
        //        'meat' => 'required',
        //        'about' => 'required',
        //    ]);
        if (empty($request['title']) && empty($request['price']) && empty($request['weight']) && empty($request['meat']) && empty($request['about'])) {
            return redirect('/menu')->with('status_error', 'Įveskite duomenis!'); 
        }
     // can be used for seeing the insides of the incoming request
        //  var_dump($request->all()); die();
        $menu = new Menu();
        $menu->fill($request->all());
        $menu->save();
        // return redirect()->route('menu.index');
        return redirect('/menu')->with('status_success', 'Duomenys įvesti!');
    }

    public function edit(Menu $menu){
        return view('menus.edit', ['menu' => $menu]);
    }
 
    public function update(Request $request, Menu $menu){
        $menu->fill($request->all());
        $menu->save();
        return redirect()->route('menu.index');
    }
 
     public function destroy(Menu $menu){
         $menu->delete();
         return redirect()->route('menu.index');
     }
}
 
 