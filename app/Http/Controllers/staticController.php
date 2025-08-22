<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class staticController extends Controller
{
    public function showGeneralStatic(){
        $total_client = DB::table('users')->count();
        $total_hotels = DB::table('hotels')->count();
        $total_restarant = DB::table('restau')->count();
        return view('admin.dashboard',[
            'total_client'=>$total_client,
            'total_hotels'=>$total_hotels,
            'total_restarant'=>$total_restarant,
        ]);
    }
}
