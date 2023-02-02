@extends('Admin.Layouts.master')
@section('content')
    <div class="d-flex justify-content-between align-items-center border-bottom border-dark">
        <h4 class="m-5 d-inline-block">لیست میزها</h4>
        <a class="btn btn-primary m-5" href="{{ route('panel.tables.create') }}"> میز جدید</a>
    </div>
    <table class="table">
        <thead>
        <tr class="border-dark">
            <th scope="col">#</th>
            <th scope="col">نام میز</th>
            <th scope="col">تعداد صندلی</th>
            <th scope="col">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tables as $key=>$table)
        <tr>
            <th scope="row">{{ ++$key }}</th>
            <td>{{ $table->name }}</td>
            <td>{{ $table->capacity }} عدد</td>
            <td class="btn-group btn-group-sm">
                <a href="{{ route('panel.tables.edit',$table) }}" class="btn btn-outline-primary">ویرایش</a>
                <form class="form" action="{{ route('panel.tables.destroy',$table) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-primary">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
