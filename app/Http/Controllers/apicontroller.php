<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\karyawan;

class apicontroller extends Controller
{
    // Get all data
    public function show_all()
    {
        return response()->json(karyawan::all(), 200);
    }

    // Get data by id
    public function show_by($id)
    {
        $check = karyawan::firstWhere('id', $id);
        if ($check) {
            $data = karyawan::select('name', 'email')->where('id', $id)->get();
            return response()->json([
                'status_code' => 200,
                'data' => $data
            ], 200);
        } else {
            return response([
                'status_code' => 404,
                'Message' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    // Storing data to DB
    public function store(Request $request)
    {
        $karyawan = karyawan::create([
            'name' => $request->name,
            'email' => $request->email,
            'bod' => $request->bod,
            'sex' => $request->sex,
            'kota' => $request->kota
        ]);
        if ($karyawan) {
            return response([
                'status_code' => 200,
                'message' => 'Data berhasil disimpan',
                'data' => $karyawan
            ], 200);
        } else {
            return response([
                'status_code' => 404,
                'Message' => 'Gagal tambah data',
            ], 404);
        }
    }

    // Update data to DB
    public function update(Request $request, $id)
    {
        $karyawan = karyawan::whereId($id)->update($request->all());
        $data = karyawan::firstWhere('id', $id);
        if ($karyawan) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data berhasil dirubah',
                'update-data' => $data
            ], 200);
        } else {
            return response([
                'status_code' => 404,
                'Message' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    // Delete data from DB
    public function destroy($id)
    {
        $karyawan = karyawan::destroy($id);
        $data = karyawan::firstWhere('id', $id);
        if ($karyawan) {
            return response()->json([
                'status_code' => 200,
                'message' => 'Data berhasil dihapus',
            ], 200);
        } else {
            return response([
                'status_code' => 404,
                'Message' => 'Data tidak ditemukan',
            ], 404);
        }
    }
}
