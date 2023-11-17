<!-- laravel form to create Todo -->

@extends('layouts.base')

@section('title', 'Create Todo')

@section('content')
  <div class="title m-b-md">Create Todo</div>

  <form action="/todo/create" id="form">
    <label for="texte">Texte</label>
    <input type="text" name="texte" id="texte">
    <input type="submit" value="Create">
  </form>

  <script>
    document.querySelector('#form').addEventListener('submit', function(e) {
      location.href = '/todo';
    });
  </script>
@endsection
