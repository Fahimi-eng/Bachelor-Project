@extends('Admin.Layouts.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center border-bottom border-dark">
        <h4 class="m-5 d-inline-block">افزودن میز جدید</h4>
        <a class="btn btn-primary m-5" href="{{ route('panel.tables') }}"> بازگشت به صفحه قبل</a>
    </div>
    <form dir="rtl" action="{{ route('panel.tables.store') }}" method="post" class="form m-5">
        @csrf
        @method('POST')
        <div class="row g-3 align-items-center mb-5">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">نام میز</label>
            </div>
            <div class="col-auto">
                <input name="name" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                مانند "میز شماره یک"
                </span>
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">تعداد صندلی</label>
            </div>
            <div class="col-auto">
                <input name="capacity" min="1" max="10" type="number" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                تعداد صندلی مورد نظر برای میز
                </span>
            </div>
        </div>

{{--        ---------------------------------         --}}
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">ثبت</button>
        </div>
    </form>
@endsection
