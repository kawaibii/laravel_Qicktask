@extends('admins.master')
@section('content')
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ trans('message.data_post') }}</h6>
                </div>
                @if (session('Message_error'))
                    {{ session('Message_errors') }}
                @endif
                @if (session('Message_success'))
                    {{ session('Message_success') }}
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route ('posts.create') }}">
                            <button class="alert alert-info">{{ trans('message.create_post') }}</button>
                        </a>
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>{{ trans('message.serial') }}</th>
                                    <th>{{ trans('message.title') }}</th>
                                    <th>{{ trans('message.image') }}</th>
                                    <th>{{ trans('message.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <img src="{{ config('image.imagePost') . $post->image }}" class="img-fluid" width="300px" height="300px" />
                                    </td>
                                    <td>
                                        <a href="#"><button class="alert alert-primary">{{ trans('message.detail') }}</button></a>
                                        <a href="{{ route('posts.edit', $post->id) }}"><button class="alert alert-warning">{{ trans('message.edit') }}</button></a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="alert alert-danger">{{ trans('message.delete') }}</button>
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
