@extends('layout')

@section('content')
<h2>Edit Author {{ $author }}</h2>
    <form method="POST" class="addForm" action="/author">
        @csrf
      <label for="name">Name</label>
      <input type="text" name="name" placeholder="{{ $author }}" value="{{old('name')}}">
      @error('name')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
      <input type="hidden" name="author" value="{{ $author }}">
      <input type="submit" value="Submit">
    </form>
@endsection