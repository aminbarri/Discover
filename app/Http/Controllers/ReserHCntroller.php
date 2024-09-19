<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resrhotel;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
class ReserHCntroller extends Controller
{
    
    public function show(){

        $reseration =DB::table('reservation_hotel')->where('statu', 'En cours')
        ->leftJoin('users', 'reservation_hotel.id_client', '=', 'users.id')
        ->get();
        $accepte =DB::table('reservation_hotel')->where('statu', 'Acceptée')->get();
        $refuse =DB::table('reservation_hotel')->where('statu', 'Refusée')->get();
        return view('admin.reservation.hotel.list',compact('reseration'));
    }
    

    public function store(Request $request){

        $request->validate([
            'phone' => 'required|string|max:90',
            'type' => 'required|in:partagé,seul',
            'nmbre_perssone' => 'required|integer|min:1',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);
        $resrhotel = new resrhotel();
        $resrhotel->phone = $request->phone;
        $resrhotel->id_resh  = $request->id_resh;
        $resrhotel->type = $request->type;
        $resrhotel->nmbre_perssone = $request->nmbre_perssone;
        $resrhotel->date_debut = $request->date_debut;
        $resrhotel->date_fin = $request->date_fin;
        $resrhotel->id_hotel  = $request->id_hotel;
        $resrhotel->id_client  = Auth::id();

        $resrhotel->save();

        return redirect()->to('/')->with('success', 'reservation done.');




    }

    public function edit($id_resh ){
       
        return view('admin.reservation.hotel.edit')
        ->with('reservation',resrhotel::where('id_resh',$id_resh)->first());

    }

    public function update(Request $request, $id_resh){


        $request->validate([
            'phone' => 'required|string|max:90',
            'type' => 'required|in:partagé,seul',
            'nmbre_perssone' => 'required|integer|min:1',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'statu'=>'required|in:En cours,Refusée,Acceptée',
        ]);
        $updateData = [];

        $updateData['phone'] = $request->phone;
        $updateData['type'] = $request->type;
        $updateData['nmbre_perssone'] = $request->nmbre_perssone;
        $updateData['date_debut'] = $request->date_debut;
        $updateData['date_fin'] = $request->date_fin;
        $updateData['statu'] = $request->statu;



        resrhotel::where('id_resh', $id_resh)->update($updateData);
        return redirect()->to('/Resirvation/list')
        ->with('message','the Reservation has been edited');

    }
    public function destroy($id_resh){
  
        resrhotel::where('id_resh' , $id_resh)
        ->delete();
           return redirect()->to('/Resirvation/list')
           ->with('message','the Reservation has been Deleted');
       }
}
