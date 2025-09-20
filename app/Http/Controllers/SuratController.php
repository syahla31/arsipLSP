<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Surat::query();

        // Logika untuk pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'LIKE', '%' . $request->search . '%');
        }

        $surats = $query->orderBy('created_at', 'desc')->paginate(10); // Menampilkan 10 data per halaman

        return view('surat.index', compact('surats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua data kategori dari database
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        
        // Kirim data kategori ke view
        return view('surat.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        // Redirect ke halaman yang sesuai dengan langkah kerja nomor 4
        return view('surat.show', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_surat' => 'required|string|unique:surats|max:255',
            'kategori_id' => 'required|exists:kategoris,id', // Validasi ke tabel kategoris
            'judul'       => 'required|string|max:255',
            'file_pdf'    => 'required|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file_pdf')) {
            $filePath = $request->file('file_pdf')->store('public/surat');
        }

        Surat::create([
            'nomor_surat' => $validatedData['nomor_surat'],
            'kategori_id' => $validatedData['kategori_id'], // Simpan ID kategori
            'judul'       => $validatedData['judul'],
            'file_path'   => $filePath,
        ]);

        return redirect()->route('surat.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        // Hapus file terkait jika ada
        if ($surat->file_path && Storage::exists($surat->file_path)) {
            Storage::delete($surat->file_path);
        }

        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus!');
    }
    
    public function unduh(Surat $surat)
    {
        // 1. Ambil path asli file dari storage
        $filePath = storage_path('app/' . $surat->file_path);

        // Periksa apakah file ada
        if (!Storage::exists($surat->file_path)) {
            return redirect()->route('surat.index')->with('error', 'File tidak ditemukan!');
        }

        // 2. Buat nama file baru yang lebih deskriptif
        $judulSurat = Str::slug($surat->judul, '_'); // Mengubah "Judul Surat" menjadi "judul_surat"
        $tanggalSurat = $surat->created_at->format('Y-m-d');
        $fileExtension = pathinfo($surat->file_path, PATHINFO_EXTENSION); // Mengambil ekstensi asli (pdf)

        $namaFileBaru = "{$judulSurat}_{$tanggalSurat}.{$fileExtension}";

        // 3. Unduh file dengan nama baru
        return response()->download($filePath, $namaFileBaru);
    }
}