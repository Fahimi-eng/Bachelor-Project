@extends('Admin.Layouts.master')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h4 class="m-5 d-inline-block">مشاهده سفارش</h4>
        <a class="btn btn-primary m-5" href="{{ route('panel.dashboard') }}"> بازگشت به صفحه قبل</a>
    </div>

    <div class="m-5 d-flex justify-content-between flex-wrap border border-dark rounded pt-3">
        <div class="mx-2 d-flex">
            <p class="mx-2 py-2">نام مشتری</p>
            <p class="px-3 py-2 bg-dark rounded text-light"> {{ $order->customer }} </p>
        </div>
        <div class="mx-2 d-flex">
            <p class="mx-2 py-2">تلفن</p>
            <p class="px-3 py-2 bg-dark rounded text-light"> {{ $order->phone }} </p>
        </div>
        <div class="mx-2 d-flex">
            <p class="mx-2 py-2">وعده</p>
            <p class="px-3 py-2 bg-dark rounded text-light">
                @if($order->meal == 'lunch')
                    نهار
                @else
                شام
                @endif
            </p>
        </div>
        <div class="mx-2 d-flex">
            <p class="mx-2 py-2">ساعت رزرو</p>
            <p class="px-3 py-2 bg-dark rounded text-light"> {{ $order->time }} </p>
        </div>
        <div class="mx-2 d-flex">
            <p class="mx-2 py-2">تاریخ</p>
            <p class="px-3 py-2 bg-dark rounded text-light"> {{ $order->date }} </p>
        </div>
        <div class="mx-2 d-flex">
            <p class="mx-2 py-2">تعداد میهمان</p>
            <p class="px-3 py-2 bg-dark rounded text-light"> {{ $order->guests }} </p>
        </div>
        <div class="mx-2 d-flex">
            <p class="mx-2 py-2">میز</p>
            <p class="px-3 py-2 bg-dark rounded text-light"> {{ $order->tables[0]->name }} </p>
        </div>
    </div>

    <div class="m-5 pt-3 d-flex justify-content-around flex-wrap border border-dark">
        @foreach($order->foods as $food)
        <div class="mx-2 d-flex">
            <p class="mx-2 py-2">{{ $food->name }}</p>
            <p class="px-3 py-2 bg-dark rounded text-light"> {{ $food->pivot->count }} پرس</p>
        </div>
        @endforeach
    </div>

    <div class="m-5 pt-3 d-flex justify-content-around flex-wrap border border-dark">
            <div class="mx-2 d-flex">
                <p class="mx-2 py-2">صورتحساب</p>
                <p class="px-3 py-2 bg-dark rounded text-light"> {{ $order->bill }} تومان</p>
            </div>
        <div class="mx-2 d-flex">
            <p class="mx-2 py-2">وضعیت پرداخت</p>
            <p class="px-3 py-2 bg-warning rounded text-dark">
                @php
                    switch ($order->status )
                    {
                        case 'inProcess':
                            echo 'در حال پرداخت';
                            break;
                        case 'done':
                             echo 'پرداخت موفق';
                             break;
                        case 'failed':
                            echo 'پرداخت ناموفق';
                            break;
                        default:
                            echo 'نا معلوم';
                            break;
                    }
                @endphp
            </p>
        </div>
    </div>

@endsection
