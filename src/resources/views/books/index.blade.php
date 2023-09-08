@extends('layout')

@section('content')
    @include('partials._search')
    @include('partials._action-buttons')
    @if (isset($author))
        @include('partials._books-display', ['books' => $books, 'author' => $author])
    @else
        @include('partials._books-display', ['books' => $books])
    @endif
@endsection
