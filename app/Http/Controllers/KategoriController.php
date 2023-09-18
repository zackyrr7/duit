<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Exception;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return kategori::all();
    }

    public function indexUser($id)
    {

        return kategori::where('users_id', $id)->get();
    }

    public function indexUserPemasukan($id)
    {

        $kategori =  kategori::where('users_id', $id)->where('jenis', 'pemasukan')->get();
        return $kategori;
    }
    

    public function indexUserPengeluaran($id)
    {

        return kategori::where('users_id', $id)->where('jenis', 'pengeluaran')->get();
    }

    public function store(Request $request)
    {
        try {
            $kategori = new kategori();
            $kategori->users_id = $request->users_id;
            $kategori->nama = $request->nama;
            $kategori->icon = $request->icon;
            $kategori->jenis = $request->jenis;
            $kategori->save();

            return response()->json([
                'status' => "200",
                'message' => 'Kategori Berhasil ditambahkan'
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
            $kategori = kategori::find($id);
            if (!$kategori) {
                return response()->json([
                    'status' => '404',
                    'message' => 'Kategori tidak ditemukan'
                ]);
            }
            $kategori->nama = $request->nama;
            $kategori->icon = $request->icon;
            $kategori->jenis = $request->jenis;
            $kategori->users_id = $request->users_id;
            return response()->json([
                'status' => '200',
                'message' => 'kategori berhasil di update'
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
            $kategori = kategori::find($id);
            if (!$kategori) {
                return response()->json([
                    'status' => '404',
                    'message' => 'Kategori tidak ditemukan'
                ]);
            }
            $kategori->delete();
            return response()->json([
                'status' => '200',
                'message' => 'kategori berhasil di hapus'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => '500',
                'message' => 'Something went really wrong'
            ]);
        }
    }
}
