@extends('auth.main')

@section('content')
<div class="row">
    <div class="col">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Produk Hukum</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="tableKasubagDokumentasi">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Nomor</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Keterangan Dokumen</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Tanggal Pengundangan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produk_hukums->where('alur',0)->sortDesc() as $draft)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$draft->nomor}}</td>
                                <td>{{$draft->tahun}}</td>
                                <td>{{$draft->judul}}</td>
                                @if($draft->status_dokumen == 'mengganti')
                                <td>{{$draft->status_dokumen}} dokumen {{$draft->mengganti}}</td>
                                @else
                                <td>{{$draft->status_dokumen}}</td>
                                @endif
                                <td>{{$draft->jenis}}</td>
                                <td>{{date('d-m-Y', strtotime($draft->tanggal_pengundangan))}}</td>
                                <td>{{$draft->status}}</td>
                                <td>
                                    <div class="mx-auto">
                                        <button type="button" class="badge bg-warning border-0" data-bs-toggle="modal"
                                            data-bs-target="#trayek{{$draft->id}}">
                                            trayek
                                        </button>

                                        @if($draft->staffDokumentasi->alur ??''== 1)
                                        <!-- Modal Trayek -->
                                        <div class="modal fade" id="trayek{{$draft->id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Trayek</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <!-- SKPD -->
                                                        <div class="row">
                                                            <div class="col-1 px-0">
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->status
                                                                == 'diterima')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #198754;"></i>
                                                                @endif

                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->status
                                                                == 'menunggu')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #ffc107;"></i>
                                                                @endif

                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->status
                                                                == 'ditolak')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>
                                                                @endif
                                                            </div>
                                                            <div class="col-2 text-start px-0">
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->tanggal_pengajuan))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->created_at))}}
                                                            </div>
                                                            <div class="col-1 border-start px-0">
                                                            </div>
                                                            <div class="col text-start ps-0">
                                                                <p class="text-uppercase fw-bold mb-0">skpd</p>
                                                                <p class="mb-0">Keterangan :</p>

                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->status
                                                                == 'menunggu')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            diajukan oleh
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->user->name}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->keterangan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{ $draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->keterangan }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->status
                                                                == 'diterima')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->status}}
                                                                            oleh
                                                                            {{$draft->staffDokumentasi->walikota->sekda->walikota->staffDokumentasi->produkHukum->validated}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->keterangan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->keterangan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->status
                                                                == 'ditolak')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->status}}
                                                                            oleh
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->draft_admins->validated}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->draft_admins->draft->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->draft_admins->draft->keterangan_penolakan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <!-- ADMIN FO -->
                                                        <div class="row border-top">
                                                            <div class="col-1 px-0">
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->status
                                                                == 'diterima')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #198754;"></i>
                                                                @endif

                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->status
                                                                == 'menunggu')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #ffc107;"></i>
                                                                @endif

                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->status
                                                                == 'ditolak')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>
                                                                @endif
                                                            </div>
                                                            <div class="col-2 text-start px-0">
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->status
                                                                == 'menunggu')
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->updated_at))}}
                                                                @else
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->updated_at))}}
                                                                @endif
                                                            </div>
                                                            <div class="col-1 border-start px-0">
                                                            </div>
                                                            <div class="col text-start ps-0">
                                                                <p class="text-uppercase fw-bold mb-0">admin fo</p>
                                                                <p class="mb-0">Keterangan :</p>

                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->status
                                                                == 'menunggu')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->status}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif

                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->status
                                                                == 'diterima')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0 mb-1">
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->status}}
                                                                        oleh
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->validated}}
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->keterangan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{ $draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->keterangan }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->status
                                                                == 'ditolak')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0 mb-1">
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->status}}
                                                                        oleh
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->validated}}
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{ $draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin->draft->keterangan_penolakan }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                            </div>
                                                        </div>

                                                        <!-- STAFF UU -->
                                                        @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->admin_id))
                                                        <div class="row border-top">
                                                            <div class="col-1 px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status
                                                                == 'diterima')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #198754;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status
                                                                == 'menunggu')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #ffc107;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status
                                                                == 'ditolak')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-2 text-start px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status
                                                                == 'menunggu')
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->updated_at))}}
                                                                @else
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->updated_at))}}
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-1 border-start px-0">
                                                            </div>
                                                            <div class="col text-start ps-0">
                                                                <p class="text-uppercase fw-bold mb-0">staff
                                                                    perundang-undangan</p>
                                                                <p class="mb-0">Keterangan :</p>

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status
                                                                == 'menunggu')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status
                                                                == 'diterima')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0 mb-1">
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status}}
                                                                        oleh
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->validated}}
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->keterangan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{ $draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->keterangan }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status
                                                                == 'ditolak')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0 mb-1">
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->status}}
                                                                        oleh
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->validated}}
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{ $draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staffUndang->keterangan_penolakan }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <!-- KASUBAG PERUNDANG-UNDANGAN -->
                                                        @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->staff_undang_id))
                                                        <div class="row border-top">
                                                            <div class="col-1 px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status
                                                                == 'diterima')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #198754;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status
                                                                == 'menunggu')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #ffc107;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status
                                                                == 'ditolak oleh kabag' ||
                                                                $draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status
                                                                == 'ditolak')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-2 text-start px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status
                                                                == 'menunggu' ||
                                                                $draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status
                                                                == 'ditolak oleh kabag')
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->updated_at))}}
                                                                @else
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->updated_at))}}
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-1 border-start px-0">
                                                            </div>
                                                            <div class="col text-start ps-0">
                                                                <p class="text-uppercase fw-bold mb-0">kasubag
                                                                    perundang-undangan</p>
                                                                <p class="mb-0">Keterangan :</p>

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status
                                                                == 'menunggu')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status
                                                                == 'diterima')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status}}
                                                                            oleh
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->validated}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->keterangan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->keterangan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status
                                                                == 'ditolak')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status}}
                                                                            oleh
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->validated}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->keterangan_penolakan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status
                                                                == 'ditolak oleh kabag')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->status}}
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->kabag->validated}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubagUndang->keterangan_penolakan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <!-- KABAG -->
                                                        @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kasubag_undang_id))
                                                        <div class="row border-top">
                                                            <div class="col-1 px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'diterima')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #198754;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'menunggu')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #ffc107;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'ditolak' ||
                                                                $draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'ditolak oleh sekda' ||
                                                                $draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'ditolak oleh walikota')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-2 text-start px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'menunggu' ||
                                                                $draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'ditolak oleh sekda' ||
                                                                $draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'ditolak oleh walikota')
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->updated_at))}}
                                                                @else
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->updated_at))}}
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-1 border-start px-0">
                                                            </div>
                                                            <div class="col text-start ps-0">
                                                                <p class="text-uppercase fw-bold mb-0">kabag</p>
                                                                <p class="mb-0">Keterangan :</p>

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'menunggu')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'diterima')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status}}
                                                                            oleh
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->validated}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->keterangan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->keterangan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'ditolak')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status}}
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->validated}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->keterangan_penolakan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'ditolak oleh sekda')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status}}
                                                                            oleh
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->kepalaDinas->validated}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->keterangan_penolakan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status
                                                                == 'ditolak oleh walikota')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->status}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->keterangan_penolakan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <!-- KEPALA DINAS -->
                                                        @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag_id))
                                                        <div class="row border-top">
                                                            <div class="col-1 px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->status
                                                                == 'diterima')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #198754;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->status
                                                                == 'menunggu')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #ffc107;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->status
                                                                == 'ditolak oleh sekda')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->status
                                                                == 'ditolak oleh walikota')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-2 text-start px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->status
                                                                == 'menunggu' ||
                                                                $draft->staffDokumentasi->walikota->sekda->kepalaDinas->status
                                                                == 'ditolak oleh sekda')
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->updated_at))}}
                                                                @else
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda->kepalaDinas->updated_at))}}
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-1 border-start px-0">
                                                            </div>
                                                            <div class="col text-start ps-0">
                                                                <p class="text-uppercase fw-bold mb-0">kepala dinas</p>
                                                                <p class="mb-0">Keterangan :</p>

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->kepalaDinas->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->status
                                                                == 'menunggu')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->status}}
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->status
                                                                == 'diterima')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0 mb-1">
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->status}}
                                                                        oleh
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->validated}}
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->keterangan)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0 mb-1">
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->keterangan}}
                                                                    </div>
                                                                </div>
                                                                @endif

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->status
                                                                == 'ditolak oleh sekda')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0 mb-1">
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->status}}
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->sekda->validated}}
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0 mb-1">
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->keterangan_penolakan}}
                                                                    </div>
                                                                </div>
                                                                @endif

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->kepalaDinas->status
                                                                == 'ditolak oleh walikota')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0 mb-1">
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->status}}
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->sekda->validated}}
                                                                    </div>
                                                                </div>
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0 mb-1">
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->keterangan_penolakan}}
                                                                    </div>
                                                                </div>
                                                                @endif

                                                                @else
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->status}}
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <!-- SEKDA -->
                                                        @if(isset($draft->staffDokumentasi->walikota->sekda->kepala_dinas_id))
                                                        <div class="row border-top">
                                                            <div class="col-1 px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->status ==
                                                                'diterima')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #198754;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->status
                                                                == 'menunggu')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #ffc107;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->status
                                                                == 'ditolak' ||
                                                                $draft->staffDokumentasi->walikota->sekda->status ==
                                                                'ditolak oleh walikota')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-2 text-start px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->status ==
                                                                'menunggu' ||
                                                                $draft->staffDokumentasi->walikota->sekda->status ==
                                                                'ditolak oleh walikota')
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda-> updated_at))}}
                                                                @else
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->sekda->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->sekda->updated_at))}}
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-1 border-start px-0">
                                                            </div>
                                                            <div class="col text-start ps-0">
                                                                <p class="text-uppercase fw-bold mb-0">sekda</p>
                                                                <p class="mb-0">Keterangan :</p>

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->status ==
                                                                'menunggu' ||
                                                                $draft->staffDokumentasi->walikota->sekda->status ==
                                                                'ditolak oleh walikota' ||
                                                                $draft->staffDokumentasi->walikota->sekda->status ==
                                                                'ditolak')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->status}}
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                @else
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0 mb-1">
                                                                        {{$draft->staffDokumentasi->walikota->sekda->status}}
                                                                        oleh
                                                                        {{$draft->staffDokumentasi->walikota->sekda->validated}}
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->staffDokumentasi->walikota->sekda->status))
                                                                @if($draft->staffDokumentasi->walikota->sekda->status ==
                                                                'diterima')
                                                                @if($draft->staffDokumentasi->walikota->sekda->keterangan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->keterangan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->status
                                                                == 'ditolak')
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->keterangan_penolakan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif

                                                                @elseif($draft->staffDokumentasi->walikota->sekda->status
                                                                == 'ditolak oleh walikota')
                                                                @if($draft->staffDokumentasi->walikota->sekda->kepalaDinas->kabag->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->sekda->keterangan_penolakan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif

                                                            </div>
                                                        </div>
                                                        @endif

                                                        <!-- WALIKOTA -->
                                                        @if(isset($draft->staffDokumentasi->walikota->sekda_id))
                                                        <div class="row border-top">
                                                            <div class="col-1 px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota->status))
                                                                @if($draft->staffDokumentasi->walikota->status ==
                                                                'diterima')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #198754;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->status ==
                                                                'menunggu')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #ffc107;"></i>

                                                                @elseif($draft->staffDokumentasi->walikota->status ==
                                                                'ditolak')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-2 text-start px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota->status))
                                                                @if($draft->staffDokumentasi->walikota->status ==
                                                                'menunggu')
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->updated_at))}}
                                                                @else
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->walikota->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->walikota->updated_at))}}

                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-1 border-start px-0">
                                                            </div>
                                                            <div class="col text-start ps-0">
                                                                <p class="text-uppercase fw-bold mb-0">walikota</p>
                                                                <p class="mb-0">Keterangan :</p>

                                                                @if(isset($draft->staffDokumentasi->walikota->status))
                                                                @if($draft->staffDokumentasi->walikota->status ==
                                                                'menunggu')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->status}}
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                @else
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0 mb-1">
                                                                        {{$draft->staffDokumentasi->walikota->status}}
                                                                        oleh
                                                                        {{$draft->staffDokumentasi->walikota->validated}}
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->staffDokumentasi->walikota->status))
                                                                @if($draft->staffDokumentasi->walikota->status ==
                                                                'diterima')
                                                                @if($draft->staffDokumentasi->walikota->keterangan !=
                                                                NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->keterangan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->staffDokumentasi->walikota->status))
                                                                @if($draft->staffDokumentasi->walikota->status ==
                                                                'ditolak')
                                                                @if($draft->staffDokumentasi->walikota->keterangan_penolakan
                                                                != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-1" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->walikota->kabag->keterangan_penolakan}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif

                                                            </div>
                                                        </div>
                                                        @endif

                                                        <!-- STAFF DOKUMENTASI -->
                                                        @if(isset($draft->walikota_id))
                                                        <div class="row border-top">
                                                            <div class="col-1 px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota_id))
                                                                @if($draft->staffDokumentasi->status == 'diterima')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #198754;"></i>

                                                                @elseif($draft->staffDokumentasi->status == 'menunggu')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #ffc107;"></i>

                                                                @elseif($draft->staffDokumentasi->status == 'ditolak')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-2 text-start px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota_id))
                                                                @if($draft->staffDokumentasi->status == 'menunggu')
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->updated_at))}}
                                                                @else
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->updated_at))}}
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-1 border-start px-0">
                                                            </div>
                                                            <div class="col text-start ps-0">
                                                                <p class="text-uppercase fw-bold mb-0">staff dokumentasi
                                                                </p>
                                                                <p class="mb-0">Keterangan :</p>

                                                                @if(isset($draft->staffDokumentasi->walikota_id))
                                                                @if($draft->staffDokumentasi->status == 'menunggu')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-0" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->status}}</p>
                                                                    </div>
                                                                </div>

                                                                @else
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        {{$draft->staffDokumentasi->status}} oleh
                                                                        {{$draft->staffDokumentasi->validated}}
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->staffDokumentasi->walikota_id))
                                                                @if($draft->staffDokumentasi->status == 'diterima')
                                                                @if($draft->staffDokumentasi->keterangan != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->keterangan}}</p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <!-- KASUBAG DOKUMENTASI -->
                                                        @if(isset($draft->staff_dokumentasi_id))
                                                        <div class="row border-top">
                                                            <div class="col-1 px-0">
                                                                @if(isset($draft->status))
                                                                @if($draft->status == 'diterima')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #198754;"></i>

                                                                @elseif($draft->status == 'menunggu')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #ffc107;"></i>

                                                                @elseif($draft->status == 'ditolak')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-2 text-start px-0">
                                                                @if(isset($draft->status))
                                                                @if($draft->status == 'menunggu')
                                                                {{date('d-m-Y', strtotime($draft->updated_at))}}
                                                                {{date('H:i', strtotime($draft->updated_at))}}
                                                                @else
                                                                {{date('d-m-Y', strtotime($draft->updated_at))}}
                                                                {{date('H:i', strtotime($draft->updated_at))}}

                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-1 border-start px-0">
                                                            </div>
                                                            <div class="col text-start ps-0">
                                                                <p class="text-uppercase fw-bold mb-0">kasubag
                                                                    dokumentasi</p>
                                                                <p class="mb-0">Keterangan :</p>

                                                                @if(isset($draft->status))
                                                                @if($draft->status == 'menunggu')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-0" style="text-align: justify;">
                                                                            {{$draft->status}}</p>
                                                                    </div>
                                                                </div>

                                                                @else
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        {{$draft->status}} oleh {{$draft->validated}}
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->status))
                                                                @if($draft->status == 'diterima')
                                                                @if($draft->keterangan != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p style="text-align: justify;">
                                                                            {{$draft->keterangan}}</p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif

                                                            </div>
                                                        </div>
                                                        @endif

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <!-- Modal Trayek -->
                                        <div class="modal fade " id="trayek{{$draft->id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Trayek</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <!-- STAFF DOKUMENTASI -->
                                                        @if(isset($draft->staffDokumentasi->walikota_id))
                                                        <div class="row border-top">
                                                            <div class="col-1 px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota_id))
                                                                @if($draft->staffDokumentasi->status == 'diterima')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #198754;"></i>

                                                                @elseif($draft->staffDokumentasi->status == 'menunggu')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #ffc107;"></i>

                                                                @elseif($draft->staffDokumentasi->status == 'ditolak')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-2 text-start px-0">
                                                                @if(isset($draft->staffDokumentasi->walikota_id))
                                                                @if($draft->staffDokumentasi->status == 'menunggu')
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->updated_at))}}
                                                                @else
                                                                {{date('d-m-Y', strtotime($draft->staffDokumentasi->updated_at))}}
                                                                {{date('H:i', strtotime($draft->staffDokumentasi->updated_at))}}
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-1 border-start px-0">
                                                            </div>
                                                            <div class="col text-start ps-0">
                                                                <p class="text-uppercase fw-bold mb-0">staff dokumentasi
                                                                </p>
                                                                <p class="mb-0">Keterangan :</p>

                                                                @if(isset($draft->staffDokumentasi->walikota_id))
                                                                @if($draft->staffDokumentasi->status == 'menunggu')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-0" style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->status}}</p>
                                                                    </div>
                                                                </div>

                                                                @else
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        {{$draft->staffDokumentasi->status}} oleh
                                                                        {{$draft->staffDokumentasi->validated}}
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->staffDokumentasi->walikota_id))
                                                                @if($draft->staffDokumentasi->status == 'diterima')
                                                                @if($draft->staffDokumentasi->keterangan != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p style="text-align: justify;">
                                                                            {{$draft->staffDokumentasi->keterangan}}</p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <!-- KASUBAG DOKUMENTASI -->
                                                        @if(isset($draft->staff_dokumentasi_id))
                                                        <div class="row border-top">
                                                            <div class="col-1 px-0">
                                                                @if(isset($draft->status))
                                                                @if($draft->status == 'diterima')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #198754;"></i>

                                                                @elseif($draft->status == 'menunggu')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #ffc107;"></i>

                                                                @elseif($draft->status == 'ditolak')
                                                                <i class="fa-solid fa-circle"
                                                                    style="color: #dc3545;"></i>
                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-2 text-start px-0">
                                                                @if(isset($draft->status))
                                                                @if($draft->status == 'menunggu')
                                                                {{date('d-m-Y', strtotime($draft->updated_at))}}
                                                                {{date('H:i', strtotime($draft->updated_at))}}
                                                                @else
                                                                {{date('d-m-Y', strtotime($draft->updated_at))}}
                                                                {{date('H:i', strtotime($draft->updated_at))}}

                                                                @endif
                                                                @endif
                                                            </div>
                                                            <div class="col-1 border-start px-0">
                                                            </div>
                                                            <div class="col text-start ps-0">
                                                                <p class="text-uppercase fw-bold mb-0">kasubag
                                                                    dokumentasi</p>
                                                                <p class="mb-0">Keterangan :</p>

                                                                @if(isset($draft->status))
                                                                @if($draft->status == 'menunggu')
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p class="mb-0" style="text-align: justify;">
                                                                            {{$draft->status}}</p>
                                                                    </div>
                                                                </div>

                                                                @else
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        {{$draft->status}} oleh {{$draft->validated}}
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif

                                                                @if(isset($draft->status))
                                                                @if($draft->status == 'diterima')
                                                                @if($draft->keterangan != NULL)
                                                                <div class="row">
                                                                    <div class="col-1 pe-0">
                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col ps-0">
                                                                        <p style="text-align: justify;">
                                                                            {{$draft->keterangan}}</p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endif
                                                                @endif

                                                            </div>
                                                        </div>
                                                        @endif

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if($draft->status == 'menunggu')
                                        <a href="/dashboard/kasubagd/editprodukhukum/{{$draft->id}}"
                                            class="badge bg-info border-0 text-decoration-none">edit</a>
                                        @endif

                                        @if($draft->status == 'diterima' || $draft->status == 'ditolak')
                                        <a href="/dashboard/kasubagd/readprodukhukum/{{$draft->id}}"
                                            class="badge bg-primary border-0 text-decoration-none">lihat</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
<script type="text/javascript">
$(document).ready(function() {
    $('#tableKasubagDokumentasi').DataTable();
});
</script>
@endsection

@endsection