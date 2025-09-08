<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hotel;

class SearchController extends Controller
{
    public function search_in_all(){

    }
    public function search_hotels($hotels){
        $hotel = hotel::where('nom', 'like', '%' . $hotels . '%')
        ->orWhere('ville', 'like', '%' . $hotels . '%')
        ->select('id_hotel','nom','img1','ville')
        ->get();
        return $hotel;
    }
}
