@extends('layouts.app')

@section('title', 'Tim Bola | Ganendra')

@section('content')
<div class="card mb-4">
   <div class="card-header">
      <h5 class="card-title">Tambah Tim Bola</h5>
   </div>
   <div class="card-body">
      <form action="{{ route('bolas.store') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="mb-3">
            <label for="nama_tim" class="form-label">Nama Tim</label>
            <input type="text" class="form-control" id="nama_tim" name="nama_tim" required>
         </div>
         <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun" required>
         </div>
         <div class="mb-3">
            <label for="pelatih" class="form-label">Pelatih</label>
            <input type="text" class="form-control" id="pelatih" name="pelatih" required>
         </div>
         <div class="mb-3">
            <label for="kandang" class="form-label">Kandang</label>
            <input type="text" class="form-control" id="kandang" name="kandang" required>
         </div>
         <div class="mb-3">
            <label for="juara" class="form-label">Juara</label>
            <input type="text" class="form-control" id="juara" name="juara" required>
         </div>
         <div class="mb-3">
            <label for="sejarah" class="form-label">Sejarah</label>
            <textarea class="form-control" id="sejarah" name="sejarah"></textarea>
         </div>
         <div class="mb-3">
            <label for="logo" class="form-label">Logo Tim</label>
            <input type="file" class="form-control" id="logo" name="logo" required>
         </div>
         <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
   </div>
</div>

@endsection