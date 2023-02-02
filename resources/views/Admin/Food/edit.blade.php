@extends('Admin.Layouts.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center border-dark border-bottom">
        <h4 class="m-5 d-inline-block">ویرایش غذا</h4>
        <a class="btn btn-primary m-5" href="{{ route('panel.food') }}"> بازگشت به صفحه قبل</a>
    </div>

    <form dir="rtl" action="{{ route('panel.food.update',$food) }}" method="post" class="form m-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3 align-items-center mb-5">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">نام غذا</label>
            </div>
            <div class="col-auto">
                <input required value="{{ $food->name }}" name="name" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                مانند "همبرگر"
                </span>
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">قیمت</label>
            </div>
            <div class="col-auto">
                <input required value="{{ $food->price }}" name="price" type="number" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                 تومان
                </span>
            </div>
        </div>

        <div class="my-3 row g-3 align-items-center">
            <div class="col-auto">
                <label for="selectbox" class="col-form-label">وعده</label>
            </div>
            <div class="col-auto">
                <select name="meal" id="selectbox" class="form-select form-control" aria-label="Default select example">
                    <option value="lunch" @if($food->meal == "lunch") selected @endif>نهار</option>
                    <option value="dinner" @if($food->meal == "dinner") selected @endif>شام</option>
                </select>
            </div>
            <div class="col-auto">
                <span id="selectbox" class="form-text">
                یک وعده را انتخاب نمایید
                </span>
            </div>
        </div>

        <div class="row my-3 g-3 align-items-center">
            <div class="col-auto">
                <label class="col-form-label" for="inputGroupFile02">عکس غذا</label>
            </div>
            <div class="col-auto">
                <input  name="image" type="file" class="form-control" id="inputGroupFile02">
            </div>
            <div class="col-auto">
                <span id="selectbox" class="form-text">
                عکسی با ابعاد <span dir="ltr">1000 x 1000</span> انتخاب نمایید
                </span>
            </div>
            <div class="col-auto" style="width: 150px">
                <img style="width: 100%" src="{{ str_replace('public','/storage',$food->image) }}" alt="">
            </div>
        </div>

        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="exampleFormControlTextarea1" class="col-form-label">توضیحات</label>
            </div>
            <div class="col-auto">
                <textarea required name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" cols="36">
                    {{ $food->description }}
                </textarea>
            </div>
            <div class="col-auto">
                <span id="exampleFormControlTextarea1" class="form-text">
               محتویات غذا مانند مواد اولیه
                </span>
            </div>
        </div>

        {{--        ---------------------------------         --}}
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">ویرایش</button>
        </div>
    </form>

@endsection
