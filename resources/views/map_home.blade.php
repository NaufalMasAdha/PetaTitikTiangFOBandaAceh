@extends('layouts/app')
<!--  -->
@section('title','FO Maps | Dashboard') @section('subtitle', "Dashboard")
@section('style')
<link rel="stylesheet" href="{{ asset('css/map.css') }}" />
@mapstyles
<!--  -->
@endsection

<!--  -->
@section('content')
<div class="filter">
  <div class="dropdown">
    <i
      class="bi bi-filter"
      id="btn_filter"
      data-bs-toggle="dropdown"
      aria-expanded="false"
    ></i>
    <ul class="dropdown-menu" aria-labelledby="btn_filter">
      <div class="ms-3">
        <!--  <img
          height="20px"
          src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png"
          alt="icon"
        />
        <label class="form-check-label" for="flexCheckChecked">
          Instansi
        </label>
      </div>
      <div class="ms-3">
        <img
          height="20px"
          src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png"
          alt="icon"
        />
        <label class="form-check-label" for="flexCheckChecked">
          Tiang
        </label>-->
        <small><strong>Tampilkan berdasarkan tahun pembangunan</strong></small>
      </div>
      <hr />
      @foreach($thn as $t)
      <li>
        <a
          class="dropdown-item"
          href="{{ route('map_home',$t->tahun_pembangunan) }}"
          >Tiang FO ({{ $t->tahun_pembangunan }})</a
        >
      </li>
      @endforeach
    </ul>
  </div>
</div>

@map($map)
<!--  -->
@endsection

<!--  -->
@section('scripts')
<!-- Script Gonoware -->
@mapscripts
<script src="{{ asset('js/map.js') }}"></script>
<!--  -->
@endsection
