@extends('layouts.app')

@section('title', 'Home | Ganendra')

@section('content')

<div class="container">
   <div class="row">
      <div class="col">
         <div>
            <h1 style="margin-bottom: 5px;">Selamat Datang di Gudang Informasi Olahraga.</h1>
            <p style="margin-bottom: 30px;">Nikmati dan Saksikan Kumpulan Informasi Olahraga Dunia.</p>
            <div class="container">
               <div class="row">
                  <div class="col">
                     <div class="card">
                        <div class="card-header">
                           <h2>Daftar Tim Basket</h2>
                        </div>
                        <div class="card-body">
                           <div class="film-list" style="display: flex; flex-wrap: wrap;">
                              @foreach($baskets as $basket)
                              <div class="film-card" style="margin: 10px; width: 150px; text-align: center;">
                                 <img src="{{ asset('storage/' . $basket->logo)}}" alt="logo {{$basket->logo}}" style="width: 100%; height: auto;">
                                 <a href="{{ route('baskets.show', $basket->slug) }}" style="text-decoration: none;">
                                    <p style="margin-top : 10px">{{$basket->nama_tim}} ({{$basket->tahun}})</p>
                                 </a>
                              </div>
                              @endforeach
                           </div>
                           <div class="text-end">
                              <a href="{{ route('baskets.index') }}" class="btn btn-primary">Go somewhere</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="container">
   <div class="row">
      <div class="col">
         <div style="margin-top: 20px; margin-bottom: 20px;">
            <div class="container">
               <div class="row">
                  <div class="col">
                     <div class="card">
                        <div class="card-header">
                           <h2>Daftar Tim Bola</h2>
                        </div>
                        <div class="card-body">
                           <div class="film-list" style="display: flex; flex-wrap: wrap;">
                              @foreach($bolas as $bola)
                              <div class="film-card" style="margin: 10px; width: 150px; text-align: center;">
                                 <img src="{{ asset('storage/' . $bola->logo)}}" alt="logo {{$bola->logo}}" style="width: 100%; height: auto;">
                                 <a href="{{ route('bolas.show', $bola->slug) }}" style="text-decoration: none;">
                                    <p style="margin-top : 10px">{{$bola->nama_tim}} ({{$bola->tahun}})</p>
                                 </a>
                              </div>
                              @endforeach
                           </div>
                           <div class="text-end">
                              <a href="{{ route('bolas.index') }}" class="btn btn-primary">Go somewhere</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection