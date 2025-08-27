<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resrhotel;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail ;
use App\Mail\reservationMail;
use Illuminate\Support\Facades\Auth;
class ReserHCntroller extends Controller
{

    public function show(){

        $reseration =DB::table('reservation_hotel')->where('statu', 'En cours')
        ->leftJoin('users', 'reservation_hotel.id_client', '=', 'users.id')
        ->get();
        $accepte =DB::table('reservation_hotel')->where('statu', 'Acceptée')
        ->leftJoin('users', 'reservation_hotel.id_client', '=', 'users.id')
        ->get();
        $refuse =DB::table('reservation_hotel')->where('statu', 'Refusée')
        ->leftJoin('users', 'reservation_hotel.id_client', '=', 'users.id')
        ->get();
        return view('admin.reservation.hotel.list',compact('reseration','accepte','refuse'));
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
        $resrhotel->date_reservartion= now();
        $resrhotel->id_client  = Auth::id();

         $data = [
        'title' => 'Discover Draa-Tafilalet',
        'date' => date('m/d/Y'),
        'name' => Auth::user()->name,
        'email' => Auth::user()->email,
        'phone' => '+212 600 000 000',
        'type' => $request->type,
        'nmbre_perssone' => $request->nmbre_perssone,
        'date_debut' => $request->date_debut,
        'date_fin' => $request->date_fin
    ];

        $pdf = PDF::loadView('receipt.hotelRecu', $data);
        $fileName = 'reservation_' . time() . '.pdf';
        Storage::put('pdfs/' .Auth::id().'/'. $fileName, $pdf->output());
        $resrhotel->receipt ='pdfs/'.Auth::id().'/'.$fileName;
        $resrhotel->save();
        Mail::to(Auth::user()->email)->send(new reservationMail(Auth::user()->email,$resrhotel->receipt));

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
