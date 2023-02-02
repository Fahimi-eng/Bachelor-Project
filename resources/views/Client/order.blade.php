@extends('Client.Layout.master')
@section('content')
    <!-- start form -->
    <form id="regForm" action="{{ route('order.submit') }}" method="post" class="border border-3 rounded-3">
        @csrf
        @method('POST')
        <h1 class="mb-5">سفارش و رزرو</h1>
        <!-- One "tab" for each step in the form: -->
        <div class=" mb-2 text-danger">
            <label for="name"><span class="fs-6">نام :</span></label>
            <p><input required autocomplete="off" name="name" class="rounded-3" placeholder="نام خود را وارد کنید..." oninput="this.className = ''"></p>
            <label for="phone"><span class="fs-6">تلفن :</span></label>
            <p><input required type="text"   autocomplete="off" name="phone" class="rounded-3" placeholder="شماره موبایل..." oninput="this.className = ''"></p>
            <div>
                <label for="guest"><span class="fs-6 text-danger">تعداد افراد :</span></label>
                <p><input required name="guest" onchange='selectePerson(this)' type="number" min="1" max="10" class="rounded-3" placeholder="تعداد ..." oninput="this.className = ''"></p>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between">
                <div>
                    <label for="date"><span class="fs-6">تاریخ :</span></label>
                        <input required autocomplete="off" id="date" name="date" placeholder="تاریخ رزرو..." oninput="this.className = '' " class="persianDatePicker rounded-3" type="text" />
                </div>
                <div class="d-flex justify-content-between">
                    <div class="ms-2">
                        <label for="meal">وعده:</label>
                        <select name="meal" id="selectbox" class="form-select form-control" aria-label="Default select example">
                            <option value="lunch" selected>نهار</option>
                            <option value="dinner">شام</option>
                        </select>
                    </div>
                    <div id="lunch-time">
                        <label for="time"><span class="fs-6">ساعت :</span></label>
                        <select name="time" id="time1" class="form-select form-control" aria-label="Default select example">
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="12:00">12:00</option>
                            <option value="12:30">12:30</option>
                            <option value="13:00">13:00</option>
                            <option value="13:30">13:30</option>
                        </select>
                    </div>
                    <div id="dinner-time" class="d-none">
                        <label for="time">ساعت</label>
                        <select name="time" id="time2" class="form-select form-control" aria-label="Default select example">
                            <option value="19:00">19:00</option>
                            <option value="19:30">19:30</option>
                            <option value="20:00">20:00</option>
                            <option value="20:30">20:30</option>
                            <option value="21:00">21:00</option>
                            <option value="21:30">21:30</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button class="mt-4 btn btn-danger my-auto" onclick="checkDate(this)" type="button">نمایش میزها</button>
                </div>
            </div>
            <div class="d-none">
                <label for="table" class="text-danger mt-3">انتخاب میز</label>
                <select required name="table" id="table" class="form-select form-control" aria-label="Default select example" >
                    سسس
                </select>
            </div>
            <div id='foodPerson' class="d-flex flex-wrap flex-column flex-md-row py-3 justify-content-start flex-wrap">
                <div class="d-none mt-3 mt-md-2">
                    <label for="" class="text-dark">انتخاب غذای فرد <span>1</span></label>
                    <select name="food3" id="" class="form-select form-control" aria-label="Default select example">
                        <option><span>تعداد افراد را مشخص نمایید</span></option>
                    </select>
                </div>
            </div>
        </div>
        <div style="float:right;">
            <button class="btn btn-danger" type="submit" id="nextBtn">بعدی</button>
        </div>
        <div style="text-align:center;margin-top:40px;">
            <span class="step active"></span>
            <span class="step"></span>
        </div>
    </form>
    <!-- end form -->
@endsection



@push('scripts')
    <script src="/Client/js/persian-date.min.js"></script>
    <script src="/Client/js/persian-datepicker.min.js"></script>
    <script src="/Client/js/order.js"></script>

    <script>
    $(document).ready(function() {
        $(".persianDatePicker").pDatepicker({
        format: 'YYYY,MM,DD',
        initialValue: false,
        formatter: function (unixDate){
            var self = this;
            var pdate = new persianDate(unixDate);
            pdate.formatPersian = false;
            return pdate.format(self.format);
        }
        });
    });
    </script>

@endpush
@push('links')
    <link rel="stylesheet" href="/Client/css/persian-datepicker.min.css">
@endpush
