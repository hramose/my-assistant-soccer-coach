@extends('layout.app')

@section('title', 'Manage Age Groups')

@section('content')
<h1>Manage Age Groups</h1>
<p class="lead">
    <a class="btn btn-primary" href="{{ route('admin.age-group.create') }}">Create an Age Group</a>
</p>
@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success!</strong> {{{ Session::get('message') }}}
    </div>
@endif
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ageGroups as $ageGroup)
            <tr>
                <td>{{ $ageGroup->id }}</td>
                <td>{{ $ageGroup->name }}</td>
                <td>{{ $ageGroup->slug }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('admin.age-group.edit', $ageGroup->id) }}">Edit</a>
                    <a class="btn btn-danger modal-confirm" href="{{ route('admin.age-group.destroy', $ageGroup->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script id="modal-delete" type="text/template">
<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Confirm Deletion</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this age group?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="#">Yes, Continue</a>
            </div>
        </div>
    </div>
</div>
</script>
@endsection
