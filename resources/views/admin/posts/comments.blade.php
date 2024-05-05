@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Комментарий поста</h1>
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
                    @if($post->comments->count())
                        <style>
                            .card-comments .card-comment {
                                border-bottom: 2px solid #fff0e8;
                                padding: 10px 0;
                            }

                            .card-comments .card-comment:first-of-type {
                                padding-top: 0;
                            }

                            .card-comments .card-comment img {
                                height: 1.875rem;
                                width: 1.875rem;
                                float: left;
                            }

                            .img-circle {
                                border-radius: 50%;
                            }

                            .card-comments .comment-text {
                                color: #78838e;
                                margin-left: 40px;
                            }

                            .card-comments .username {
                                color: #495057;
                                display: block;
                                font-weight: 600;
                            }

                            .card-comments .text-muted {
                                font-size: 12px;
                                font-weight: 400;
                            }

                            .text-muted {
                                color: #6c757d !important;
                            }

                            .float-right {
                                float: right !important;
                            }
                        </style>
                        <section class="comment-section card-comments">
                            <h3 class="section-title mb-4" data-aos="fade-up">Комментарий ({{$post->comments->count()}}
                                )</h3>
                            @foreach($post->comments as $item)
                                <div class="card-comment" data-aos="fade-up">

                                    @if($item->user->avatar)
                                        <img src="{{asset('storage/'.$item->user->avatar)}}" class="img-circle elevation-2 img-sm"
                                             alt="{{auth()->user()->name}}">
                                    @else
                                        <img src="{{asset('admin/dist/img/avatar-no.png')}}" class="img-circle elevation-2 img-sm"
                                             alt="{{auth()->user()->name}}">
                                    @endif

                                    <div class="comment-text">
                                        <div class="username">
                                            {{$item->user->name}}
                                            <span
                                                class="text-muted float-right">{{$item->dateAsCarbon->diffForHumans()}}</span>
                                        </div>
                                        {{$item->message}}
                                    </div>
                                </div>
                            @endforeach
                        </section>
                    @endif
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
