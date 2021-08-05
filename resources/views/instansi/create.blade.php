@extends('layouts.app')
<!--  -->
@section('title','Tambah Instansi') @section('subtitle', "Tambah Instansi")
@section('nav-menu')
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

@section('content')
<h1>Disini nanti ada form tambah tiang dan upload csv</h1>
@endsection
