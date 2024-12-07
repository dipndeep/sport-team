@extends('layouts.app')

@section('title', 'Tim Bola | Ganendra')

@section('content')
<div class="container">
   <h1>Edit Tim Bola</h1>
   <div class="card">
      <div class="card-header">
         <h5>Edit Tim bola: {{ $bola->nama_tim }}</h5>
      </div>
      <div class="card-body">
         <form action="{{ route('bolas.update', $bola->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
               <label for="nama_tim">Nama Tim</label>
               <input type="text" class="form-control" id="nama_tim" name="nama_tim" value="{{ $bola->nama_tim }}" required>
            </div>

            <div class="form-group mb-3">
               <label for="tahun">Tahun</label>
               <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $bola->tahun }}" required>
            </div>

            <div class="form-group mb-3">
               <label for="pelatih">Pelatih</label>
               <input type="text" class="form-control" id="pelatih" name="pelatih" value="{{ $bola->pelatih }}" required>
            </div>

            <div class="form-group mb-3">
               <label for="kandang">Kandang</label>
               <input type="text" class="form-control" id="kandang" name="kandang" value="{{ $bola->kandang }}" required>
            </div>

            <div class="form-group mb-3">
               <label for="juara">Juara</label>
               <input type="text" class="form-control" id="juara" name="juara" value="{{ $bola->juara }}" required>
            </div>

            <div class="form-group mb-3">
               <label for="sejarah">Sejarah</label>
               <textarea class="form-control" id="sejarah" name="sejarah" rows="4">{{ $bola->sejarah }}</textarea>
            </div>

            <div class="form-group mb-3">
               <label for="logo">Logo Tim (optional)</label>
               <input type="file" class="form-control-file" id="logo" name="logo">
               <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti logo.</small>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('bolas.index') }}" class="btn btn-secondary">Batal</a>
         </form>
      </div>
   </div>
</div>
@endsection