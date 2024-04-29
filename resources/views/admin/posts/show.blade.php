@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пост</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <a href="{{route('post.edit', $post->id) }}" class="btn btn-primary">Редактировать</a>
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Responsive Hover Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">

                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{$post->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Название</th>
                                        <td>{{$post->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Контент</th>
                                        <td>{!! $post->content !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Превью</th>
                                        <td><img src="{{asset('storage/'.$post->main_image)}}" width="120" height="120" alt=""></td>
                                    </tr>
                                    <tr>
                                        <th>Главная</th>
                                        <td><img src="{{asset('storage/'.$post->main_image)}}" width="120" height="120" alt=""></td>
                                    </tr>
                                    <tr>
                                        <th>категорию</th>
                                        <td>{{$post->categoty_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Теги</th>
                                        <td>$post->categoty_id</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
