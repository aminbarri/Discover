<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\restau;
use Illuminate\Support\Facades\DB;
use App\Models\platofrest;

use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        // Retrieve hotels created by this user
        $restau = RESTAU::where('user_id', $user->id)->get();

        return view('admin.restau.list', compact('restau'));
    }

    public function client_show()
    {
        $restau = RESTAU::all();
        return view('client.restaurant.restaurant', compact('restau'));
    }
    public function show_single($id_rest)
    {
        $plats = DB::table('plat')
            ->join('platofrest', 'plat.id_plat', '=', 'platofrest.id_plat')
            ->select('plat.*')
            ->where('platofrest.id_rest', '=', $id_rest)
            ->get();

        $restau = RESTAU::where('id_rest', $id_rest)->first();

        return view('client.restaurant.singleRestaurant', [
            'plats'  => $plats,
            'restau' => $restau
        ]);
    }

    public function create()
    {
        return view('admin.restau.restau');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'ville' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'description' => 'required|string',
            'location' => 'required|string|max:1000',
            'carte' => 'required|string|max:1000',
            'img1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $restau = new Restau();
        $restau->id_rest = $request->id_rest;
        $restau->nom = $request->nom;
        $restau->ville = $request->ville;
        $restau->province = $request->province;
        $restau->description = $request->description;
        $restau->location = $request->location;
        $restau->carte = $request->carte;



        if ($request->hasFile('img1')) {
            $img1 = $request->file('img1');
            $img1Name = time() . '_1.' . $img1->getClientOriginalExtension();
            $img1->move(public_path('img/restaus'), $img1Name);
            $restau->img1 = 'img/restaus/' . $img1Name;
        }


        if ($request->hasFile('img2')) {
            $img2 = $request->file('img2');
            $img2Name = time() . '_2.' . $img2->getClientOriginalExtension();
            $img2->move(public_path('img/restaus'), $img2Name);
            $restau->img2 = 'img/restaus/' . $img2Name;
        }


        if ($request->hasFile('img3')) {
            $img3 = $request->file('img3');
            $img3Name = time() . '_3.' . $img3->getClientOriginalExtension();
            $img3->move(public_path('img/restaus'), $img3Name);
            $restau->img3 = 'img/restaus/' . $img3Name;
        }
        $restau->user_id = Auth::id(); // Assign the authenticated user's ID to the `id` field

        $restau->save();

        // Redirect or return success message
        return redirect()->to('/restau')->with('success', 'Hotel created successfully.');
    }

    public function edit($id_rest)
    {
        return view('admin.restau.edit')
            ->with('restau', RESTAU::where('id_rest', $id_rest)->first());
    }

    public function update(Request $request, $id_rest)
    {

        $request->validate([
            'nom' => 'required|string|max:100',
            'ville' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'description' => 'required|string',
            'location' => 'required|string|max:1000',
            'carte' => 'required|string|max:1000',
            'img1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $updateData = [];

        if ($request->hasFile('img1')) {
            $img1 = $request->file('img1');
            $img1Name = time() . '_1.' . $img1->getClientOriginalExtension();
            $img1->move(public_path('img/restaus'), $img1Name);
            $updateData['img1'] = 'img/restaus/' . $img1Name;
        }


        if ($request->hasFile('img2')) {
            $img2 = $request->file('img2');
            $img2Name = time() . '_2.' . $img2->getClientOriginalExtension();
            $img2->move(public_path('img/restaus'), $img2Name);
            $updateData['img2'] = 'img/restaus/' . $img2Name;
        }


        if ($request->hasFile('img3')) {
            $img3 = $request->file('img3');
            $img3Name = time() . '_3.' . $img3->getClientOriginalExtension();
            $img3->move(public_path('img/restaus'), $img3Name);
            $updateData['img3'] = 'img/restaus/' . $img3Name;
        }
        $updateData['nom'] = $request->nom;
        $updateData['ville'] = $request->ville;
        $updateData['carte'] = $request->carte;
        $updateData['province'] = $request->province;
        $updateData['description'] = $request->description;
        $updateData['location'] = $request->location;
        $updateData['carte'] = $request->carte;


        RESTAU::where('id_rest', $id_rest)->update($updateData);
        return redirect()->to('/restau')
            ->with('message', 'the post has been edited');
    }
    public function destroy($id_rest)
    {

        RESTAU::where('id_rest', $id_rest)
            ->delete();
        return redirect()->to('/restau')
            ->with('message', 'the post has been Deleted');
    }
}
