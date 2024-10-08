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
                <form class="row" action="{{route('plant.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Название растения</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Название"
                                   value="{{old('title')}}">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Второе название растения</label>
                            <input type="text" class="form-control" id="title_second" name="title_second" placeholder="Название второе"
                                   value="{{old('title_second')}}">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
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
                            <a href="{{route('plant.index')}}" class="btn btn-secondary">Отменить</a>
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
                                            <input type="file" name="detail_image" class="custom-file-input" id="exampleInputFile2">
                                            <label class="custom-file-label" for="exampleInputFile2">Выберите изображение</label>
                                        </div>
                                    </div>
                                    @error('detail_image')
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
