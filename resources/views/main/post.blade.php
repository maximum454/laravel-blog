@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            @if($post->id > 0)
                <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
                <div class="edica-blog-post-meta d-flex flex-wrap justify-content-center align-items-center">
                    <p class="m-0 mr-1" data-aos="fade-up" data-aos-delay="200">{{$date->translatedFormat('F')}} {{$date->day}}, {{$date->year}}• {{$date->format('H:i')}} • {{$post->comments->count()}} Комментария</p>
                    <form data-aos="fade-up" action="{{route('post.like', $post->id)}}" method="POST">
                        @csrf
                        @if($post->liked_users_count)
                        <span>
                            {{$post->liked_users_count}}
                        </span>
                        @endif
                        <button type="submit" class="btn p-0">
                            @auth()
                                <i class="{{auth()->user()->likedPosts->contains($post->id) ? 'fas' : 'far'}} fa-heart"></i>
                            @endauth
                        </button>
                    </form>
                </div>


                <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                    <img src="{{asset('storage/'.$post->main_image)}}" alt="featured image" class="w-100">
                </section>
                <section class="post-content">
                    <div class="row">
                        <div class="col-lg-9 mx-auto" data-aos="fade-up">
                            {!! $post->content !!}
                        </div>
                    </div>
                </section>
            @endif
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count())
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                            <div class="row">
                                @foreach($relatedPosts as $item)
                                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                        <img src="{{asset('storage/'.$item->preview_image)}}" alt="related post"
                                             class="post-thumbnail">
                                        <p class="post-category">{{$item->category->title}}</p>
                                        <a href="{{route('main.blog.post', $item->id)}}" class="blog-post-permalink">
                                            <h5 class="post-title">{{$item->title}}</h5>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарий</h2>
                            <form action="{{route('post.comment', $post->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="message" class="sr-only">Комментарий</label>
                                        <textarea name="message" id="message" class="form-control"
                                                  placeholder="Напиши комментарий"
                                                  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Отправить комментарий" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
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
        </div>
    </main>|
@endsection
