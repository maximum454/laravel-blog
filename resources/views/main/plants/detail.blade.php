@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            @if($plant->id > 0)
                <h1 class="edica-page-title" data-aos="fade-up">{{$plant->title}}</h1>
                <div class="edica-blog-post-meta d-flex flex-wrap justify-content-center align-items-center">
                    <p class="m-0 mr-1" data-aos="fade-up" data-aos-delay="200">{{$date->translatedFormat('F')}} {{$date->day}}, {{$date->year}}• {{$date->format('H:i')}}</p>
                </div>


                <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                    <img src="{{asset('storage/'.$plant->detail_image)}}" alt="featured image" class="w-100">
                </section>
                <section class="post-content">
                    <div class="row">
                        <div class="col-lg-9 mx-auto" data-aos="fade-up">
                            {!! $plant->content !!}
                        </div>
                    </div>
                </section>
            @endif
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPlants->count())
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                            <div class="row">
                                @foreach($relatedPlants as $item)
                                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                        <img src="{{asset('storage/'.$item->preview_image)}}" alt="related post"
                                             class="post-thumbnail">
                                        <p class="post-category">{{$item->category->title}}</p>
                                        <a href="{{route('plants.detail', $item->id)}}" class="blog-post-permalink">
                                            <h5 class="post-title">{{$item->title}}</h5>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                </div>
            </div>
        </div>
    </main>|
@endsection
