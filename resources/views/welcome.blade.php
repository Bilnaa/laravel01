@extends('layouts.base') 

@section('title', 'Bienvenue') 

@section('content')
  <div class="title m-b-md">Laravel</div>

  <div class="links">
    <a href="/ping">Ping</a>
    <a href="/pong">Pong</a>
    <!-- if route /todo exists -->
    @if (Route::has('todo'))
    <a href="{{ route('todo') }}"Todos List</a>
    @endif
  </div>
@endsection