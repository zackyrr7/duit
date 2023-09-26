<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function indexUser($id)
    {
        return pengeluaran::where('users_id', $id)->get();
    }

    public function store(Request $request)
    {
        try {
            $pengeluaran = new pengeluaran();
            $pengeluaran->users_id = $request->users_id;
            $pengeluaran->kategoris_id = $request->kategoris_id;
            $pengeluaran->nama = $request->nama;
            $pengeluaran->total = $request->total;
            $pengeluaran->tanggal = Carbon::now()->toDateTimeString();
            $bulan = Carbon::now()->format('m');

            switch ($bulan) {
                case '01':
                    $pengeluaran->bulans_id = '1';
                    break;
                case '02':
                    $pengeluaran->bulans_id = '2';
                    break;
                case '03':
                    $pengeluaran->bulans_id = '3';
                    break;
                case '04':
                    $pengeluaran->bulans_id = '4';
                    break;
                case '05':
                    $pengeluaran->bulans_id = '5';
                    break;
                case '06':
                    $pengeluaran->bulans_id = '6';
                    break;
                case '07':
                    $pengeluaran->bulans_id = '7';
                    break;
                case '08':
                    $pengeluaran->bulans_id = '8';
                    break;
                case '09':
                    $pengeluaran->bulans_id = '9';
                    break;
                case '10':
                    $pengeluaran->bulans_id = '10';
                    break;
                case '11':
                    $pengeluaran->bulans_id = '11';
                    break;
                case '12':
                    $pengeluaran->bulans_id = '12';
                    break;
                default:
                    $pengeluaran->bulans_id = '13';
            }


            $pengeluaran->save();

            return response()->json([
                'status' => "200",
                'message' => 'Pemasukan Berhasil ditambahkan'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => "500",
                'tanggal' => $pengeluaran->tanggal,
                'message' => "Something went really wrong",

            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $pengeluaran = pengeluaran::find($id);
            if (!$pengeluaran) {
                return response()->json([
                    'status' => '404',
                    'message' => 'Transaksi tidak ditemukan'
                ]);
            }
            
            // $pengeluaran->users_id = $pengeluaran->users_id;
            // $pengeluaran->kategoris_id = $request->kategoris_id;
            $pengeluaran->nama = $request->nama;
            $pengeluaran->total = $request->total;
            $pengeluaran->tanggal = $pengeluaran->tanggal;
            $pengeluaran->bulans_id = $pengeluaran->bulans_id;
            $pengeluaran->save();
            return response()->json([
                'status' => '200',
                'message' => 'Transaksi berhasil di update',
                'data' => $pengeluaran
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
            $pengeluaran = pengeluaran::find($id);
            if (!$pengeluaran) {
                return response()->json([
                    'status' => '404',
                    'message' => 'Transaksi tidak ditemukan'
                ]);
            }
            $pengeluaran->delete();
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
