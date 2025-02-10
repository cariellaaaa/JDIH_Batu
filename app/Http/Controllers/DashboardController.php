<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Jenis;
use App\Models\Dinas;
use App\Models\Draft;
use App\Models\Admin;
use App\Models\StaffUndang;
use App\Models\KasubagUndang;
use App\Models\Kabag;
use App\Models\KepalaDinas;
use App\Models\Sekda;
use App\Models\Walikota;
use App\Models\StaffDokumentasi;
use App\Models\ProdukHukum;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role->role == '-') {
            return view('auth.newuser.dashboard');
        } else if (Auth::user()->role->role == 'superadmin') {
            return view('auth.pages.dashboard', [
                'users' => User::all(),
                'dinas' => Dinas::all(),
                'draft' => Draft::all(),
                'jenis' => Jenis::all(),
            ]);

        } else if (Auth::user()->role->role == 'skpd') {
            $drafts = Draft::with('dinas', 'jenis') // Mengambil relasi dinas dan jenis
                ->where('dinas_id', Auth::user()->dinas_id) // Filter berdasarkan dinas_id
                ->orderBy('tanggal_pengajuan', 'desc') // Urutkan berdasarkan tanggal pengajuan
                ->get();
            return view('auth.skpd.dashboard', [
                'drafts' => $drafts,
            ]);

        } else if (Auth::user()->role->role == 'admin_fo') {
            return view('auth.admin_fo.dashboard', [
                'admins' => Admin::all(),

            ]);
            // } else if (Auth::user()->role->role == 'staff_perundang_undangan') {
            //     return view('auth.staff_perundang_undangan.dashboard', [
            //         'staff_undangs' => StaffUndang::all(),
            //     ]);

        } else if (Auth::user()->role->role == 'staff_perundang_undangan') {
            $staffUndangs = StaffUndang::where('user_id', Auth::id())
                ->with(['admin.draft.jenis', 'admin.draft.dinas'])
                ->orderBy('created_at', 'desc')
                ->get();

            return view('auth.staff_perundang_undangan.dashboard', [
                'staff_undangs' => $staffUndangs,
            ]);

        } else if (Auth::user()->role->role == 'kasubag_perundang_undangan') {
            return view('auth.kasubag_perundang_undangan.dashboard', [
                'kasubag_undangs' => KasubagUndang::all(),
            ]);

        } else if (Auth::user()->role->role == 'kabag') {
            return view('auth.kabag.dashboard', [
                'kabag' => Kabag::all(),
            ]);

        } else if (Auth::user()->role->role == 'kepala_dinas') {
            // Ambil dinas_id dari user yang sedang login
            $dinasId = Auth::user()->dinas_id;

            // Ambil data draft yang terkait dengan dinas_id yang sesuai dan sudah melewati kabag
            $drafts = Draft::where('dinas_id', $dinasId)
                ->whereHas('kabag', function ($query) {
                    $query->whereNotNull('validated'); // Pastikan kabag sudah mengirim data
                })
                ->with(['admin', 'staffUndang', 'kasubagUndang', 'kabag', 'kepalaDinas'])
                ->get();

            // Kirim data ke view dengan relasi yang diperlukan
            return view('auth.kepala_dinas.dashboard', [
                'kepala_dinas' => KepalaDinas::all(),

            ]);




        } else if (Auth::user()->role->role == 'sekda') {
            return view('auth.sekda.dashboard', [
                'sekda' => Sekda::all(),
            ]);
        } else if (Auth::user()->role->role == 'walikota') {
            return view('auth.walikota.dashboard', [
                'walikota' => Walikota::all(),
            ]);
        } else if (Auth::user()->role->role == 'staff_dokumentasi') {
            return view('auth.staff_dokumentasi.dashboard', [
                'staff_dokumentasi' => StaffDokumentasi::all(),
            ]);
        } else if (Auth::user()->role->role == 'kasubag_dokumentasi') {
            return view('auth.kasubag_dokumentasi.dashboard', [
                'produk_hukums' => ProdukHukum::all(),
            ]);
        } else {
            return view('auth.pages.user', [
                'users' => User::all(),
                'role' => Role::all(),
                'dinas' => Dinas::all()
            ]);
        }
    }

    public function profile()
    {
        return view('auth.pages.profile', [
            'user' => Auth::user(),
            'dinas' => Dinas::all()
        ]);
    }

    public function editProfile(Request $request, User $user)
    {
        $validate = [
            [
                'name' => 'required',
                'password' => 'required|min:6',
                'confirmPassword' => 'required|same:password',
            ],
            [
                'name.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 6 karakter',
                'confirmPassword.required' => 'Konfirmasi password tidak boleh kosong',
                'confirmPassword.same' => 'Konfirmasi password tidak sama',
            ]
        ];

        if ($request->email == $user->email) {
            $validate = [
                [
                    'email' => 'required|email:dns|unique:users,email'
                ],
                [
                    'email.required' => 'Email tidak boleh kosong',
                    'email.email' => 'Email tidak valid',
                    'email.unique' => 'Email sudah terdaftar'
                ]
            ];
        }

        if ($request->nip == $user->nip) {
            $validate = [
                [
                    'nip' => 'required|unique:users,nip'
                ],
                [
                    'nip.required' => 'NIP tidak boleh kosong',
                    'nip.unique' => 'NIP sudah terdaftar'
                ]
            ];
        }

        $validateData = $request->validate($validate[0], $validate[1]);

        User::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'nip' => $request->nip,
                'password' => bcrypt($request->password),
                'dinas_id' => $request->dinas_id
            ]);


        return redirect('/dashboard/profile');
    }

    public function dashboard()
    {
        return view('guest.dashboard', [
            'draft' => ProdukHukum::all(),
        ]);
    }

    public function inovasiSimprokum()
    {
        // Add any necessary logic here
        return view('guest.inovasisimprokum');
    }


    public function readprodukhukum(Request $request, ProdukHukum $draft)
    {
        return view('guest.readprodukhukum', [
            'draft' => $draft::find($request->id),
        ]);
    }
}