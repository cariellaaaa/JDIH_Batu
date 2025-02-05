<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Jenis;
use App\Models\Draft;

class SKPDController extends Controller
{

    // Method untuk membaca draft produk hukum
    public function readprodukhukum($id)
    {
        $user = Auth::user();

        // Cari draft berdasarkan ID dan dinas yang sesuai
        $draft = Draft::where('id', $id)
                      ->where('dinas_id', $user->dinas_id) // Filter berdasarkan dinas_id
                      ->first();

        // Jika draft tidak ditemukan atau user tidak berhak mengakses, return abort 404
        if (!$draft) {
            abort(404, 'Draft tidak ditemukan atau Anda tidak memiliki akses.');
        }

        return view('auth.skpd.readprodukhukum', [
            'draft' => $draft,
        ]);
    }

    // Method untuk menambahkan produk hukum (tampilan form)
    public function addprodukhukum()
    {
        return view('auth.skpd.addprodukhukum', [
            'jenis' => Jenis::all(),
        ]);
    }

    // Method untuk menyimpan produk hukum baru
    public function storeprodukhukum(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'judul' => 'required',
            'tanggal' => 'required',
            'file_pengajuan' => 'required|mimes:pdf,doc,docx',
            'draft_produk_hukum' => 'required|mimes:doc,docx,xls,xlsx', // Ubah ini untuk menerima Word dan Excel
        ], [
            'jenis.required' => 'Jenis / Bentuk Peraturan tidak boleh kosong',
            'judul.required' => 'Judul Produk Hukum tidak boleh kosong',
            'tanggal.required' => 'Tanggal Pengajuan tidak boleh kosong',
            'file_pengajuan.required' => 'Surat Pengajuan tidak boleh kosong',
            'file_pengajuan.mimes' => 'Surat Pengajuan harus berformat PDF atau Word',
            'draft_produk_hukum.required' => 'Draft Produk Hukum tidak boleh kosong',
            'draft_produk_hukum.mimes' => 'Draft Produk Hukum harus berformat Word atau Excel', // Ubah pesan ini
        ]);
        
 // Cek apakah file ada dan valid
 if ($request->hasFile('file_pengajuan') && $request->file('file_pengajuan')->isValid()) {
    $filePengajuanPath = $request->file('file_pengajuan')->store('file-pengajuan', 'public');
    if ($filePengajuanPath === false) {
        return redirect()->back()->withErrors(['file_pengajuan' => 'Gagal menyimpan file pengajuan.']);
    }
} else {
    return redirect()->back()->withErrors(['file_pengajuan' => 'File pengajuan tidak valid atau kosong.']);
}

