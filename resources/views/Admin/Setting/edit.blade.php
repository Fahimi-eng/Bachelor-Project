@extends('Admin.Layouts.master')
@section('content')
<div class="d-flex justify-content-between align-items-center border-dark border-bottom">
    <h4 class="m-5 d-inline-block">تنظیمات سایت</h4>
</div>

<form dir="rtl" action="{{ route('panel.setting.update',$settings) }}" method="post" class="form m-5" >
    @csrf
    @method('POST')
    <p class="text-bold fs-4">سربرگ</p>
    <div class="row g-3 align-items-center mb-5">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">عنوان</label>
        </div>
        <div class="col-auto">
            <input value="{{ $settings->header_title }}" required name="header_title" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                مانند "عاشق غذاهای خوشمزه"
                </span>
        </div>
    </div>

    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="exampleFormControlTextarea1" class="col-form-label">متن شگفتی ساز</label>
        </div>
        <div class="col-auto">
            <textarea required name="header_body" class="form-control" id="exampleFormControlTextarea1" rows="5" cols="46">
                {{ $settings->header_body }}
            </textarea>
        </div>
        <div class="col-auto">
                <span id="exampleFormControlTextarea1" class="form-text">
                 معرفی کوتاه و جذاب شما
                </span>
        </div>
    </div>

    <div style="height: 1px" class="bg-dark my-4"></div>
{{--    ----------------------------------------------        --}}
    <p class=" text-bold fs-4">درباره ما</p>
    <div class="row g-3 align-items-center mb-5">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">عنوان درباره ما</label>
        </div>
        <div class="col-auto">
            <input value="{{ $settings->about_title }}" required name="about_title" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                مانند "درباره ما بیشتر بدانید"
                </span>
        </div>
    </div>

    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="exampleFormControlTextarea1" class="col-form-label">توضیحات</label>
        </div>
        <div class="col-auto">
            <textarea required name="about_body" class="form-control" id="exampleFormControlTextarea1" rows="5" cols="56">
                {{ $settings->about_body }}
            </textarea>
        </div>
        <div class="col-auto">
                <span id="exampleFormControlTextarea1" class="form-text">
                 متن درباره ما
                </span>
        </div>
    </div>

    <div class="row g-3 align-items-center my-2">
        <div class="col-auto">
            <label for="exampleFormControlTextarea1" class="col-form-label">متن درباره نهار</label>
        </div>
        <div class="col-auto">
            <textarea required name="about_lunch" class="form-control" id="exampleFormControlTextarea1" rows="4" cols="46">
                {{ $settings->about_lunch }}
            </textarea>
        </div>
        <div class="col-auto">
                <span id="exampleFormControlTextarea1" class="form-text">
                 متن درباره نهار
                </span>
        </div>
    </div>

    <div class="row g-3 align-items-center my-2">
        <div class="col-auto">
            <label for="exampleFormControlTextarea1" class="col-form-label">متن درباره شام</label>
        </div>
        <div class="col-auto">
            <textarea required name="about_dinner" class="form-control" id="exampleFormControlTextarea1" rows="4" cols="46">
                {{ $settings->about_dinner }}
            </textarea>
        </div>
        <div class="col-auto">
                <span id="exampleFormControlTextarea1" class="form-text">
                 متن درباره شام
                </span>
        </div>
    </div>

    <div style="height: 1px" class="bg-dark my-4"></div>
    {{--        ---------------------------------         --}}
    <p class=" text-bold fs-4"> پاورقی</p>
    <div class="row g-3 align-items-center my-2">
        <div class="col-auto">
            <label for="exampleFormControlTextarea1" class="col-form-label">متن توضیحات پاورقی</label>
        </div>
        <div class="col-auto">
            <textarea required name="footer_body" class="form-control" id="exampleFormControlTextarea1" rows="5" cols="46">
                {{ $settings->footer_body }}
            </textarea>
        </div>
        <div class="col-auto">
                <span id="exampleFormControlTextarea1" class="form-text">
                 متن پاورقی
                </span>
        </div>
    </div>

    <div class="row g-3 align-items-center my-2">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">آدرس</label>
        </div>
        <div class="col-auto">
            <input value="{{ $settings->address }}" required name="address" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                آدرس
                </span>
        </div>
    </div>

    <div class="row g-3 align-items-center my-2">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">تلفن</label>
        </div>
        <div class="col-auto">
            <input value="{{ $settings->telephone }}" required name="address" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                تلفن
                </span>
        </div>
    </div>

    <div class="row g-3 align-items-center my-2">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">اینستاگرام</label>
        </div>
        <div class="col-auto">
            <input value="{{ $settings->instagram }}" required name="instagram" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                آدرس صفحه اینستاگرام
                </span>
        </div>
    </div>

    <div class="row g-3 align-items-center my-2">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">توییتر</label>
        </div>
        <div class="col-auto">
            <input value="{{ $settings->twitter }}" required name="twitter" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                آدرس صفحه توییتر
                </span>
        </div>
    </div>

    <div class="row g-3 align-items-center my-2">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">فیسبوک</label>
        </div>
        <div class="col-auto">
            <input value="{{ $settings->facebook }}" required name="facebook" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                آدرس صفحه فیسبوک
                </span>
        </div>
    </div>


    <div class="row g-3 align-items-center my-2">
        <div class="col-auto">
            <label for="exampleFormControlTextarea1" class="col-form-label">متن تماس با ما پاورقی</label>
        </div>
        <div class="col-auto">
            <textarea required name="contact" class="form-control" id="exampleFormControlTextarea1" rows="5" cols="46">
                {{ $settings->contact }}
            </textarea>
        </div>
        <div class="col-auto">
                <span id="exampleFormControlTextarea1" class="form-text">
                 متن تماس با ما
                </span>
        </div>
    </div>


{{--    ------------------------        --}}
    <div class="mt-5">
        <button type="submit" class="btn btn-primary">ویرایش</button>
    </div>
</form>

@endsection
