@extends('layouts.base')

@section('title', 'Todos List')

@section('content')
<div class="title m-b-md">Todos List</div>


<div class="links p-2">
  <a href="/ping">Ping</a>
  <a href="/pong">Pong</a>
  <a href="/todos/create">Create Todo</a>
</div>

<!-- form to create a new todo -->

<form action="/api/todo/create" method="post">
  <input type="text" class="texte p-2" name="texte" placeholder="Ajouter un todo">
  @csrf
  <button type="submit">Ajouter</button>
</form>

<div class="flex flex-grow items-center justify-center h-full text-gray-600 bg-gray-100">


  <div class="max-w-full p-8 bg-white rounded-lg shadow-lg w-96">
    <div class="flex items-center mb-6">
      <svg class="h-8 w-8 text-indigo-500 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
      </svg>
      <h4 class="font-semibold ml-3 text-lg">Mon Todo</h4>
    </div>
    @foreach($todos as $unElement)
    <div class="flex space-between">
				<input class="hidden" type="checkbox" id="{{$unElement -> id}}" {{$unElement -> termine ? 'checked' : ''}} >
				<label class="flex items-center h-10 px-2 rounded cursor-pointer hover:bg-gray-100" for="{{$unElement -> id}}">
					<span class="flex items-center justify-center w-5 h-5 text-transparent border-2 border-gray-300 rounded-full">
						<svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
						</svg>
					</span>
					<span class="ml-4 text-sm">{{$unElement -> texte}}</span>
				</label>	
        @if($unElement -> termine)
        <button class="ml-2 p-2 text-red-500 hover:text-red-700" onclick="supprimerElement('{{$unElement->id}}')">
        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m376-300 104-104 104 104 56-56-104-104 104-104-56-56-104 104-104-104-56 56 104 104-104 104 56 56Zm-96 180q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520Zm-400 0v520-520Z"/></svg>
        </button>
        @endif
			</div>
      
    @endforeach
  </div>

  <script>
    function supprimerElement(id){
      fetch('/api/todo/delete/' + id, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN' : '{{ csrf_token() }}',
          'Content-Type': 'application/json'
        }
      })
      .then(response => response.json())
      .then(data => console.log(data));
      setTimeout(function(){ location.reload(); }, 100);
    }
    document.addEventListener('DOMContentLoaded', function(){
      document.querySelectorAll('input[type=checkbox]').forEach(function(el) {
      el.addEventListener('change', function() {
        if (this.checked) {
          fetch('/api/todo/update/' + el.id, {
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}',
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                termine: 1
              })
            })
            .then(response => response.json())
            .then(data => console.log(data));
            location.reload();
        } else {
          fetch('/api/todo/update/' + el.id, {
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}',
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                termine: 0
              })
            })
            .then(response => response.json())
            .then(data => console.log(data));
            location.reload();
        }
      })
    })
    })
    
  </script>

  @endsection