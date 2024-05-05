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
                    <div class="mb-3">
                        <a href="{{route('post.edit', $post->id) }}" class="btn btn-primary">
                            <i class="fas fa-pen"></i>
                            Редактировать
                        </a>
                        <a href="{{route('post.comments', $post->id)}}" class="btn btn-primary">
                            <i class="fas fa-comment"></i>
                            Комментарии
                        </a>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">

                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{$post->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Заголовок</th>
                                        <td>{{$post->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Контент</th>
                                        <td>{{Illuminate\Support\Str::limit(strip_tags($post->content),200)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Превью</th>
                                        <td><img src="{{asset('storage/'.$post->preview_image)}}" width="120" height="120" alt=""></td>
                                    </tr>
                                    <tr>
                                        <th>Главная</th>
                                        <td><img src="{{asset('storage/'.$post->main_image)}}" width="120"  alt=""></td>
                                    </tr>
                                    <tr>
                                        <th>Категория</th>
                                        <td>{{$post->category->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>Теги</th>
                                        <td>
                                            @foreach($post->tags as $tag)
                                            {{$tag->title}}
                                            @endforeach
                                        </td>
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
