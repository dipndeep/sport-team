@extends('layouts.app')

@section('title', 'Tim Basket | Ganendra')

@section('content')
<div class="container">
   <h1 class="mb-4">Daftar Tim Basket</h1>
   @if(session('success'))
   <div class="alert alert-success">
      {{ session('success') }}
   </div>
   @endif

   <!-- Card untuk menampilkan daftar film -->
   <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
         <h5 class="card-title">Daftar Tim Basket</h5>
         <a href="{{ route('baskets.create') }}" class="btn btn-primary">Tambah Tim</a>
      </div>
      <div class="card-body">
         <div class="row">
            @foreach($baskets as $basket)
            <div class="col-md-4 mb-4"> <!-- Menggunakan col-md-4 untuk 3 card dalam satu baris -->
               <div class="card">
                  <img class="card-img-top" src="{{ asset('storage/' . $basket->logo) }}" alt="{{ $basket->nama_tim }}">
                  <div class="card-body">
                     <h3 class="card-title" style="margin-bottom: 20px;">{{ $basket->nama_tim }}</h3>
                     <p class="card-text" style="margin-bottom: 5px;"><strong>Tahun : </strong> {{ $basket->tahun }}</p>
                     <p class="card-text" style="margin-bottom: 5px;"><strong>Pelatih : </strong> {{ $basket->pelatih }}</p>
                     <p class="card-text" style="margin-bottom: 5px;"><strong>Kandang : </strong> {{ $basket->kandang }}</p>
                     <p class="card-text" style="margin-bottom: 5px;"><strong>Juara : </strong> {{ $basket->juara }}</p>
                     <div class="d-flex justify-content-start mt-3"> <!-- Memindahkan tombol ke kiri -->
                        <a href="{{ route('baskets.show', $basket->slug) }}" class="btn btn-info me-2">Detail</a>
                        <a href="{{ route('baskets.edit', $basket->slug) }}" class="btn btn-warning me-2">Edit</a>
                        <form action="{{ route('baskets.destroy', $basket->slug) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tim basket ini?')">Delete</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>
@endsection