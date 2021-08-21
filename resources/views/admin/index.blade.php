@extends('layouts.admin.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
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
