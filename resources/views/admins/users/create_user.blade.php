@extends('admins.master')
@section('content')
    <div id="content">
        <div class="container">
            <h2>{{ trans('message.create_user') }}</h2>
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    @error('name')
                        <p class = "alert alert-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @enderror
                    <label for="inputdefault">{{ trans('message.name') }}</label>
                    <input class="form-control" id="inputdefault" name="name" type="text">
                </div>
                <div class="form-group">
                    @error('email')
                        <p class = "alert alert-danger">
                            {{ $errors->first('email') }}
                        </p>
                    @enderror
                    <label for="inputlg">{{ trans('message.email') }}</label>
                    <input class="form-control input-lg" id="inputlg" name="email" type="text">
                </div>
                <div class="form-group">
                    @error('password')
                        <p class = "alert alert-danger">
                            {{ $errors->first('password') }}
                        </p>
                    @enderror
                    <label for="inputlg">{{ trans('message.password') }}</label>
                    <input class="form-control input-lg" id="inputlg" name="password" type="password">
                </div>
                <div class="form-group">
                    @error('repassword')
                        <p class = "alert alert-danger">
                            {{ $errors->first('repassword') }}
                        </p>
                    @enderror
                    <label for="inputlg">{{ trans('message.repassword') }}</label>
                    <input class="form-control input-lg" id="inputlg" name="repassword" type="password">
                </div>
                <div class="form-group">
                    @error('image')
                        <p class = "alert alert-danger">
                            {{ $errors->first('image') }}
                        </p>
                    @enderror
                    <label for="inputsm">{{ trans('message.avatar') }}</label>
                    <input class="form-control input-sm" id="inputsm" type="file" name="image">
                </div>
                <button type="submit">{{ trans('message.create_user') }}</button>
            </form>
        </div>

    </div>
@endsection
