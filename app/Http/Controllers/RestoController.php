<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestoController extends Controller
{
    //
    function index()
    {
        return "all is well";
    }
    function home()
    {
        return view('home');
    }
    function list()
    {
        $data = Restaurant::all();
        return view('list', ["data" => $data]);
    }

    function add()
    {
        return view('add');
    }

    function add_record(Request $request)
    {


        $request->validate([
            "name" => "required",
            "email" => "required",
            "address" => "required",
            "image" => "required|mimes:jpg,png,jpeg|max:5048",
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
      

        $restaurant =    new  Restaurant;
        $restaurant->name = $request->name;
        $restaurant->email = $request->email;
        $restaurant->address = $request->address;
        $restaurant->image_path =  $newImageName;
        $restaurant->save();
        $request->image->move(public_path('images'), $newImageName);
        $request->session()->flash('status', 'Restaurant ' . $restaurant->name . ' added successfully');
        return redirect('/list');
    }

    function delete($id, Request $request)
    {
        $deleteR = Restaurant::find($id);
        $request->session()->flash('status', 'Restaurant ' . $deleteR->name . ' deleted successfully');

        $deleteR->delete();
        return redirect('/list');
    }

    function edit($id)
    {
        $editR = Restaurant::find($id);
        return view('edit', ["editR" => $editR]);
    }

    function edit_record($id, Request $request)
    {
       
        $editR = Restaurant::find($id);
        // dd("hi");
        // $request->validate([
        //     "name" => "required",
        //     "email" => "required",
        //     "address" => "required",
        //     "image" => "required|mimes:jpg,png,jpeg|max:5048",
        // ]);
      
        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        
        $editR->name = $request->name;
        $editR->email = $request->email;
        $editR->address = $request->address;
        $editR->image_path =  $newImageName;
        
        $editR->save();
        
        $request->image->move(public_path('images'), $newImageName);
        $request->session()->flash('status', 'Restaurant ' . $editR->name . ' Edited successfully');
        return redirect("/list");
    }


    function sessionLogin(Request $request)
    {
        $userData = $request->all();
        $request->session()->put('username', $userData['username']);
        return redirect('/list');
    }

    function sessionLogout(Request $request)
    {
        $username =   $request->session()->pull('username');

        return redirect('/session/login');
    }

    function download($id){
        $resto =  Restaurant::find($id); 
        $imagePath = public_path("images/".$resto->image_path);
        return response()->download($imagePath);
        
    }
}
