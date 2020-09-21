@extends('admins.master')
@section('content')
    <div id="content">
        <div class="container">
            <h2>{{ trans ('message.create_post') }}</h2>
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    @error('title')
                            <p class="alert alert-danger">
                                {{ $errors->first('title') }}
                            </p>
                        <br>
                    @enderror
                    <label for="inputdefault">{{ trans ('message.title') }}</label>
                    <input class="form-control" id="inputdefault" name="title" type="text">
                </div>
                <div class="form-group">
                    @error('body')
                        <p class="alert alert-danger">
                            {{ $errors->first('body') }}
                        </p>
                        <br>
                    @enderror
                    <label for="inputlg">{{ trans ('message.content') }}</label>
                    <input class="form-control input-lg" id="inputlg" name="body" type="text">
                </div>
                <div class="form-group">
                    @error('image')
                        <p class="alert alert-danger">
                            {{ $errors->first('image') }}
                        </p>
                        <br>
                    @enderror
                    <label for="inputsm">{{ trans ('message.image') }}</label>
                    <input class="form-control input-sm" id="inputsm" type="file" name="image">
                </div>
                <button type="submit">{{ trans ('message.create_post') }}</button>
            </form>
        </div>

    </div>
@endsection
