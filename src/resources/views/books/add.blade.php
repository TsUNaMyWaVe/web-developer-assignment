@extends('layout')

@section('content')
<h2>Add a book to the database</h2>
    <form method="POST" class="addForm" action="/books">
        @csrf
      <label for="title">Title</label>
      <input type="text" name="title" placeholder="The book's title..." value="{{old('title')}}">
      @error('title')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
  
      <label for="author">Author</label>
      <input type="text" name="author" placeholder="The book's author..." value="{{old('author')}}">
      @error('author')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
      
      <input type="submit" value="Submit">
    </form>
@endsection