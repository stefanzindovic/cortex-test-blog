@extends('layouts.blog')

@section('page_title')
    Welcome!
@endsection

@section('body')
    <!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @foreach ($posts as $post)
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <h3 class="post-subtitle">{{ $post->short_desc }}</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <b>{{ $post->user->name }}</b>
                        on <b>{{ $post->created_at->format('d/m/Y') }}</b>
                    </p>
                </div>
            <!-- Divider-->
            <hr class="my-4" />
            @endforeach
        </div>
        
        {{ $posts->links("pagination::bootstrap-4") }}
        
    </div>
</div>
@endsection

