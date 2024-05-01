@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @if(isset($posts))
                        @foreach($posts as $item)
                            <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{'storage/'.$item->preview_image}}" alt="{{$item->title}}">
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="blog-post-category">{{$item->category->title}}</p>
                                    <form action="{{route('post.like', $item->id)}}" method="POST">
                                        @csrf
                                        @if($item->liked_users_count)
                                            <span>{{$item->liked_users_count}}</span>
                                        @endif
                                        <button type="submit" class="btn p-0">
                                            @auth()
                                                <i class="{{auth()->user()->likedPosts->contains($item->id) ? 'fas' : 'far'}} fa-heart"></i>
                                            @endauth
                                        </button>
                                    </form>
                                </div>

                                <a href="{{route('main.blog.post', $item->id)}}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{$item->title}}</h6>
                                </a>
                            </div>
                        @endforeach
                        <div class="m-auto">
                            {{$posts->links()}}
                        </div>
                    @else
                        Нет постов
                    @endif
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section class="widget">
                        <h5 class="widget-title">Рандомные посты</h5>
                        <div class="row blog-post-row">
                            @foreach($postsRandom as $item)
                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{'storage/'.$item->preview_image}}" alt="{{$item->title}}">
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="blog-post-category">{{$item->category->title}}</p>
                                        <form action="{{route('post.like', $item->id)}}" method="POST">
                                            @csrf
                                            <span>
                                                {{$item->liked_users_count}}
                                            </span>
                                            <button type="submit" class="btn p-0">
                                                @auth()
                                                    <i class="{{auth()->user()->likedPosts->contains($item->id) ? 'fas' : 'far'}} fa-heart"></i>
                                                @endauth
                                            </button>
                                        </form>
                                    </div>
                                    <a href="{{route('main.blog.post', $item->id)}}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$item->title}}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Популярные посты</h5>
                        <ul class="post-list">
                            @foreach($postsRandom as $item)
                                <li class="post">
                                    <a href="{{route('main.blog.post', $item->id)}}" class="post-permalink media">
                                        <img src="{{'storage/'.$item->preview_image}}" alt="{{$item->title}}">
                                        <div class="media-body">
                                            <h6 class="post-title">{{$item->title}}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
