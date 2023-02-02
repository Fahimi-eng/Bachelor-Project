<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Client/css/style.css">
    <link rel="stylesheet" href="/Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    @stack('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>رستوران</title>
</head>
<body dir="rtl" class="my-secondary-bg">
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-square-caret-up"></i></button>
<!-- Main Container -->
<section class="my-4 mx-4 my-white-bg border-5">
    <section class="container">
        <!-- nav -->
        <nav class="navbar justify-content-between navbar-expand-lg navbar-light bg-light mb-5 bg-white">
            <div class="container-fluid d-lg-none">
                <img src="/Client/images/logo.png" id="logo" width="100" class="navbar-brand" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-between bb" id="navbarNav">
                <ul class="nav-bar navbar-nav">
                    <li class="nav-item mx-5">
                        <a class="nav-link " aria-current="page" href="{{ route('order') }}">سفارش</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="{{ route('home') }}#menu">منو</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="{{ route('home') }}#about">درباره ما</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link " aria-current="page" href="#contact">تماس با ما</a>
                    </li>
                </ul>
                <a href="{{ route('home') }}" class="navbar-brand mx-5">
                    <img src="/Client/images/logo.png" id="logo" width="100" class="" alt="">
                    {{--                        <span>رستوران</span>--}}
                </a>
            </div>
        </nav>
        <!-- end nav -->

        @yield('content')

        <!-- start footer -->
        <footer id="contact" class="d-flex flex-column justify-content-between mt-5  flex-md-row pt-md-5">
            @php
            $settings = \App\Models\Setting::query()->first()
            @endphp
            <div>
                <div style="width: 100px;" class="mx-auto mx-md-0">
                    <img class="w-100 " src="/Client/images/logo.png" alt="logo">
                </div>
                <p class="text-wrap mx-auto mx-md-0 w-75 mt-3 text-center text-md-end">
                    {{ $settings->footer_body }}
                </p>
                <div class="d-flex justify-content-center justify-content-md-start">
                    <div>
                        <a class="text-dark " href="{{ $settings->instagram }}"> <i class="s-hover fa-brands fa-instagram"></i></a>
                    </div>
                    <div>
                        <a class="text-dark" target="_blank" href="{{ $settings->facebook }}"><i class="s-hover fa-brands fa-facebook-f mx-5"></i></a>
                    </div>
                    <div>
                        <a class="text-dark" href="{{ $settings->twitter }}"><i class="s-hover fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <div class="mt-5 mt-md-0 mx-md-4" style="min-width: 300px;">
                <h5 class="text-center text-md-end">ساعت های کار</h5>
                <ul class="list-group text-center text-md-end">
                    <li class="list-group-item border-0"><span class="text-danger">نهار:</span> <span>11 الی 14</span></li>
                    <li class="list-group-item border-0"><span class="text-danger">شام:</span> <span>18 الی 22</span></li>
                </ul>
            </div>

            <div>
                <h5 class="mt-4 mt-md-0 text-center text-md-end">تماس با ما</h5>
                <p class="text-center">
                    {{ $settings->contact }}
                </p>
                <ul class="list-group text-center text-md-end">
                    <li class="list-group-item border-0"><span class="text-danger">شماره تماس :</span>{{ $settings->telephone }}</li>
                    <li class="list-group-item border-0"><span class="text-danger">آدرس:</span> <span>{{ $settings->address }}</span></li>
                </ul>
            </div>
        </footer>
        <!-- end footer -->

        <div class="py-5 text-center ">
            <small>
                علیرضا فهیمی - پروژه دوره کارشناسی - دانشگاه صنعتی بیرجند
                <br>
                پاییز 1401
            </small>
        </div>
    </section>
</section>
<!-- End Main Container -->

<!-- scripts -->
<script src="/Bootstrap/js/bootstrap.js"></script>
<script src="/Client/js/js.js"></script>
@stack('scripts')
</body>
</html>
