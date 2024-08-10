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

                </div>
            </div>
        </div>
    </main>|
@endsection
