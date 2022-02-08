<?php

namespace App\Http\Controllers;
use App\Models\Jadwal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
     public function index()
    {
        $jadwal = Jadwal::Select("*")
        ->orderBy("id", "desc")
        ->limit(3)
        ->get();
        return view('welcome', compact('jadwal'));
        return response()->json($jadwal);

        // return view('home');
    }

    public function carijadwal(Request $request){
        $search = $request->get('search');
        $sesi = $request->get('sesi');
        $jadwal = DB::table('jadwal')
        ->where('jadwal_date','like','%'.$search.'%')
        ->Where('jam_sesi','like','%'.$sesi.'%')->get();
        return view('welcome', compact('jadwal'));
    }
}
