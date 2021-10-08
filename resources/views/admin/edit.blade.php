@extends('layouts.admin.app')
@section('content')
    <script src="{{ url('js/admin/ckeditor/ckeditor.js') }}"></script>
    <script>
        window.onload = function() {
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{ route('ckeditor.image-upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            });
        };
    </script>

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
                {!! Form::model($video, ['route' => ['admin.update', $video->id], 'method' => 'put', 'files' => true]) !!}
                {!! Form::token() !!}

                @isset($video)
                    <video id="main-video" class="video-js vjs-default-skin  vjs-big-play-centered" controls preload="none"
                        poster="{{ url(Storage::url($video->thumb)) }}" width="640" height="268">
                        <source src="{{ url(Storage::url($video->filename)) }}" type='video/mp4'>
                    </video>
                @endisset

                <hr>

                <div class="form-group">
                    {!! Form::label('video_file', 'Film') !!}<br>
                    {!! Form::file('video_file', ['accept' => '.mp4']) !!}
                    {{-- {!! $video->filename !!} --}}
                </div>

                <div class="form-group">
                    {!! Form::label('thumb_file', 'Miniaturka') !!}<br>
                    {!! Form::file('thumb_file', ['accept' => '.jpg,.jpeg']) !!}
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
                    {!! Form::label('views_cache', 'Ilość odwiedzin') !!}
                    {!! Form::number('views_cache', null, ['class' => 'form-control', 'required']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('state', 'Status') !!}
                    {!! Form::select('state', ['active' => 'active', 'inactive' => 'inactive'], null, ['class' => 'form-control', 'required']) !!}
                </div>


                <hr>
                <h2>SEO:</h2>
                <div>
                    <div class="form-group">
                        {!! Form::label('seo_description', 'Opis pod wyszukiwarki:') !!}
                        {!! Form::textarea('seo_description', null, ['class' => 'form-control', 'maxlength' => 160, 'rows' => '3']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('seo_keywords', 'Słowa kluczowe:') !!}
                        {!! Form::text('seo_keywords', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <div class="col-md-4 control-label">
                        {!! Form::label('TagsList', 'Wybierz kategorie:') !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::select('TagsList[]', $categories, null, ['class' => 'form-control select-tag', 'multiple']) !!}
                    </div>
                </div>

                <hr>

                {!! Form::submit('Zapisz wideo', ['class' => 'btn btn-success']) !!}
                <div class="btn btn-primary" onclick="window.open('{{ url($video->slug) }}')">&nbsp;<i
                        class="bi bi-eye"></i>&nbsp;</div>
                <div onclick="removeVideo({{ $video->id }})" class="btn btn-danger">&nbsp;<i
                        class="bi bi-trash">&nbsp;</i>&nbsp;</div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
