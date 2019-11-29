@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-head">
          <h4 class="card-title">{{$title}}</h4>
          <a href="{{ route('admin.role.create') }}" class="new-link-table">Create Role</a>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Role</th>
              <th>Permissions</th>
              <th>Operation</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($roles as $role)
            <tr>
              <td>{{ $role->name }}</td>
              <td>{{ $role->permissions()->pluck('name')->implode(' | ') }}</td>
              <td>
              <a href="{{ route('admin.role.edit', $role->id) }}" class="edit-tabel" style="margin-right: 3px;">Edit</a>
                <form method="POST" action="{{ route('admin.role.delete', $role->id) }}" accept-charset="UTF-8">
                  @method('DELETE')
                  @csrf
                  <input onclick="if (!confirm('Are you sure ?')) { return false }" class="delete-tabel" type="submit" value="Delete">
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection