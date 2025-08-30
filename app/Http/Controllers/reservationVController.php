<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\resrvoyage;
use App\Models\voyage;
use Illuminate\Support\Facades\Auth;

class reservationVController extends Controller
{
    public function show(){
        $reseration=DB::table('travelres')
        ->leftJoin('users', 'travelres.id_client', '=', 'users.id')
        ->get();
        return view('admin.reservation.voyage.list',compact('reseration'));
    }

    public function store(Request $request){

        $request->validate([
            'phone' => 'required|string|max:90',
            'nmbre_perssone' => 'required|integer|min:1',
        ]);
        $resrvoyage =new Resrvoyage();
        $resrvoyage->id_vor = $request->id_vor;
        $resrvoyage->id_voyage = $request->id_voyage;
        $resrvoyage->phone = $request->phone;
        $resrvoyage->nmbre_perssone = $request->nmbre_perssone;
        $resrvoyage->id_client = Auth::id();
        $number_of_reserve = resrvoyage::where('id_voyage', $request->id_voyage)->sum('nmbre_perssone');
        $available_seats = voyage::where('id_voy', $request->id_voyage)->value('available_seats');

        if($number_of_reserve + $request->nmbre_perssone > $available_seats) {
            return redirect()->back()->with('error', 'Not enough available seats.'. $available_seats);
        }
        $resrvoyage->save();
        return redirect()->to('/')->with('success', 'reservation done.');

    }

    public function edit($id_vor){
        return view ('admin.reservation.voyage.edit')->with(
            'reserations', resrvoyage::where('id_vor',$id_vor)->first()
        );
    }
    public function update(Request $request , $id_vor){
        $request->validate([
            'phone' => 'required|string|max:90',
            'nmbre_perssone' => 'required|integer|min:1',
        ]);
        $updateData = [];
        $updateData['phone']=$request->phone;
        $updateData['nmbre_perssone']=$request->nmbre_perssone;

        resrvoyage::where('id_vor', $id_vor)->update($updateData);
        return redirect()->to('/Resirvationv/list')
        ->with('message','the Reservation has been edited');

    }

    public function destroy($id_vor){

        resrvoyage::where('id_vor', $id_vor)->delete();
        return redirect()->to('/Resirvationv/list')
        ->with('message','the Reservation has been deleted');
    }
}
