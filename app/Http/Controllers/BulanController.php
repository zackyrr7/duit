<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use Exception;
use Illuminate\Http\Request;

class BulanController extends Controller
{
    public function index()
    {
        return Bulan::all();
    }
    public function store(Request $request)
    {
        try {
            $bulan = new Bulan();
            $bulan->nama = $request->nama;
            $bulan->save();

            return response()->json([
                'status' => "200",
                'message' => 'Bulan Berhasil ditambahkan'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => "500",
                'message' => "Something went really wrong"
            ]);
        }
    }
}
