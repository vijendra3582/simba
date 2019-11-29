@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-headers">
          <span class="new-header-table">{{ $title }}</span>
          <a href="{{ route('admin.user.create') }}" class="new-link-table">Create User</a>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
              <td>
                <a href="{{ route('admin.user.edit', $user->id) }}" class="edit-tabel" style="margin-right: 3px;">Edit</a>
                <form method="POST" action="{{ route('admin.user.delete', $user->id) }}" accept-charset="UTF-8">
                  @method('DELETE')
                  @csrf
                  <input onclick="if (!confirm('Are you sure ?')) { return false }" class="delete-tabel" type="submit" value="Delete">
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="pagination">
            {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection