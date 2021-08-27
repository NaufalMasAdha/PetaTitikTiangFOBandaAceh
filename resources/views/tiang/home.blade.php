@extends('layouts.app')
<!--  -->
@section('title','FO Maps | Daftar Tiang FO') @section('subtitle', "Daftar Tiang
FO ($tahun)")
<!--  -->
@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@endsection
<!--  -->
@section('content')
<div class="row">
  <div class="col-8 col-md-4 mb-2">
    <!-- Search form -->
    <form action="">
      <input
        id="myInput"
        onkeyup="search()"
        class="form-control"
        type="text"
        placeholder="Cari nama tiang"
        aria-label="Search"
      />
    </form>
  </div>
  <div class="col-auto mb-2">
    <a
      title="Tambah Data"
      href="{{ route('tambah_tiang', $tahun) }}"
      class="btn btn-dark"
      ><i class="bi bi-plus-square"></i
    ></a>
  </div>
</div>

<div class="row">
  <div class="col-12 table-responsive">
    <table id="myTable" class="table table-striped">
      <thead>
        <tr>
          <td>#</td>
          <td>@sortablelink('nama', 'Nama Tiang')</td>
          <td>Alamat</td>
          <td>Tahun Pembangunan</td>
          <td>@sortablelink('tinggi', 'Tinggi')</td>
          <td>@sortablelink('tipe', 'Tipe')</td>
          <td>Latitude</td>
          <td>Longitude</td>
          <td><i class="bi bi-gear"></i></td>
        </tr>
      </thead>

      <tbody>
        @if(count($tiangs) == 0)
        <tr>
          <td class="text-center" colspan="9">Tidak ada data Tiang</td>
        </tr>
        @endif
        <!--  -->
        @foreach($tiangs as $tiang)
        <tr>
          <td>{{ $i++ }}</td>
          <td>
            {{$tiang->nama}}
          </td>
          <td>
            {{$tiang->alamat}}
          </td>
          <td>{{$tiang->tahun_pembangunan}}</td>
          <td>{{$tiang->tinggi}}</td>
          <td>{{$tiang->tipe}}</td>
          <td>{{$tiang->latitude}}</td>
          <td>{{$tiang->longitude}}</td>
          <td class="d-flex">
            <form
              class="d-none"
              action="{{route ('delete_tiang',$tiang->id)}}"
              method="POST"
            >
              <button
                id="del-btn-{{ $tiang->id }}"
                type="submit"
                class="btn btn-outline-danger w-100"
                onclick="return confirm('Hapus data ini?')"
              ></button>
              @csrf @method('delete')
            </form>
            <a class="me-3" href="{{route ('edit_tiang', $tiang->id)}}"
              ><i class="bi bi-pencil-square"></i>
            </a>

            <a
              onclick="document.getElementById('del-btn-{{ $tiang->id }}').click()"
              href="#"
              ><i class="bi bi-trash"></i
            ></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="col-auto col-md-3">
      {!! $tiangs->links() !!}
    </div>
    <div class="col-auto">
      <strong> Total data : {{ $tiangs->total() }} </strong>
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
