@extends('layouts.app')
<!--  -->
@section('title','FO Maps | Daftar Tiang FO') @section('subtitle', "Daftar Tiang
FO") @section('nav-menu')
<div class="nav_list">
  <a href="{{ route('daftar_tiang') }}" class="nav_link active">
    <i class="bx bx-current-location nav_icon"></i>
    <span class="nav_name">Daftar Tiang FO</span>
  </a>
</div>
<div class="nav_list">
  <a href="{{ route('daftar_instansi') }}" class="nav_link">
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
        placeholder="Cari alamat tiang"
        aria-label="Search"
      />
    </form>
  </div>
  <div class="col-6 col-md-3">
    <a href="{{ route('tambah_tiang') }}" class="btn btn-dark"
      ><i class="fa fa-Tiang-plus"></i> Tambah Tiang</a
    >
  </div>
  <div class="col-12 col-md-3">
    {!! $tiangs->links() !!}
  </div>
</div>

<div class="row">
  @if ($message = Session::get('success'))
  <div class="col-12">
    <div class="alert alert-success my-3">
      {{ $message }}
    </div>
    @elseif ($message = Session::get('deleted'))
    <div class="alert alert-danger my-3">
      {{ $message }}
    </div>
  </div>
  @endif
  <div class="col-12 table-responsive">
    <table id="myTable" class="table table-striped">
      <thead>
        <tr>
          <td>#</td>
          <td>Alamat</td>
          <td>@sortablelink('tahun_pembangunan','Tahun Pembangunan')</td>
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
          <td class="text-center" colspan="8">Tidak ada data Tiang</td>
        </tr>
        @endif
        <!--  -->
        @foreach($tiangs as $tiang)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{$tiang->alamat}}</td>
          <td>{{$tiang->tahun_pembangunan}}</td>
          <td>{{$tiang->tinggi}}</td>
          <td>{{$tiang->tipe}}</td>
          <td>{{$tiang->latitude}}</td>
          <td>{{$tiang->longitude}}</td>
          <td>
            <form
              class="d-none"
              action="{{route ('delete_tiang',$tiang->id)}}"
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
            <a class="me-3" href="{{route ('edit_tiang', $tiang->id)}}"
              ><i class="bi bi-pencil-square"></i>
            </a>

            <a onclick="document.getElementById('del-btn').click()" href="#"
              ><i class="bi bi-trash"></i
            ></a>
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
