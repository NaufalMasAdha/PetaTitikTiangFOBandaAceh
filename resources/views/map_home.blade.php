@extends('layouts.app')
<!--  -->
@section('title','FO Maps | Dashboard') @section('subtitle', "Dashboard")
@section('style')
<link rel="stylesheet" href="{{ asset('css/map.css') }}" />
@mapstyles
<!--  -->
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
