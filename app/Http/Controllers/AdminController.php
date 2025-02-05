<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Draft;
use App\Models\User;
use App\Models\StaffUndang;
use App\Services\WhatsappService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $whatsappService;

    public function __construct(WhatsappService $whatsappService)
    {
        $this->whatsappService = $whatsappService;
    }

    public function readprodukhukum(Request $request, Admin $draft)
    {
        $draft = $draft::find($request->id);
        // Ambil semua staff perundang-undangan
        $staffUndangUsers = User::where('role_id', 5)->get(); // Misalkan role_id 5 adalah untuk staff perundang-undangan

        return view('auth.admin_fo.readprodukhukum', [
            'draft' => $draft,
            'staffUndangUsers' => $staffUndangUsers,
        ]);
    }

    public function process(Request $request)
    {
        switch($request->input('action')) {
            case 'tolak':
                // Logika untuk menolak draft
                $searchDraft = Admin::find($request->id);

                if (!$searchDraft) {
                    $request->session()->flash('error', 'Admin tidak ditemukan.');
                    return redirect('/dashboard');
                }

                DB::table('admins')->where('id', $request->id)->update([
                    'status' => 'ditolak',
                    'validated' => Auth::user()->name,
                    'updated_at' => now()
                ]);

                DB::table('drafts')->where('id', $searchDraft->draft_id)->update([
                    'status' => 'ditolak',
                    'keterangan_penolakan' => $request->keterangan,
                    'updated_at' => now()
                ]);

                $request->session()->flash('success', 'Data berhasil ditolak.');
                return redirect('/dashboard');
                break;

            case 'proses':
                // Validasi dan proses penerimaan draft
                $request->validate([
                    'no_regristrasi' => 'required|unique:drafts,no_regristrasi',
                    'staff_perundang_undangan_id' => 'required|exists:users,id', // Validasi bahwa staff ada di database
                ], [
                    'no_regristrasi.required' => 'No Registrasi tidak boleh kosong',
                    'no_regristrasi.unique' => 'No Registrasi sudah terdaftar',
                ]);

                // Mencari Admin berdasarkan ID
                $searchDraft = Admin::find($request->id);

                if (!$searchDraft) {
                    $request->session()->flash('error', 'Admin tidak ditemukan.');
                    return redirect('/dashboard');
                }

                // Update status draft
                DB::table('drafts')->where('id', $searchDraft->draft_id)->update([
                    'no_regristrasi' => $request->no_regristrasi,
                    'updated_at' => now()
                ]);

                // Update status admin
                DB::table('admins')->where('id', $request->id)->update([
                    'status' => 'diterima',
                    'keterangan' => $request->keterangan,
                    'validated' => Auth::user()->name,
                    'updated_at' => now()
                ]);

                // Menambahkan data ke tabel staff_undangs
                DB::table('staff_undangs')->insert([
                    'status' => 'menunggu',
                    'admin_id' => $request->id,
                    'user_id' => $request->staff_perundang_undangan_id, // Menyimpan user_id
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                // Mengambil staff perundang-undangan yang ditunjuk
                $staffId = $request->staff_perundang_undangan_id;
                $staff = User::find($staffId); // Mengambil data staff berdasarkan ID yang dipilih

                // Kirim notifikasi kepada staff yang dipilih
                if ($staff && $staff->phone) { // Mengecek apakah phone ada
                    $message = "Halo {$staff->name}, Anda telah mendapatkan disposisi baru. Silakan cek sistem untuk detailnya.";
                    try {
                        $this->whatsappService->sendMessage($staff->phone, $message); // Kirim pesan WhatsApp
                    } catch (\Exception $e) {
                        \Log::error('Error sending WhatsApp message: ' . $e->getMessage());
                        $request->session()->flash('error', 'Pengiriman pesan WhatsApp gagal.');
                    }
                } else {
                    \Log::warning('Nomor WhatsApp kosong untuk user ID: ' . $staff->id);
                }

                // Flash session untuk menampilkan pesan sukses
                $request->session()->flash('success', 'Data berhasil diproses dan staf perundang-undangan telah diberitahu.');
                return redirect('/dashboard');
                break;
        }
    }
}