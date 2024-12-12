<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\menuResource; 
use Illuminate\Support\Facades\Validator;

class menuController extends Controller
{
    /**
     * index
     */
    public function index()
    {
        $menus = Menu::latest()->paginate(5);
        return new menuResource(true, 'List Data Menu', $menus);
    }

    /**
     * store
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'quantity'    => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Buat data menu baru
        $menu = Menu::create([
            'product_name' => $request->product_name,
            'quantity'    => $request->quantity,
        ]);

        return new menuResource(true, 'Data Menu Berhasil Ditambahkan!', $menu);
    }

    /**
     * show
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        return new menuResource(true, 'Detail Data Menu!', $menu);
    }

    /**
     * update
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'quantity'    => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $menu = Menu::find($id);

        // Update data menu
        $menu->update([
            'product_name' => $request->product_name,
            'quantity'    => $request->quantity,
        ]);

        return new menuResource(true, 'Data Menu Berhasil Diubah!', $menu);
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);

        // Hapus data menu
        $menu->delete();

        return new menuResource(true, 'Data Menu Berhasil Dihapus!', null);
    }
}
