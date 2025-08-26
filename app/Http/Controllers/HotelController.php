<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{

    public function index(){
        $hotel = DB::table('hotels')->get();
                return view ('client.hotel.hotel',compact('hotel'));
    }

    public function showsingle($id_hotel){
        $hotel = hotel::where('id_hotel', $id_hotel)->first();
         return view('client.hotel.reshotel', compact('hotel'));
     }
    public function show(){

        $user = Auth::user();

        // Retrieve hotels created by this user
        $hotel = Hotel::where('id', $user->id)->get();

        return view('admin.hotel.list', compact('hotel'));
    }
     public function create()
    {
        return view('admin.hotel.hotel');
    }

    public function store(Request $request)
    {
    // Validate the incoming request data
    $request->validate([
        'nom' => 'required|string|max:255',
        'ville' => 'required|string|max:255',
        'carte' => 'required|string|max:10000',
        'chambre' => 'required|integer',
        'classe' => 'required|integer',
        'location' => 'required|string|max:1000',
        'prix' => 'required|numeric',
        'img1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'img2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'img3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Create a new Hotel instance
    $hotel = new Hotel;
    $hotel->nom = $request->nom;
    $hotel->ville = $request->ville;
    $hotel->carte = $request->carte;
    $hotel->chambre = $request->chambre;
    $hotel->classe = $request->classe;
    $hotel->location = $request->location;
    $hotel->prix = $request->prix;
    $hotel->pets_allowed = $request->pets_allowed ?? 0;
    $hotel->refrigerator = $request->refrigerator ?? 0;
    $hotel->swimming_pool = $request->swimming_pool ?? 0;
    $hotel->free_parking = $request->free_parking ?? 0;
    $hotel->kitchen = $request->kitchen ?? 0;
    $hotel->living_room = $request->living_room ?? 0;

    // Handle image uploads
    if ($request->hasFile('img1')) {
        $img1 = $request->file('img1');
        $img1Name = time() . '_1.' . $img1->getClientOriginalExtension();
        $img1->move(public_path('img/hotels'), $img1Name);
        $hotel->img1 = 'img/hotels/' . $img1Name;
    }

    else{
        $hotel->img1  =null;
    }

    if ($request->hasFile('img2')) {
        $img2 = $request->file('img2');
        $img2Name = time() . '_2.' . $img2->getClientOriginalExtension();
        $img2->move(public_path('img/hotels'), $img2Name);
        $hotel->img2 = 'img/hotels/' . $img2Name;
    }
    else{
        $hotel->img2  =null;
    }

    if ($request->hasFile('img3')) {
        $img3 = $request->file('img3');
        $img3Name = time() . '_3.' . $img3->getClientOriginalExtension();
        $img3->move(public_path('img/hotels'), $img3Name);
        $hotel->img3 = 'img/hotels/' . $img3Name;
    }
    else{
        $hotel->img3  =null;
    }

    $hotel->id = Auth::id();
    // Save the hotel to the database
    $hotel->save();

    // Redirect or return success message
    return redirect()->to('/hotel')->with('success', 'Hotel created successfully.');
    }

    public function edit($id_hotel)
    {
        return view('admin.hotel.edit')
        ->with('hotels',HOTEL::where('id_hotel',$id_hotel)->first());
    }
    public function update(Request $request, $id_hotel)
    {
        $request->validate([
        'nom' => 'required|string|max:255',
        'ville' => 'required|string|max:255',
        'carte' => 'required|string|max:10000',
        'chambre' => 'required|integer',
        'classe' => 'required|integer',
        'location' => 'required|string|max:1000',
        'prix' => 'required|numeric',
        'img1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'img2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'img3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $updateData = [];

        if ($request->hasFile('img1')) {
            $img1 = $request->file('img1');
            $img1Name = time() . '_1.' . $img1->getClientOriginalExtension();
            $img1->move(public_path('img/hotels'), $img1Name);
            $updateData['img1'] = 'img/hotels/' . $img1Name;
        }

        if ($request->hasFile('img2')) {
            $img2 = $request->file('img2');
            $img2Name = time() . '_2.' . $img2->getClientOriginalExtension();
            $img2->move(public_path('img/hotels'), $img2Name);
            $updateData['img2'] = 'img/hotels/' . $img2Name;
        }

        if ($request->hasFile('img3')) {
            $img3 = $request->file('img3');
            $img3Name = time() . '_3.' . $img3->getClientOriginalExtension();
            $img3->move(public_path('img/hotels'), $img3Name);
            $updateData['img3'] = 'img/hotels/' . $img3Name;
        }
        // Updating other fields
        $updateData['nom'] = $request->nom;
        $updateData['ville'] = $request->ville;
        $updateData['carte'] = $request->carte;
        $updateData['chambre'] = $request->chambre;
        $updateData['classe'] = $request->classe;
        $updateData['location'] = $request->location;
        $updateData['prix'] = $request->prix;
        $updateData['prix'] = $request->prix;
        $updateData['pets_allowed'] = $request->pets_allowed ?? 0;
        $updateData['refrigerator'] = $request->refrigerator ?? 0;
        $updateData['swimming_pool'] = $request->swimming_pool ?? 0;
        $updateData['free_parking'] = $request->free_parking ?? 0;
        $updateData['kitchen'] = $request->kitchen ?? 0;
        $updateData['living_room'] = $request->living_room ?? 0;

        // Perform the update in one call
        HOTEL::where('id_hotel', $id_hotel)->update($updateData);
        return redirect()->to('/hotel')
        ->with('success','the Hotel has been edited');
        }
        public function destroy($id_hotel){

            Hotel::where('id_hotel' , $id_hotel)
            ->delete();
                return redirect()->to('/hotel')
                ->with('success','the post has been Deleted');
        }
}
