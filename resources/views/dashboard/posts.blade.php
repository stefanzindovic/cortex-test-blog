@extends('layouts.dashboard')

@section('title')
    Posts
@endsection

@section('body')
    @if (count($posts) == 0)
        <h6 class="lead p-3">Nema kreiranih postova</h6>
    @else
        
    @endif
@endsection