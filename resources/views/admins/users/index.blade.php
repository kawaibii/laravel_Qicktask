@extends('admins.master')
@section('content')
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ trans('message.data_user') }}</h6>
                </div>
                @if (session('message_error'))
                    {{ session('message_errors') }}
                @endif
                @if (session('message_success'))
                    {{ session('message_success') }}
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route('users.create') }}"><button class="alert alert-info">{{ trans('message.create_user') }}</button></a>
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                            <tr>
                                <th>{{ trans('message.serial') }}</th>
                                <th>{{ trans('message.name') }}</th>
                                <th>{{ trans('message.email') }}</th>
                                <th>{{ trans('message.avatar') }}</th>
                                <th>{{ trans('message.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <img src="{{ config('image.imageUser') . $user->avatar }}" width="200px" height="200px">
                                    </td>
                                    <td>
                                        <a href="#"><button class="alert alert-primary">{{ trans('message.detail') }}</button></a>
                                        <a href="{{ route('users.edit', $user->id) }}"><button class="alert alert-warning">{{ trans('message.edit') }}</button></a>
                                        <form method="post" action="{{ route('users.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="alert alert-danger">{{ trans('message.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
@endsection
