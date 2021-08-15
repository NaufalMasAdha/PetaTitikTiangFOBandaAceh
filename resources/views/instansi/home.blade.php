@extends('layouts.app')
<!--  -->
@section('title','FO Maps | Daftar Instansi') @section('subtitle', "Daftar
Instansi")
<!--  -->
@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@endsection
<!--  -->
@section('content')
<div class="row">
  <div class="col-12 col-md-4 mb-2">
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
  <div class="col-auto mb-2">
    <a href="{{ route('tambah_instansi') }}" class="btn btn-dark"
      ><i class="bi bi-plus-square"></i
    ></a>
  </div>
  <div class="col-auto">
    <a
      title="Export semua data ke excel"
      href="{{ route('export_instansi') }}"
      class="btn btn-success @if(count($instansis) == 0) d-none @endif"
    >
      <i class="bi bi-download"></i
    ></a>
  </div>
</div>

<div class="row">
  <div class="col-12 table-responsive">
    <table id="myTable" class="table table-striped">
      <thead>
        <tr>
          <td>#</td>
          <td>@sortablelink('nama','Nama Intansi')</td>
          <td>@sortablelink('alamat','Alamat')</td>
          <td>No. HP</td>
          <td>Latitude</td>
          <td>Longitude</td>
          <td><i class="bi bi-gear"></i></td>
        </tr>
      </thead>

      <tbody>
        @if(count($instansis) == 0)
        <tr>
          <td class="text-center" colspan="7">Tidak ada data instansi</td>
        </tr>
        @endif
        <!--  -->
        @foreach($instansis as $in)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{$in->nama}}</td>
          <td>{{$in->alamat}}</td>
          <td>{{$in->no_hp}}</td>
          <td>{{$in->latitude}}</td>
          <td>{{$in->longitude}}</td>
          <td>
            <form
              class="d-none"
              action="{{route ('delete_instansi',$in->id)}}"
              method="POST"
            >
              <button
                id="del-btn"
                type="submit"
                class="btn btn-outline-danger w-100"
                onclick="return confirm('Hapus data ini?')"
              ></button>
              @csrf @method('delete')
            </form>
            <a class="me-3" href="{{route ('edit_instansi', $in->id)}}"
              ><i class="bi bi-pencil-square"></i
            ></a>

            <a onclick="document.getElementById('del-btn').click()" href="#"
              ><i class="bi bi-trash"></i
            ></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="col-auto col-md-3">
      {!! $instansis->links() !!}
    </div>
    <div class="col-auto">
      <strong> Total data : {{ $instansis->total() }} </strong>
    </div>
  </div>
</div>
@section('scripts')

<script
  src="https://kit.fontawesome.com/cd504552aa.js"
  crossorigin="anonymous"
></script>
@endsection
<!--  -->
@endsection