if ($request->hasFile('draft_produk_hukum') && $request->file('draft_produk_hukum')->isValid()) {
    $draftProdukHukumPath = $request->file('draft_produk_hukum')->store('file-draftProdukHukum', 'public');
    if ($draftProdukHukumPath === false) {
        return redirect()->back()->withErrors(['draft_produk_hukum' => 'Gagal menyimpan draft produk hukum.']);
    }
} else {
    return redirect()->back()->withErrors(['draft_produk_hukum' => 'Draft produk hukum tidak valid atau kosong.']);
}
        // Simpan data draft baru
        DB::table('drafts')->insert([
            'jenis_id' => $request->jenis,
            'judul' => $request->judul,
            'tanggal_pengajuan' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'surat_pengajuan' => $filePengajuanPath, // ini sudah benar, sesuai nama kolom
            'draft_produk_hukum' => $draftProdukHukumPath,
            'status' => 'menunggu',
            'user_id' => Auth::user()->id,
            'dinas_id' => Auth::user()->dinas_id, // Menyimpan dinas_id pengguna yang sedang login
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('admins')->insert([
            'status' => 'menunggu',
            'draft_id' => DB::getPdo()->lastInsertId(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $request->session()->flash('success', 'Berhasil mengajukan produk hukum');
        return redirect('/dashboard');
    }

    // Method untuk mengedit draft produk hukum (tampilan form)
    public function editprodukhukum($id)
    {
        $user = Auth::user();

        // Cari draft berdasarkan ID dan dinas yang sesuai
        $draft = Draft::where('id', $id)
                      ->where('dinas_id', $user->dinas_id) // Filter berdasarkan dinas_id
                      ->first();

        // Jika draft tidak ditemukan atau user tidak berhak mengakses, return abort 404
        if (!$draft) {
            abort(404, 'Draft tidak ditemukan atau Anda tidak memiliki akses.');
        }

        return view('auth.skpd.editprodukhukum', [
            'draft' => $draft,
            'jenis' => Jenis::all(),
        ]);
    }

    // Method untuk mengupdate produk hukum yang ada
    public function updateprodukhukum(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required',
            'judul' => 'required',
            'tanggal' => 'required',
            'file_pengajuan' => 'required|mimes:pdf,doc,docx',
            'draft_produk_hukum' => 'required|mimes:pdf,doc,docx',
        ], [
            'jenis.required' => 'Jenis / Bentuk Peraturan tidak boleh kosong',
            'judul.required' => 'Judul Produk Hukum tidak boleh kosong',
            'tanggal.required' => 'Tanggal Pengajuan tidak boleh kosong',
            'file_pengajuan.required' => 'Surat Pengajuan tidak boleh kosong',
            'file_pengajuan.mimes' => 'Surat Pengajuan harus berformat PDF atau Word',
            'draft_produk_hukum.required' => 'Draft Produk Hukum tidak boleh kosong',
            'draft_produk_hukum.mimes' => 'Draft Produk Hukum harus berformat PDF atau Word',
        ]);

        // Cari draft berdasarkan ID dan dinas_id
        $draft = Draft::where('id', $id)
                      ->where('dinas_id', Auth::user()->dinas_id) // Filter berdasarkan dinas_id
                      ->first();

        if (!$draft) {
            abort(404, 'Draft tidak ditemukan atau Anda tidak memiliki akses.');
        }

        // Jika belum ada draft lama, simpan sebagai arsip
        if (!isset($draft->draft_produk_hukum_lama)) {
            DB::table('drafts')->where('id', $id)->update([
                'draft_produk_hukum_lama' => $draft->draft_produk_hukum,
            ]);
        }

        // Hapus file lama
        Storage::delete($draft->draft_produk_hukum);
        Storage::delete($draft->surat_pengajuan);

        // Upload file baru
        $filePengajuan = $request->file('file_pengajuan')->store('file-pengajuan');
        $draftProdukHukum = $request->file('draft_produk_hukum')->store('file-draftProdukHukum');

        // Update data draft
        DB::table('drafts')->where('id', $id)->update([
            'jenis_id' => $request->jenis,
            'judul' => $request->judul,
            'tanggal_pengajuan' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'surat_pengajuan' => $filePengajuan,
            'draft_produk_hukum' => $draftProdukHukum,
            'status' => 'menunggu',
            'updated_at' => now()
        ]);

        DB::table('admins')->where('draft_id', $id)->update([
            'status' => 'menunggu',
            'updated_at' => now()
        ]);

        $request->session()->flash('success', 'Data draft berhasil diubah');
        return redirect('/dashboard');
    }

    // Method untuk menghapus produk hukum
    public function deleteprodukhukum($id)
    {
        // Cari draft berdasarkan ID dan dinas_id
        $draft = Draft::where('id', $id)
                      ->where('dinas_id', Auth::user()->dinas_id) // Filter berdasarkan dinas_id
                      ->first();

        if (!$draft) {
            abort(404, 'Draft tidak ditemukan atau Anda tidak memiliki akses.');
        }

        // Hapus file terkait
        if (isset($draft->draft_produk_hukum_lama)) {
            Storage::delete($draft->draft_produk_hukum_lama);
        }
        Storage::delete($draft->surat_pengajuan);
        Storage::delete($draft->draft_produk_hukum);

        // Hapus data dari database
        DB::table('drafts')->where('id', $id)->delete();
        DB::table('admins')->where('draft_id', $id)->delete();

        session()->flash('success', 'Data draft berhasil dihapus');
        return redirect('/dashboard');
    }
}