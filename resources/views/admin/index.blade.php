@extends('layouts.admin.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-10">
                <a href="{{ route('admin.add') }}" class="btn btn-primary mb-3">Dodaj wideo</a>
                <a href="{{ route('admin.editTagsTable') }}" class="btn btn-primary mb-3">Edytuj tagi</a>
            </div>
            <div class="col-12">

                @if (Session::has('status'))
                    <div class="alert alert-success hide-3s">
                        {{ Session::get('status') }}
                    </div>
                @endif


                <table class="table table-bordered data-table-video">
                    <thead>
                        <tr>
                            <th>Okładka</th>
                            <th>Tytuł filmu</th>
                            <th>Opis</th>
                            <th>URL</th>
                            <th width="80px">Data dodania</th>
                            <th>Status</th>
                            <th width="130px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
