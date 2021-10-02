@extends('layouts.admin.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="col-12 mb-10">
                    <a href="{{ route('admin.addTag') }}" class="btn btn-primary mb-3">Dodaj tag</a>
                </div>

                @if (Session::has('status'))
                    <div class="alert alert-success hide-3s">
                        {{ Session::get('status') }}
                    </div>
                @endif


                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nazwa</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td scope="row">{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <button onclick="window.location.href = '/{{ ADMIN_PANEL_EDIT_TAGS_URL . $tag->id }}'"
                                        class="btn-action btn btn-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                    <button onclick="removeTag({{ $tag->id }});"
                                        class="btn-action btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
