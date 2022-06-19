@extends('layouts.dashboard')

@section('title')
    Posts
@endsection

@section('body')
    @if (count($posts) == 0)
        <h6 class="lead p-3">Nema kreiranih postova</h6>
    @else
    <div class="p-2">
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Url</th>
                <th scope="col">Published at</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td><a class="text-white text-decoration-underline" href="{{ route('posts.show', $post->slug) }}">Visit</a></td>
                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a class="text-white p-1 text-decoration-underline" href="{{ route('posts.edit', $post->slug) }}">Edit</a>
                        <a class="text-danger text-decoration-underline p-1" href="#">Delete</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    @endif
@endsection