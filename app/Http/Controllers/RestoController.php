<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestoController extends Controller
{
    //
    function index(){
        return "all is well";
    }
    function home(){
        return view('home');
    }
    function list(){
        $data = Restaurant::all();
        return view('list' , ["data" => $data]);
    }

    function add(){
        return view('add');
    }

    function add_record(Request $request){
        
       $restaurant =    new  Restaurant;
       $restaurant->name = $request->name ;
       $restaurant->email = $request->email ;
       $restaurant->address = $request->address ;
       $restaurant->save();
        $request->session()->flash('status', 'Restaurant '. $restaurant->name .' added successfully');
        return redirect('/list');
    }

    function delete($id , Request $request ){
       $deleteR = Restaurant::find($id);
       $request->session()->flash('status', 'Restaurant '. $deleteR->name .' deleted successfully');
 
       $deleteR->delete();
             return redirect('/list');
    }

    function edit($id){
        $editR = Restaurant::find($id);
        return view('edit' , ["editR" =>$editR]);
            
     }

     function edit_record($id  , Request $request ){
        $editR = Restaurant::find($id);

        $editR->name = $request->name;
        $editR->email = $request->email;
        $editR->address = $request->address;
        $editR->save();
        $request->session()->flash('status', 'Restaurant '. $editR->name .' Edited successfully');
        return redirect("/list");
     }
}
