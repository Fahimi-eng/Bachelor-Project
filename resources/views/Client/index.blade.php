@extends('Client.Layout.master')
@section('content')
    <!-- start header -->
    <section class="header d-flex flex-column flex-md-row-reverse justify-content-between">
        <div class="image-holder border-10 w-100">
            <img class="border-10  w-100" src="/Client/images/hero-1.jpg" alt="">
        </div>
        <div class="slogan-holder d-flex mt-4 mt-md-0 flex-column justify-content-around align-items-start">
            <h2>{{ $settings->header_title }}</h2>
            <p class="w-100 text-end word-wrap fs-5">
                {{ $settings->header_body }}
                <br>
                <br>
                <a class="btn my-outline-primary-btn mx-2 " href="{{ route('order') }}"><i class="fa-solid fa-rocket px-2 fs-5 text-end"></i>سفارش </a>
            </p>

            <div class="specifics w-100  d-flex justify-content-start">
                <div class="mx-3 text-center">
                    <i class="fa-solid fa-leaf fs-2 d-block"></i>
                    <span class="fs-6 lh-lg">سالم</span>
                </div>
                <div class="mx-3 text-center">
                    <i class="fa-solid fa-fire fs-2 d-block"></i>
                    <span class="fs-6 lh-lg">تازه</span>
                </div>
                <div class="mx-3 text-center">
                    <i class="fa-regular fa-face-smile fs-2 d-block"></i>
                    <span class="fs-6 lh-lg">دلپذیر</span>
                </div>
            </div>
        </div>
    </section>
    <!-- end header -->

    <!-- start about us -->
    <section class="header mt-5 d-flex flex-column flex-md-row justify-content-between" id="about">
        <div class="image-holder border-10 w-100">
            <img class="border-10  w-100" src="/Client/images/hero-2.jpg" alt="">
        </div>
        <div class="slogan-holder me-4 d-flex mt-4 mt-md-0 flex-column justify-content-around align-items-start">
            <div class="title mt-3">
                <span class="text-danger">درباره ما</span>
                <h3>{{ $settings->about_title }}</h3>
            </div>
            <p class="mt-md-4">
                {{ $settings->about_body }}
            </p>
            <h4>وعده های روزانه</h4>
            <div class="w-100 card-holder mt-3 mt-md-0 d-flex flex-column justify-content-center align-items-center flex-md-row align-items-md-center justify-content-md-around">
                <div class="card text-center text-md-end w-100 border-0" >
                    <img style="max-width: 180px;" src="/Client/images/f2.jpg" class="card-img-top " alt="food">
                    <div class="card-body">
                        <h5 class="card-title">نهار</h5>
                        <p class="card-text">{{ $settings->about_lunch }}</p>
                    </div>
                </div>
                <div class="card text-center text-md-end mt-3 mt-md-0 w-100 border-0" >
                    <img style="max-width: 180px;" src="/Client/images/f2.jpg" class="card-img-top" alt="food">
                    <div class="card-body">
                        <h5 class="card-title">شام</h5>
                        <p class="card-text">{{ $settings->about_dinner }}</p>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- end about us -->

    <!-- start menu -->
    @if(count($foods) > 0)
    <section class="menu mt-5" id="menu">

        <div class="header text-center">
                            <span class="text-danger">
                                مخصوص
                            </span>
            <h2>منوی ما</h2>
        </div>
        <div class="list mt-4 d-sm-flex justify-content-sm-evenly">
            <ul class="list-group list-group-flush ">
                @foreach($foods as $food)
                    <li class=" list-group-item d-flex justify-content-between align-items-center">
                        <div class="ms-md-5 d-flex align-items-center">
                            <img class="rounded-circle" style="width: 100px" src="{{ str_replace('public','/storage',$food->image) }}" alt="">
                            <div class="me-2">
                                <span class="d-block">{{ $food->name }}</span>
                                <span class="d-block">{{ $food->description }}</span>
                            </div>
                        </div>
                        <p class="me-md-5 text-danger">$ {{ $food->price }}</p>
                    </li>
                @endforeach
            </ul>
            
        </div>
    </section>
    @endif
    <!-- end menu -->

@endsection
