@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя</h1>
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
                    <form action="{{route('user.update', $user->id)}}" method="POST" class="w-25">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="name">Название пользователя</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{$user->name}}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email пользователя</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Email">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Выберите роль</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $id => $item)
                                    <option value="{{$id}}"
                                        {{$id == $user->role ? 'selected': ''}}
                                    >{{$item}}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-danger">Обязательное поле</div>
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
