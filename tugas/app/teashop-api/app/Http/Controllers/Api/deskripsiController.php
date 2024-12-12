<?php

namespace App\Http\Controllers\Api;

use App\Models\deskripsi; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\deskripsiResource; 
use Illuminate\Support\Facades\Validator;

class deskripsiController extends Controller
{
    /**
     * index
     */
    public function index()
    {
        $deskripsi = Deskripsi::latest()->paginate(5);
        return new deskripsiResource(true, 'List Data Deskripsi', $deskripsi);
    }

    /**
     * store
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'level_sugar'  => 'required',
            'temperature'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Buat data deskripsi baru
        $deskripsi = Deskripsi::create([
            'level_sugar'  => $request->level_sugar,
            'temperature'   => $request->temperature,
        ]);

        return new deskripsiResource(true, 'Data Deskripsi Berhasil Ditambahkan!', $deskripsi);
    }

    /**
     * show
     */
    public function show($id)
    {
        $deskripsi = Deskripsi::find($id);
        return new deskripsiresource(true, 'Detail Data Deskripsi!', $deskripsi);
    }

    /**
     * update
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'level_sugar'  => 'required',
            'temperature'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $deskripsi = Deskripsi::find($id);

        // Update data deskripsi
        $deskripsi->update([
            'level_sugar'  => $request->level_sugar,
            'temperature'   => $request->temperature,
        ]);

        return new deskripsiResource(true, 'Data Deskripsi Berhasil Diubah!', $deskripsi);
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        $deskripsi = Deskripsi::find($id);

        // Hapus data deskripsi
        $deskripsi->delete();

        return new deskripsiResource(true, 'Data Deskripsi Berhasil Dihapus!', null);
    }
}
