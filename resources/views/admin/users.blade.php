@extends('layouts.admin')

@section('title')
    User List
@endsection

@section('body')
@if (count($users) == 0)
        <h6 class="lead p-3">No Users</h6>
    @else
    <div class="p-2">
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">About</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->about }}</td>
                    <td class="d-flex align-items-center pl-2">
                        <a class="text-white p-1 text-decoration-underline" href="{{ route('users.edit', $user->id) }}">Edit</a>
                       <form action="{{ route('users.delete', $user->id) }}" method="POST">
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