<?php

namespace App\Http\Controllers;

use App\Models\pemasukan;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function indexUser($id)
    {
        return pemasukan::where('users_id', $id)->get();
    }

    public function store(Request $request)
    {
        try {
            $pemasukan = new pemasukan();
            $pemasukan->users_id = $request->users_id;
            $pemasukan->kategoris_id = $request->kategoris_id;
            $pemasukan->nama = $request->nama;
            $pemasukan->total = $request->total;
            $pemasukan->tanggal = Carbon::now()->toDateTimeString();
            $bulan = Carbon::now()->format('m');

            switch ($bulan) {
                case '01':
                    $pemasukan->bulans_id = '1';
                    break;
                case '02':
                    $pemasukan->bulans_id = '2';
                    break;
                case '03':
                    $pemasukan->bulans_id = '3';
                    break;
                case '04':
                    $pemasukan->bulans_id = '4';
                    break;
                case '05':
                    $pemasukan->bulans_id = '5';
                    break;
                case '06':
                    $pemasukan->bulans_id = '6';
                    break;
                case '07':
                    $pemasukan->bulans_id = '7';
                    break;
                case '08':
                    $pemasukan->bulans_id = '8';
                    break;
                case '09':
                    $pemasukan->bulans_id = '9';
                    break;
                case '10':
                    $pemasukan->bulans_id = '10';
                    break;
                case '11':
                    $pemasukan->bulans_id = '11';
                    break;
                case '12':
                    $pemasukan->bulans_id = '12';
                    break;
                default:
                    $pemasukan->bulans_id = '13';
            }


            $pemasukan->save();

            return response()->json([
                'status' => "200",
                'message' => 'Pemasukan Berhasil ditambahkan'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => "500",
                'tanggal' => $pemasukan->tanggal,
                'message' => "Something went really wrong",

            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $pemasukan = pemasukan::find($id);
            if (!$pemasukan) {
                return response()->json([
                    'status' => '404',
                    'message' => 'Transaksi tidak ditemukan'
                ]);
            }
            
            // $pemasukan->users_id = $pemasukan->users_id;
            // $pemasukan->kategoris_id = $request->kategoris_id;
            $pemasukan->nama = $request->nama;
            $pemasukan->total = $request->total;
            $pemasukan->tanggal = $pemasukan->tanggal;
            $pemasukan->bulans_id = $pemasukan->bulans_id;
            $pemasukan->save();
            return response()->json([
                'status' => '200',
                'message' => 'kategori berhasil di update',
                'data' => $pemasukan
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
            $pemasukan = Pemasukan::find($id);
            if (!$pemasukan) {
                return response()->json([
                    'status' => '404',
                    'message' => 'Transaksi tidak ditemukan'
                ]);
            }
            $pemasukan->delete();
            return response()->json([
                'status' => '200',
                'message' => 'Transaksi berhasil di hapus'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => '500',
                'message' => 'Something went really wrong'
            ]);
        }
    }
}
