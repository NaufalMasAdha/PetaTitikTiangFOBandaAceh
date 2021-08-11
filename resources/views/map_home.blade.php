@extends('layouts.app')
<!--  -->
@section('title','FO Maps | Dashboard') @section('subtitle', "Dashboard")
@section('style')
<link rel="stylesheet" href="{{ asset('css/map.css') }}" />
@mapstyles
<!--  -->
@endsection

<!-- Section menu di sidebar -->
@section('nav-menu')
<div class="nav_list">
  <a href="{{ route('tiang') }}" class="nav_link">
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
@section('content')
    <i class="filter bx bx-filter-alt"></i>
    @map($map)
  </div>
@endsection

<!--  -->
@section('scripts')
<!-- Script Gonoware -->
@mapscripts
<script src="{{ asset('js/map.js') }}"></script>
<!--  -->
@endsection
