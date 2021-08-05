@extends('layouts.app')
<!--  -->
@section('title','FO Maps | Daftar Instansi') @section('subtitle', "Daftar
Instansi") @section('nav-menu')
<div class="nav_list">
  <a href="{{ route('daftar_tiang') }}" class="nav_link">
    <i class="bx bx-current-location nav_icon"></i>
    <span class="nav_name">Daftar Tiang FO</span>
  </a>
</div>
<div class="nav_list">
  <a href="{{ route('daftar_instansi') }}" class="nav_link active">
    <i class="bx bx-buildings nav_icon"></i>
    <span class="nav_name">Daftar Instansi</span>
  </a>
</div>
@endsection
<!--  -->
@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@endsection
<!--  -->
@section('content')
<div class="row">
  <div class="col-6 col-md-4">
    <!-- Search form -->
    <form action="">
      <input
        id="myInput"
        onkeyup="search()"
        class="form-control"
        type="text"
        placeholder="Cari nama instansi"
        aria-label="Search"
      />
    </form>
  </div>
  <div class="col-6 col-md-3">
    <a href="{{ route('tambah_instansi') }}" class="btn btn-dark"
      ><i class="fa fa-instansi-plus"></i> Tambah Instansi</a
    >
  </div>
  <div class="col-12 col-md-3">
    {!! $instansis->links() !!}
  </div>
</div>

<div class="row">
  @if ($message = Session::get('success'))
  <div class="col-12">
    <div class="alert alert-success">
      {{ $message }}
    </div>
    @endif @if ($message = Session::get('deleted'))
    <div class="alert alert-danger">
      {{ $message }}
    </div>
  </div>
  @endif
  <div class="col-12 table-responsive">
    <table id="myTable" class="table table-striped">
      <thead>
        <tr>
          <td>#</td>
          <td>@sortablelink('nama','Nama Intansi')</td>
          <td>@sortablelink('alamat','Alamat')</td>
          <td>@sortablelink('no_hp', 'No. HP')</td>
          <td>@sortablelink('latitude', 'Latitude')</td>
          <td>@sortablelink('longitude', 'Longitude')</td>
          <td><i class="float-right fa fa-user-cog"></i></td>
        </tr>
      </thead>

      <tbody>
        @if(count($instansis) == 0)
        <tr>
          <td class="text-center" colspan="7">Tidak ada data instansi</td>
        </tr>
        @endif
        <!--  -->
        @foreach($instansis as $i)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{$i->nama}}</td>
          <td>{{$i->alamat}}</td>
          <td>{{$i->no_hp}}</td>
          <td>{{$i->latitide}}</td>
          <td>{{$i->longitude}}</td>
          <td>
            <a
              class="btn btn-sm btn-primary float-right"
              href="{{route ('edit_instansi', $i->id)}}"
              >EDIT</a
            >
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@section('scripts')
<script src="{{asset('js/script.js')}}"></script>
<script
  src="https://kit.fontawesome.com/cd504552aa.js"
  crossorigin="anonymous"
></script>
@endsection
<!--  -->
@endsection
