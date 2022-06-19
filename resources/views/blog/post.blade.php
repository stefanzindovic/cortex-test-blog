@extends('layouts.blog')

@section('page_title')
    Blog
@endsection

@section('title')
    {{ $post->title }}
@endsection

@if($post->picture != null)
@section('cover_picture')
    {{ 'storage/' . $post->picture }}
@endsection
@endif

@section('body')
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                {{ $post->content }}
                <br>
                <br>
                    Created by
                    <b>{{ $post->user->name }}</b>
                    &middot; Published on <b>{{ $post->created_at->format('d/m/Y') }}</b>
                </p>
            </div>
        </div>
    </div>
</article>
@endsection