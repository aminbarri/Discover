<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\destin;

use Illuminate\Support\Facades\Auth;
class DestinationController extends Controller
{
    public function show(){

      $user = Auth::user();
      $dest = Destin::where('id_user', $user->id)->get();
        return view('admin.desti.list',compact('dest'));
    }
    public function index_client(){
        $destination = Destin::all();
        return view(
            'client.destination.listDestnation',compact('destination')
        );
    }

    public function create(){
        return view('admin.desti.desti');
    }
    public function store(Request $request){



        $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:1000',
            'img1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $desti = new Destin();
        $desti->nom = $request->nom;
        $desti->ville = $request->ville;
        $desti->province = $request->province;
        $desti->description = $request->description;
        $desti->location = $request->location;



        if ($request->hasFile('img1')) {
           $img1 = $request->file('img1');
           $img1Name = time() . '_1.' . $img1->getClientOriginalExtension();
           $img1->move(public_path('img/desti'), $img1Name);
           $desti->img1 = 'img/desti/' . $img1Name;
       }


       if ($request->hasFile('img2')) {
           $img2 = $request->file('img2');
           $img2Name = time() . '_2.' . $img2->getClientOriginalExtension();
           $img2->move(public_path('img/desti'), $img2Name);
           $desti->img2 = 'img/desti/' . $img2Name;
       }


       if ($request->hasFile('img3')) {
           $img3 = $request->file('img3');
           $img3Name = time() . '_3.' . $img3->getClientOriginalExtension();
           $img3->move(public_path('img/desti'), $img3Name);
           $desti->img3 = 'img/desti/' . $img3Name;
       }
       $desti->id_user = Auth::id(); // Assign the authenticated user's ID to the `id` field

       $desti->save();

       // Redirect or return success message
       return redirect()->to('/destination')->with('success', 'Destination created successfully.');
    }

    public function edit($id_des)
    {
        return view('admin.desti.edit')
        ->with('destin',DESTIN::where('id_des',$id_des)->first());
    }
    public function update(Request $request,$id_des){


        $request->validate([
            'nom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:1000',
            'img1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $updateData = [];

        if ($request->hasFile('img1')) {
            $img1 = $request->file('img1');
            $img1Name = time() . '_1.' . $img1->getClientOriginalExtension();
            $img1->move(public_path('img/desti'), $img1Name);
            $updateData['img1'] = 'img/desti/' . $img1Name;
        }


        if ($request->hasFile('img2')) {
            $img2 = $request->file('img2');
            $img2Name = time() . '_2.' . $img2->getClientOriginalExtension();
            $img2->move(public_path('img/desti'), $img2Name);
            $updateData['img2'] = 'img/desti/' . $img2Name;
        }


        if ($request->hasFile('img3')) {
            $img3 = $request->file('img3');
            $img3Name = time() . '_3.' . $img3->getClientOriginalExtension();
            $img3->move(public_path('img/desti'), $img3Name);
            $updateData['img3'] = 'img/desti/' . $img3Name;
        }
        $updateData['nom'] = $request->nom;
        $updateData['ville'] = $request->ville;
        $updateData['province'] = $request->province;
        $updateData['description'] = $request->description;
        $updateData['location'] = $request->location;


        DESTIN::where('id_des', $id_des)->update($updateData);
        return redirect()->to('/destination')
        ->with('success','the post has been edited');

    }

    public function destroy($id_des){

        DESTIN::where('id_des' , $id_des)
        ->delete();
           return redirect()->to('/destination')
           ->with('success','the post has been Deleted');
       }
}
