<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['showPublic']);
        $this->middleware('role:admin')->except(['showPublic']);
    }

    /**
     * Display public detail of kegiatan (accessible without auth)
     */
    public function showPublic(Kegiatan $kegiatan)
    {
        // Hanya tampilkan kegiatan yang published
        if ($kegiatan->status !== 'Published') {
            abort(404);
        }

        return view('pages.kegiatan.detail-public', compact('kegiatan'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Kegiatan::orderBy('tanggal_kegiatan', 'desc')->paginate(10);
        return view('pages.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|in:Tahunan,Divisi,Lainnya',
            'tanggal_kegiatan' => 'required|date',
            'status' => 'required|in:Draft,Published'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->nama_kegiatan) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('kegiatan', $filename, 'public');
            $data['gambar'] = $path;
        }

        Kegiatan::create($data);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        return view('pages.kegiatan.show', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('pages.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|in:Tahunan,Divisi,Lainnya',
            'tanggal_kegiatan' => 'required|date',
            'status' => 'required|in:Draft,Published'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kegiatan->gambar && Storage::disk('public')->exists($kegiatan->gambar)) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->nama_kegiatan) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('kegiatan', $filename, 'public');
            $data['gambar'] = $path;
        }

        $kegiatan->update($data);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        // Hapus gambar jika ada
        if ($kegiatan->gambar && Storage::disk('public')->exists($kegiatan->gambar)) {
            Storage::disk('public')->delete($kegiatan->gambar);
        }

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus!');
    }
}
