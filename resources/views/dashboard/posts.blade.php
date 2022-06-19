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
                    <td class="d-flex align-items-center pl-2">
                        <a class="text-white p-1 text-decoration-underline" href="{{ route('posts.edit', $post->slug) }}">Edit</a>
                       <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input type="submit" class="border-0 bg-transparent text-danger" value="Delete">
                        </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    @endif
@endsection