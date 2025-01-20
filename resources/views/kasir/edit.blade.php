@extends('layouts.app')

@section('title', '')

@section('content')
<h1>Ubah Kasir</h1>
<form action="{{ route('kasir.update', $kasir->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Menyatakan bahwa ini adalah permintaan PUT untuk update -->
    
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $kasir->nama) }}" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $kasir->email) }}" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection
