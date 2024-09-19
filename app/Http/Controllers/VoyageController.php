<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\voyage;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class VoyageController extends Controller
{

    public function index(){

        $voyage=DB::table('voyage')->get();
        return view ('client.voyage.voyage',compact('voyage'));
    }
    public function showsingle($id_voy){
        $voyage = voyage::where('id_voy',$id_voy)->first();
        return view('client.voyage.resvoyage',compact('voyage'));
    }
 public function  show(){
    $user = Auth::user();
        
    // Retrieve hotels created by this user
    $voyage = VOYAGE::where('id_user', $user->id)->get();

    return view('admin.travel.list',compact('voyage'));
 }

 public function create(){
    return view('admin.travel.travel');
 }
 public function store(Request $request){
    $request->validate([
        
            'ville_depart' => 'required|string|max:255',
            'ville_arrive' => 'required|string|max:255',
            'trajet' => 'required|string|max:10000',
            'date_depart' => 'required|date',
            'heure_depart' => 'required|date_format:H:i',
            'dure' => 'required|integer',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max size of 2MB for image
            'carte' => 'nullable|string|max:1000',
            'prix' => 'required|numeric|min:0',
        ]
    );
        $voyage = new Voyage();
        $voyage->ville_depart = $request->ville_depart;
        $voyage->ville_arrive = $request->ville_arrive;
        $voyage->trajet = $request->trajet;
        $voyage->date_depart = $request->date_depart;
        $voyage->heure_depart = $request->heure_depart;
        $voyage->dure = $request->dure;
        $voyage->carte = $request->carte;
        $voyage->prix = $request->prix;
        $voyage->id_user = Auth::id();
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . '_3.' . $img->getClientOriginalExtension();
            $img->move(public_path('img/voyage'), $imgName);
            $voyage->img = 'img/voyage/' . $imgName;
        }
        $voyage->save();

    // Redirect or return success message
    return redirect()->to('/voyage')->with('success', 'Hotel created successfully.');
 }
 public function edit($id_voy){
    return view('admin.travel.edit')
    ->with('voyage',VOYAGE::where('id_voy',$id_voy)->first());
 }
 public function update(Request $request,$id_voy){
    $request->validate([
        
        'ville_depart' => 'required|string|max:255',
        'ville_arrive' => 'required|string|max:255',
        'trajet' => 'required|string|max:10000',
        'date_depart' => 'required|date',
        'heure_depart' => 'required|date_format:H:i',
        'dure' => 'required|integer',
        'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max size of 2MB for image
        'carte' => 'nullable|string|max:1000',
        'prix' => 'required|numeric|min:0',
    ]
);
$updateData = [];
if ($request->hasFile('img')) {
    $img = $request->file('img');
    $imgName = time() . '_3.' . $img->getClientOriginalExtension();
    $img->move(public_path('img/voyage'), $imgName);
    $updateData['img']->img = 'img/voyage/' . $imgName;
}
$updateData['ville_depart'] = $request->ville_depart;
$updateData['ville_arrive'] = $request->ville_arrive;
$updateData['trajet'] = $request->trajet;
$updateData['date_depart'] = $request->date_depart;
$updateData['heure_depart'] = $request->heure_depart;
$updateData['dure'] = $request->dure;
$updateData['carte'] = $request->carte;
$updateData['prix'] = $request->prix;



VOYAGE::where('id_voy', $id_voy)->update($updateData);
return redirect()->to('/voyage')
->with('message','the post has been edited');






 }
 public function destroy($id_voy){
    VOYAGE::where('id_voy' , $id_voy)
    ->delete();
       return redirect()->to('/voyage')
       ->with('message','the post has been Deleted');
 }
}
