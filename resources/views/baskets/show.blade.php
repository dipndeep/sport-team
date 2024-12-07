@extends('layouts.app')

@section('title', 'Tim Basket | Ganendra')

@section('content')
<div class="container mt-4">
   <h1 class="mb-4">Detail Tim Basket</h1>
   <div class="row justify-content-around">
      <div class="col-md-4">
         <div class="card">
            <img class="card-img-top" src="{{ asset('storage/' . $basket->logo) }}" alt="{{ $basket->nama_tim }}">
            <div class="card-body">
               <h4 class="card-title">{{ $basket->nama_tim }}</h4>
               <p class="card-text"><strong>Tahun : </strong> {{ $basket->tahun }}</p>
               <p class="card-text"><strong>Pelatih : </strong> {{ $basket->pelatih }}</p>
               <p class="card-text"><strong>Kandang : </strong> {{ $basket->kandang }}</p>
               <p class="card-text"><strong>Juara : </strong> {{ $basket->juara }}</p>
               <p class="card-text">{{ $basket->sejarah }}</p>
               <a href="{{ route('baskets.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection