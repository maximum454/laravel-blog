@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Внести растение</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <form class="row" action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Название растения</label>
                            <input type="text" class="form-control" id="name" name="title" placeholder="Название"
                                   value="{{old('title')}}">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Второе название растения</label>
                            <input type="text" class="form-control" id="name" name="title" placeholder="Название второе"
                                   value="{{old('title_second')}}">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Выберите категорию</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $item)
                                    <option value="{{$item->id}}"
                                        {{$item->id == old('category_id') ? 'selected': ''}}
                                    >{{$item->title}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">Обязательное поле</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Выберите тег</label>
                            <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Выберите тег"
                                    data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach($tags as $item)
                                    <option value="{{$item->id}}"
                                        {{is_array(old('tag_ids')) && in_array($item->id, old('tag_ids')) ? 'selected': ''}}
                                    >{{$item->title}}</option>
                                @endforeach
                            </select>
                            @error('tag_id')
                            <div class="text-danger">Обязательное поле</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Описание поста</label>
                            <textarea id="summernote" class="form-control" name="content">
                                    {{old('content')}}
                                </textarea>
                            @error('content')
                            <div class="text-danger">Обязательное поле</div>
                            @enderror
                        </div>
                        <div class="mt-4 mb-4">
                            <a href="{{route('post.index')}}" class="btn btn-secondary">Отменить</a>
                            <button type="submit" class="btn btn-success float-right">Обновить</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <label class="card-title" for="exampleInputFile1">Превью поста</label>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">

                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="preview_image" class="custom-file-input" id="exampleInputFile1">
                                            <label class="custom-file-label" for="exampleInputFile1">Выберите изображение</label>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                    <div class="text-danger">Обязательное поле</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <label class="card-title" for="exampleInputFile2">Главное изображение</label>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="main_image" class="custom-file-input" id="exampleInputFile2">
                                            <label class="custom-file-label" for="exampleInputFile2">Выберите изображение</label>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <div class="text-danger">Обязательное поле</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
