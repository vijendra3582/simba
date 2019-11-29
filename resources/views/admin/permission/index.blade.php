@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-head">
          <h4 class="card-title">{{$title}}</h4>
          <a href="{{ route('admin.permission.create') }}" class="new-link-table">Create Permission</a>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Permissions</th>
              <th>Operation</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($permissions as $permission)
            <tr>
              <td>{{ $permission->name }}</td>
              <td>
                <a href="{{ route('admin.permission.edit', $permission->id) }}" class="edit-tabel" style="margin-right: 3px;">Edit</a>
                <form method="POST" action="{{ route('admin.permission.delete', $permission->id) }}" accept-charset="UTF-8">
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