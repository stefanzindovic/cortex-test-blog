@extends('layouts.admin')

@section('title')
    Admin
@endsection

@section('body')
<div class="d-flex">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $userCount }}</h3>
  
        <p>Users</p>
      </div>
      <a href="{{ route('admin.users') }}" class="small-box-footer">List of users<i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $blogCount }}</h3>
  
        <p>Blogs</p>
      </div>
      <a href="{{ route('admin.posts') }}" class="small-box-footer">See your blogs <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
@endsection