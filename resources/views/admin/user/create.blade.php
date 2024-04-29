@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создание Пользователя</h1>
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
                        <form action="{{route('user.store')}}" method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
                                <label for="name">Имя пользователя</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Имя">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email пользователя</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Email">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Выберите роль</label>
                                <select name="role" class="form-control">
                                    @foreach($roles as $id => $item)
                                        <option value="{{$id}}"
                                            {{$id == old('role') ? 'selected': ''}}
                                        >{{$item}}</option>
                                    @endforeach
                                </select>
                                @error('role')
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
