@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование тега</h1>
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
                    <form action="{{route('plant.tag.update', $tag->id)}}" method="POST" class="w-25">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="name">Название тега</label>
                            <input type="text" class="form-control" id="name" name="title" placeholder="Название" value="{{$tag->title}}">
                            @error('title')
                            <div class="text-danger">Обязательное поле {{ $messsage }}</div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Обновить</button>
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
