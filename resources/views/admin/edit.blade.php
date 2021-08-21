@extends('layouts.admin.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                {!! Form::model($video, ['route' => ['admin.update', $video->id], 'method' => 'put', 'files' => true]) !!}
                {!! Form::token() !!}

                <div class="form-group">
                    {!! Form::label('video_file', 'Film') !!}<br>
                    {!! Form::file('video_file', ['accept' => '.mp4', 'required']) !!}
                    {{-- {!! $video->filename !!} --}}
                </div>

                <div class="form-group">
                    {!! Form::label('thumb_file', 'Miniaturka') !!}<br>
                    {!! Form::file('thumb_file', ['accept' => '.jpg,.jpeg', 'required']) !!}
                    {{-- {!! $video->thumb !!} --}}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Nazwa wideo') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Opis') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'URL') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('created_at', 'Data publikacji') !!}
                    {!! Form::date('created_at', $video->created_at, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('views', 'Ilość odwiedzin') !!}
                    {!! Form::number('views', null, ['class' => 'form-control', 'required']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('state', 'Status') !!}
                    {!! Form::select('state', ['active' => 'active', 'inactive' => 'inactive'], null, ['class' => 'form-control', 'required']) !!}
                </div>

                <hr>

                {!! Form::submit('Zapisz wideo', ['class' => 'btn btn-success']) !!}
                <div class="btn btn-primary" onclick="window.open('{{ url($video->slug) }}')">&nbsp;<i
                        class="bi bi-eye"></i>&nbsp;</div>
                <div class="btn btn-danger">&nbsp;<i class="bi bi-trash">&nbsp;</i>&nbsp;</div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
