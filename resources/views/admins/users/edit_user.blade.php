@extends('admins.master')
@section('content')
    <div id="content">
        <div class="container">
            <h2>{{ trans('message.edit') }}</h2>
            <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                    @error('name')
                        <p class = "alert alert-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @enderror
                    <label for="inputdefault">{{ trans('message.name') }}</label>
                    <input class="form-control" id="inputdefault" name="name" type="text" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    @error('email')
                        <p class = "alert alert-danger">
                            {{ $errors->first('email') }}
                        </p>
                    @enderror
                    <label for="inputlg">{{ trans('message.email') }}</label>
                    <input class="form-control input-lg" id="inputlg" name="email" type="text" disabled value="{{ $user->email }}">
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
                <button type="submit">{{ trans('message.edit') }}</button>
            </form>
        </div>

    </div>
@endsection
