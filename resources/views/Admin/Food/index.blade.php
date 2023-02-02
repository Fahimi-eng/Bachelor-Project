@extends('Admin.Layouts.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center border-bottom border-dark">
        <h4 class="m-5 d-inline-block">لیست غذا</h4>
        <a class="btn btn-primary m-5" href="{{ route('panel.food.create') }}">افزودن غذای جدید</a>
    </div>

    <div class="d-flex flex-wrap">
        @foreach($foods as $food)
        <div class="card border border-dark mx-2 my-3" style="max-width: 19rem">
            {{-- @dd($food->image) --}}
            <img style="border-radius: 16px 16px 0 0" src="{{ str_replace('public','/storage',$food->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title bg-primary text-light border px-2 py-2">{{ $food->name }}</h5>
                <p class="card-text">
                    محتویات:<br>
                    {{ $food->description }}
                </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">قیمت: <span class="bg-primary text-light px-1 border">{{ $food->price }}</span> تومان</li>
                <li class="list-group-item">وعده: @php
                        if ($food->meal == 'dinner')
                            echo 'شام';
                        else
                            echo "نهار";
                        @endphp</li>
            </ul>
            <div class="card-body">
                <div class="btn-group btn-group-sm d-flex">
                    <a href="{{ route('panel.food.edit',$food) }}" class="btn btn-outline-primary">ویرایش</a>
                    <form class="form" action="{{ route('panel.food.destroy',$food) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-primary">حذف</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection
