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
      <li>
        <a class="dropdown-item" href="{{ route('map_home') }}">Semua</a>
      </li>
      <li>
        <a class="dropdown-item" href="{{ route('map_home', 'instansi') }}"
          >Instansi</a
        >
      </li>
      <li>
        <a class="dropdown-item" href="{{ route('map_home','tiang') }}"
          >Tiang FO</a
        >
      </li>
      <hr />
      @foreach($thn as $t)
      <li>
        <a
          class="dropdown-item"
          href="{{ route('map_home',$t->tahun_pembangunan) }}"
        >
          Tiang FO ({{ $t->tahun_pembangunan }})</a
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
