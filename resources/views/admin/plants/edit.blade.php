@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <form class="row" action="{{route('plant.update', $plant->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Название растения</label>
                            <input type="text" class="form-control" id="name" name="title" placeholder="Название"
                                   value="{{old('title',$plant->title)}}">
                            @error('title')
                            <div class="text-danger">Обязательное поле</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Второе название растения</label>
                            <input type="text" class="form-control" id="name" name="title_second" placeholder="Название второе"
                                   value="{{old('title_second',$plant->title_second)}}">
                            @error('title')
                            <div class="text-danger">Обязательное поле</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Описание</label>
                            <textarea class="form-control summernote" name="content">
                                    {{old('content',$plant->content)}}
                                </textarea>
                            @error('content')
                            <div class="text-danger">Обязательное поле</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Лечебные свойства</label>
                            <textarea class="form-control summernote" name="medicinal">
                                    {{old('medicinal',$plant->medicinal)}}
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
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <label class="card-title" for="exampleInputFile">Превью поста</label>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    @if($plant->preview_image)
                                    <div class="mb-3">
                                        <img class="img-fluid w-100" src="{{ asset('storage/'.$plant->preview_image)}}"
                                             width="120" height="120" alt="">
                                    </div>
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="preview_image" class="custom-file-input"
                                                   id="exampleInputFile" value="{{ asset('storage/'.$plant->preview_image)}}">
                                            <label class="custom-file-label" for="exampleInputFile">Выберите
                                                изображение</label>
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
                                <label class="card-title" for="exampleInputFile">Главное изображение</label>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    @if($plant->detail_image)
                                    <div class="mb-3">
                                        <img class="img-fluid w-100" src="{{asset('storage/'.$plant->detail_image)}}"
                                             width="120" height="120" alt="">
                                    </div>
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="detail_image" class="custom-file-input"
                                                   id="exampleInputFile" value="{{ asset('storage/'.$plant->preview_image)}}">
                                            <label class="custom-file-label" for="exampleInputFile">Выберите
                                                изображение</label>
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
                    <!-- /.col -->

                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
