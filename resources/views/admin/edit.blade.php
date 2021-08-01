@extends('layouts/app')
<!--  -->
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-md-4">
      <form
        class="form-group"
        action="{{route ('admin_update',$user->id)}}"
        method="POST"
      >
        @method('post')
        <!--  -->
        @csrf
        <div class="form-group">
          <label for="nama">Nama </label>
          <input
            autocomplete="off"
            class="form-control @error('name') is-invalid @enderror"
            type="text"
            name="name"
            id="nama"
            value="{{$user->name}}"
          />
          @error('name')
          <span class="text-danger" role="alert">
            {{ $message }}
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email </label>
          <input
            autocomplete="off"
            class="form-control @error('email') is-invalid @enderror"
            type="email"
            name="email"
            id="email"
            value="{{$user->email}}"
          />
          @error('email')
          <span class="text-danger" role="alert">
            {{ $message }}
          </span>
          @enderror
        </div>

        <div class="input-group mb-3">
          <label class="input-group-text" for="role">Role</label>
          <select class="form-select" id="role" name="role">
            <option
              value="{{$user->role}}"
              selected
              hidden
              >{{$user->role}}</option
            >
            <option value="Pimpinan">Pimpinan</option>
            <option value="Teknisi">Teknisi</option>
          </select>
        </div>
        <div class="form-group">
          <label for="password"
            >Password (Kosongkan jika tidak ingin ubah password)</label
          >
          <input
            autocomplete="off"
            class="form-control @error('password') is-invalid @enderror"
            type="password"
            name="password"
            id="password"
          />
          @error('password')
          <span class="text-danger" role="alert">
            {{ $message }}
          </span>
          @enderror
        </div>
        <input class="btn btn-primary w-100" type="submit" value="SUBMIT" />
      </form>

      <form action="{{route ('admin_delete',$user->id)}}" method="POST">
        @csrf @method('delete')
        <button
          type="submit"
          class="btn btn-danger w-100"
          onclick="return confirm('Hapus akun ini?')"
        >
          HAPUS USER INI
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
