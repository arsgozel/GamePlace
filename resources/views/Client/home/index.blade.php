@extends('client.layouts.app')
@section('title')
    @lang('app.app-name')
@endsection
@section('content')
    <div class="container-xxl p-0">
        <div class="position-relative d-flex">
            <div class="splide p-0" role="group" id="splide-gallery">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <img class="img-fluid" src="{{ asset('img/slider2.jpg') }}" alt="">
                        </li>
                        <li class="splide__slide">
                            <img class="img-fluid" src="{{ asset('img/slider.jpg') }}" alt="">
                        </li>
                    </ul>
                </div>
            </div>

            <div class="d-flex position-absolute text-white top-50 end-0 px-5 translate-middle-y">
                <div>
                    <div class="text-uppercase fw-bold display-1">
                        Game Place
                    </div>
                    <div class="text-center h3">More Than <span class="mark" style="background-color: #0F0071">+100 Applications</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-5 g-3 mb-4 mt-3">
            @foreach($apps as $app)
                <div class="col">
                    @include('client.app.app')
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var splide = new Splide('#splide-gallery', {
                type: 'loop',
                autoplay: true,
                gap: '1rem',
                interval: 3000,
                perPage: 1,
                perMove: 1,

            });
            splide.mount();
        });
    </script>
@endsection