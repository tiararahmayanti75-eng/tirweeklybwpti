<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;

class SekolahController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input pencarian dan jenjang dari form
        $search = $request->input('search');
        $jenjang = $request->input('jenjang');

        // Query dasar untuk mengambil data sekolah
        $query = Sekolah::query();

        // Jika user mengetik pencarian nama atau lokasi
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_sekolah', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%");
            });
        }

        // Jika user memilih filter jenjang (SMA/SMK)
        if ($jenjang && $jenjang != 'Semua Jenjang') {
            $query->where('jenjang', $jenjang);
        }

        // Eksekusi query dengan pagination (3 data per halaman)
        $sekolahs = $query->paginate(3)->withQueryString();

        return view('sekolah.index', compact('sekolahs'));
    }

    public function show($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        return view('sekolah.show', compact('sekolah'));
    }

    // Menampilkan halaman form tambah sekolah
    public function create()
    {
        return view('sekolah.create');
    }

    // Menyimpan data sekolah baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'jenjang' => 'required',
            'akreditasi' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ]);

        Sekolah::create($request->all());

        return redirect('/sekolah')->with('success', 'Sekolah baru berhasil ditambahkan!');
    }

    // Menampilkan halaman perbandingan sekolah
    public function compare(Request $request)
    {
        $sekolahs = Sekolah::all();
        $sekolah1 = null;
        $sekolah2 = null;

        if ($request->has('sekolah_1') && $request->has('sekolah_2')) {
            $sekolah1 = Sekolah::find($request->input('sekolah_1'));
            $sekolah2 = Sekolah::find($request->input('sekolah_2'));
        }

        return view('sekolah.compare', compact('sekolahs', 'sekolah1', 'sekolah2'));
    }

    // Menampilkan form edit sekolah
    public function edit($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        return view('sekolah.edit', compact('sekolah'));
    }

    // Mengupdate data sekolah di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'jenjang' => 'required',
            'akreditasi' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ]);

        $sekolah = Sekolah::findOrFail($id);
        $sekolah->update($request->all());

        return redirect('/sekolah')->with('success', 'Data sekolah berhasil diperbarui!');
    }

    // Menghapus data sekolah dari database
    public function destroy($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->delete();

        return redirect('/sekolah')->with('success', 'Sekolah berhasil dihapus!');
    }
}