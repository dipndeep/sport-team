@extends('layouts.app')

@section('title', 'Tim Bola | Ganendra')

@section('content')
<div class="container mt-4">
   <h1 class="mb-4">Detail Tim Bola</h1>
   <div class="row justify-content-start">
      <div class="col-md-4">
         <div class="card">
            <img class="card-img-top" src="{{ asset('storage/' . $bola->logo) }}" alt="{{ $bola->nama_tim }}">
            <div class="card-body">
               <h4 class="card-title">{{ $bola->nama_tim }}</h4>
               <p class="card-text"><strong>Tahun : </strong> {{ $bola->tahun }}</p>
               <p class="card-text"><strong>Pelatih : </strong> {{ $bola->pelatih }}</p>
               <p class="card-text"><strong>Kandang : </strong> {{ $bola->kandang }}</p>
               <p class="card-text"><strong>Juara : </strong> {{ $bola->juara }}</p>
               <p class="card-text">{{ $bola->sejarah }}</p>
               <a href="{{ route('bolas.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection