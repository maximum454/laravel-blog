@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование поста</h1>
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
                    <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="name">Название поста</label>
                            <input type="text" class="form-control" id="name" name="title" placeholder="Название" value="{{$post->title}}">
                            @error('title')
                            <div class="text-danger">Обязательное поле</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Описание поста</label>
                            <textarea id="summernote" class="form-control" name="content" >
                                    {{$post->content}}
                                </textarea>
                            @error('content')
                            <div class="text-danger">Обязательное поле</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Превью поста</label>
                            <div>
                                <img src="{{ asset('storage/'.$post->preview_image)}}" width="120" height="120" alt="">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="preview_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">Обязательное поле</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Главное изображение</label>
                            <div>
                                <img src="{{asset('storage/'.$post->main_image)}}" width="120" height="120" alt="">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="main_image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger">Обязательное поле</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Выберите категорию</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $item)
                                    <option value="{{$item->id}}"
                                        {{$item->id == $post->category_id ? 'selected': ''}}
                                    >{{$item->title}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">Обязательное поле</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Выберите тег</label>
                            <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Выберите тег" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach($tags as $item)
                                    <option value="{{$item->id}}"
                                        {{is_array($post->tags->pluck('id')->toArray()) && in_array($item->id, $post->tags->pluck('id')->toArray()) ? 'selected': ''}}
                                    >{{$item->title}}</option>
                                @endforeach
                            </select>
                            @error('tag_id')
                            <div class="text-danger">Обязательное поле</div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
