@extends('layouts.admin.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="div col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-12">
                {!! Form::model($tag, ['route' => ['tag.update', $tag->id], 'method' => 'put']) !!}
                {!! Form::token() !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nazwa tagu') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'required']) !!}
                </div>

                {!! Form::submit('Zapisz wideo', ['class' => 'btn btn-success']) !!}
                <div onclick="removeTag({{ $tag->id }})" class="btn btn-danger">&nbsp;<i
                        class="bi bi-trash">&nbsp;</i>&nbsp;</div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
