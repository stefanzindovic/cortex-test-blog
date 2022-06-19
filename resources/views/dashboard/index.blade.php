@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('body')
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $count }}</h3>

        <p>Your blogs</p>
      </div>
      <a href="{{ route('posts.index') }}" class="small-box-footer">See your blogs <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
@endsection