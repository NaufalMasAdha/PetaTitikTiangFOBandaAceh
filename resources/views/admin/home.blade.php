@extends('layouts.app')
<!--  -->
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Daftar User</h1>
    </div>
  </div>

  <div id="ws" class="row">
    <div class="col">
      <a href="add" class="btn btn-primary">Tambah User</a>
    </div>
    <div class="col">
      <!-- Search form -->
      <form action="">
        <input
          id="myInput"
          onkeyup="search()"
          class="form-control"
          type="text"
          placeholder="Cari user"
          aria-label="Search"
        />
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col col-12">
      <table id="myTable" class="styled-table">
        <thead>
          <tr>
            <td>#</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Role</td>
            <td>MOD</td>
          </tr>
        </thead>

        <tbody>
          @foreach($users as $u)
          <tr>
            <td>{{$u->id}}</td>
            <td>{{$u->name}}</td>
            <td>{{$u->email}}</td>
            <td>{{$u->role}}</td>
            <td>
              <a href="#">Edit</a>
              <a href="#">Add</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="{{asset('js/script.js')}}"></script>
@endsection
