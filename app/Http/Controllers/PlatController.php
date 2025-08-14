<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlatRequest;
use Illuminate\Http\Request;
use App\Models\plat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlatController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $plat = PLAT::where('id_user', $user->id)->get();

        return view('admin.plat.list', compact('plat'));
    }
    public function index($id_rest)
    {
        $plat = DB::table('platofrest')
            ->join('plat', 'platofrest.id_plat', '=', 'plat.id_plat')
            ->join('restau', 'platofrest.id_rest', '=', 'restau.id_rest')
            ->select('plat.*', 'restau.nom as restaurant_name', 'restau.description as restaurant_description')
            ->where('restau.id_rest', '=', $id_rest)
            ->get();
        $restau = DB::table('restau')->where('id_rest', '=', $id_rest)->first();

        return view('admin.restau.addplat', compact('plat', 'restau'));
    }
    public function create()
    {
        return view('admin.plat.plat');
    }

    public function store(PlatRequest $request)
    {
        $request->validated();

        $plat = new plat();
        $plat->id_plat     = $request->id_plat;
        $plat->nom = $request->nom;
        $plat->description = $request->description;
        if ($request->hasFile('img1')) {
            $img1 = $request->file('img1');
            $img1Name = time() . '_1.' . $img1->getClientOriginalExtension();
            $img1->move(public_path('img/plats'), $img1Name);
            $plat->img1 = 'img/plats/' . $img1Name;
        }


        if ($request->hasFile('img2')) {
            $img2 = $request->file('img2');
            $img2Name = time() . '_2.' . $img2->getClientOriginalExtension();
            $img2->move(public_path('img/plats'), $img2Name);
            $plat->img2 = 'img/plats/' . $img2Name;
        }


        if ($request->hasFile('img3')) {
            $img3 = $request->file('img3');
            $img3Name = time() . '_3.' . $img3->getClientOriginalExtension();
            $img3->move(public_path('img/plats'), $img3Name);
            $plat->img3 = 'img/plats/' . $img3Name;
        }
        $plat->id_user  = Auth::id();

        $plat->save();

        return redirect()->to('/plat')->with('success', 'Hotel created successfully.');
    }

    public function edit($id_plat)
    {
        return view('admin.plat.edit')
            ->with('plat', PLAT::where('id_plat', $id_plat)->first());
    }

    public function update(Request $request, $id_plat)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'description' => 'required|string',
            'img1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $updateData = [];
        if ($request->hasFile('img1')) {
            $img1 = $request->file('img1');
            $img1Name = time() . '_1.' . $img1->getClientOriginalExtension();
            $img1->move(public_path('img/plats'), $img1Name);
            $updateData['img1'] = 'img/plats/' . $img1Name;
        }


        if ($request->hasFile('img2')) {
            $img2 = $request->file('img2');
            $img2Name = time() . '_2.' . $img2->getClientOriginalExtension();
            $img2->move(public_path('img/plats'), $img2Name);
            $updateData['img2'] = 'img/plats/' . $img2Name;
        }


        if ($request->hasFile('img3')) {
            $img3 = $request->file('img3');
            $img3Name = time() . '_3.' . $img3->getClientOriginalExtension();
            $img3->move(public_path('img/plats'), $img3Name);
            $updateData['img3'] = 'img/plats/' . $img3Name;
        }
        $updateData['nom'] = $request->nom;
        $updateData['description'] = $request->description;

        PLAT::where('id_plat', $id_plat)->update($updateData);
        return redirect()->to('/plat')
            ->with('message', 'the post has been edited');
    }

    public function destroy($id_plat)
    {
        PLAT::where('id_plat', $id_plat)
            ->delete();
        return redirect()->to('/plat')
            ->with('message', 'the post has been Deleted');
    }
}
