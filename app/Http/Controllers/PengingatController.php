<?php

namespace App\Http\Controllers;

use App\Models\pengingat;
use Exception;
use Illuminate\Http\Request;

class PengingatController extends Controller
{
    public function indexUser($id)
    {

        return pengingat::where('users_id', $id)->get();
    }

    public function store(Request $request)
    {
        try {
            $pengingat = new pengingat();
            $pengingat->users_id = $request->users_id;
            $pengingat->nama = $request->nama;
            $pengingat->total = $request->total;
            $pengingat->tanggal = $request->tanggal;
            $pengingat->save();

            return response()->json([
                'status' => "200",
                'message' => 'Pengingat Berhasil ditambahkan'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => "500",
                'message' => "Something went really wrong"
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $pengingat = pengingat::find($id);
            if (!$pengingat) {
                return response()->json([
                    'status' => '404',
                    'message' => 'Kategori tidak ditemukan'
                ]);
            }
            $pengingat->nama = $request->nama;
            $pengingat->total = $request->total;
            $pengingat->tanggal = $request->tanggal;
            $pengingat->users_id = $request->users_id;
            return response()->json([
                'status' => '200',
                'message' => 'Pengingat berhasil di update'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => '500',
                'message' => 'Something went really wrong'
            ]);
        }
    }


    public function destroy($id)
    {
        try {
            $pengingat = pengingat::find($id);
            if (!$pengingat) {
                return response()->json([
                    'status' => '404',
                    'message' => 'Pengingat tidak ditemukan'
                ]);
            }
            $pengingat->delete();
            return response()->json([
                'status' => '200',
                'message' => 'pengingat berhasil di hapus'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => '500',
                'message' => 'Something went really wrong'
            ]);
        }
    }
}
