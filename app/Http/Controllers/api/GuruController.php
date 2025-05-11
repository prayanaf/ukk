<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Tampilkan semua data guru
    public function index()
    {
        return response()->json(Guru::all());
    }

    // Simpan data guru baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:gurus,nip',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:gurus,email'
        ]);

        $guru = Guru::create($request->all());

        return response()->json([
            'message' => 'Guru berhasil ditambahkan',
            'data' => $guru
        ], 201);
    }

    // Tampilkan data guru berdasarkan ID
    public function show($id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json(['message' => 'Guru tidak ditemukan'], 404);
        }

        return response()->json($guru);
    }

    // Update data guru berdasarkan ID
    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json(['message' => 'Guru tidak ditemukan'], 404);
        }

        $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'nip' => 'sometimes|required|string|unique:gurus,nip,' . $id,
            'gender' => 'sometimes|required|in:Laki-Laki,Perempuan',
            'alamat' => 'sometimes|required|string',
            'kontak' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:gurus,email,' . $id
        ]);

        $guru->update($request->all());

        return response()->json([
            'message' => 'Guru berhasil diupdate',
            'data' => $guru
        ]);
    }

    // Hapus data guru berdasarkan ID
    public function destroy($id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json(['message' => 'Guru tidak ditemukan'], 404);
        }

        $guru->delete();

        return response()->json(['message' => 'Guru berhasil dihapus']);
    }
}
