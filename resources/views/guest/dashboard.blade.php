@extends('guest.main')

@section('css')
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}"> -->
<link rel="stylesheet" href="{{asset('css/guest/dashboard2.css')}}">
@endsection

@section('content')
<section>
  <div class="outer-container d-flex align-items-center justify-content-center">
    <div class="inner-container">
      <div class="table-header d-flex flex-row align-items-center justify-content-between">
        <img src="{{asset('img\bg/logo_jdih.png')}}" alt="logo_jdih" class="logo-table">
        <h3 style="color: #787878; font-weight: bold;">Daftar Katalog Produk Hukum Kota Batu</h3>
      </div>
      <div class="table-responsive">
        <table class="table" id="tableKasubagDokumentasi">
          <thead>
            <tr class="text-center">
              <th class="col-sm-1">No</th>
              <th class="col-sm-1">Nomor</th>
              <th class="col-1">Tahun</th>
              <th class="col-3">Judul</th>
              <th class="col-3">Keterangan Dokumen</th>
              <th class="col-1">Jenis</th>
              <th class="col-3">Tanggal Pengundangan</th>
              <th class="col-1">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($draft->where('publikasi',1)->sortDesc() as $draft)
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
              <td>
                <div class="mx-auto">
                  <a href="/dashboard/readprodukhukum/{{$draft->id}}" class="badge">Lihat</a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#tableKasubagDokumentasi').DataTable();
  });
</script>
@endsection

@endsection