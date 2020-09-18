@extends('admins.master')
@section('content')
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ trans ('message.datapost') }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href=""><button class="alert alert-info">{{ trans ('message.create') }}</button></a>
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>{{ trans ('message.serial') }}</th>
                                    <th>{{ trans ('message.title') }}</th>
                                    <th>{{ trans ('message.image') }}</th>
                                    <th>{{ trans ('message.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->image }}</td>
                                    <td>
                                        <a href="#"><button class="alert alert-primary">{{ trans ('message.detail') }}</button></a>
                                        <a href="#"><button class="alert alert-warning">{{ trans ('message.edit') }}</button></a>
                                        <a href="#"><button class="alert alert-danger">{{ trans ('message.delete') }}</button></a>
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
