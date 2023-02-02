@extends('Client.Layout.master')
@section('content')
    <!-- start form -->
    <form id="regForm" action="{{ route('order.pay',$bill->id) }}" method="post" class="border border-3 rounded-3">
        @csrf
        @method('POST')
        <h1 class="mb-5">پرداخت</h1>
        <div class="d-flex justify-content-around border-bottom">
            <div>
                <div class="my-2">
                    <span>نام مشتری:</span>
                    <span>{{ $bill->customer }}</span>
                </div>
                <div class="my-3">
                    <span>شماره تلفن:</span>
                    <span>{{ $bill->phone }}</span>
                </div>
                <div class="my-3">
                    <span>تاریخ:</span>
                    <span>{{ $date }}</span>
                </div>
                <div class="my-3">
                    <span>ساعت:</span>
                    <span>{{ $bill->time }}</span>
                </div>
                <div class="my-3">
                    <span>وعده:</span>
                    <span>
                        @if($bill->meal == "dinner")
                            شام
                        @else
                        نهار
                        @endif
                    </span>
                </div>
                <div class="my-3">
                    <span>تعداد افراد:</span>
                    <span>{{ $bill->guests }}</span>
                </div>

            </div>
            <div>
                @foreach($bill->tables as $table)
                    <div class="my-3">
                        <span>میز:</span>
                        <span>{{ $table->name }}</span>
                    </div>
                @endforeach
                @foreach($bill->foods as $key=>$food)
                    <div class="my-3">
                        <span>غذای شماره {{ ++$key }}:</span>
                        <span>{{ $food->name }}</span>
                        -
                        <small>{{ $food->price }} تومان</small>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="my-3 text-center">
            <span>مبلغ قابل پرداخت:</span>
            <span>{{ $bill->bill }}</span>
            <small>تومان</small>
        </div>
        <div class="mt-5 text-center">
            <button  class="btn btn-success">پرداخت</button>
            <a href="{{ route('order.cancel',$bill->id) }}" class="btn btn-danger">انصراف</a>
        </div>
        <div style="text-align:center;margin-top:40px;">
            <span class="step "></span>
            <span class="step active"></span>
        </div>
    </form>
    <!-- end form -->
@endsection
