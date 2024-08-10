@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Растения</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Растения</li>
                        </ol>
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
                            <a href="{{route('plant.create')}}" class="btn btn-success">
                                <i class="fas fa-plus"></i>
                                Добавить
                            </a>
                        </div>

                        <form action="enhanced-results.html">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Result Type:</label>
                                        <select class="select2" multiple="multiple" data-placeholder="Any"
                                                style="width: 100%;">
                                            <option>Text only</option>
                                            <option>Images</option>
                                            <option>Video</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Sort Order:</label>
                                        <select class="select2" style="width: 100%;">
                                            <option selected>ASC</option>
                                            <option>DESC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Order By:</label>
                                        <select class="select2" style="width: 100%;">
                                            <option selected>Title</option>
                                            <option>Date</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="search" class="form-control form-control-lg"
                                           placeholder="Type your keywords here" value="Lorem ipsum">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="list-group">
                            @foreach($plants as $item)
                                <div class="list-group-item" data-id="{{$item->id}}">
                                    <div class="row">
                                        <div class="col-auto">
                                            @if($item->preview_image)
                                                <img class="img-fluid" src="{{asset('storage/'.$item->preview_image)}}"
                                                     alt="Photo" style="max-height: 160px;">
                                            @else
                                                <img class="img-fluid" src="{{asset('admin/dist/img/no-picture.jpg')}}"
                                                     alt="Photo" style="max-height: 160px;">
                                            @endif
                                        </div>
                                        <div class="col px-4">
                                            <div>
                                                <div class="float-right"> {{$item->created_at->day}} {{$item->created_at->translatedFormat('F')}} {{$item->created_at->year}}</div>
                                                <h3>{{$item->title}}</h3>
                                                <p class="mb-0">{{Illuminate\Support\Str::limit(strip_tags($item->content),200)}}</p>
                                                <div class="mt-3">
                                                    <a href="{{route('plant.show', $item->id)}}" class="btn btn-primary"><i
                                                            class="fas fa-eye"></i></a>
                                                    <a href="{{route('plant.edit', $item->id)}}" class="btn btn-primary"><i
                                                            class="fas fa-pen"></i></a>
                                                    <form action="{{route('plant.delete', $item->id)}}" method="post"
                                                          class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <nav aria-label="Page Navigation">
                            {{$plants->links()}}
                        </nav>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
