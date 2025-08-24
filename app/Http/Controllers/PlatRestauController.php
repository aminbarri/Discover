<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\platofrest;

use Illuminate\Http\Request;

class PlatRestauController extends Controller
{
    public function show($id_rest){
        $palt = DB::table('plat')->get();
        $platrest = DB::table('platofrest')->get();
        $restau = DB::table('restau')->where('id_rest','=',$id_rest)->first();
        return view('admin.restau.add', compact('id_rest', 'palt', 'platrest', 'restau'));
    }
    public function store($id_plat,$id_rest){
        $exists = DB::table('platofrest')
        ->where('id_plat', $id_plat)
        ->where('id_rest', $id_rest)
        ->exists();
        if ($exists) {
            DB::table('platofrest')
                ->where('id_plat', $id_plat)
                ->where('id_rest', $id_rest)
                ->update(['deleted_at' => null]);
        } else {
        // If the record does not exist, create a new record
        $platofrest = new PlatOfRest();
        $platofrest->id_plat = $id_plat;
        $platofrest->id_rest = $id_rest;
        $platofrest->save();  // Save the new record
    }
    return redirect()->back()->with('success', 'Plat was added');
    }




    public function destroy($id_plat,$id_rest){
        platofrest::where('id_plat', $id_plat)
        ->where('id_rest', $id_rest)
        ->delete();
           return redirect()->back()
           ->with('success','the Reservation has been Deleted');
    }
}
