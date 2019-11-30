@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-head">
                    <h4 class="card-title">{{$title}}</h4>
                    <a href="{{ route('admin.category.create') }}" class="new-link-table">Create Category</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', $category->id) }}" class="edit-tabel" style="margin-right: 3px;">Edit</a>
                                <form method="POST" action="{{ route('admin.category.delete', $category->id) }}" accept-charset="UTF-8">
                                    @method('DELETE')
                                    @csrf
                                    <input onclick="if (!confirm('Are you sure ?')) { return false }" class="delete-tabel" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="2">No data found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection