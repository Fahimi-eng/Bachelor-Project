@extends('Admin.Layouts.master')
@section('content')
    <div class="border-bottom border-dark">
        <h4 class="m-5">لیست سفارشات</h4>
    </div>
    <table class="table height-switch">
        <thead class="thead-light">
        <tr class="border-dark">
            <th scope="col">#</th>
            <th scope="col">سفارش دهنده</th>
            <th scope="col">تعداد میهمان </th>
            <th scope="col">شماره میز</th>
            <th scope="col">ساعت</th>
            <th scope="col">تاریخ</th>
            <th scope="col">وضعیت</th>
            <th scope="col">جزئیات</th>
        </tr>
        </thead>

        <tbody>
        @foreach($orders as $key=>$order)
        <tr>
            <th scope="row">{{ ++$key }}</th>
            <td class="text-bold">{{ $order->customer }}</td>
            <td>{{ $order->guests }}</td>
            <td>{{ $order->tables[0]->name }}</td>
            <td>{{ $order->time }}</td>
            @php
                $date = new \Carbon\Carbon($order->date);
                $date = \Morilog\Jalali\CalendarUtils::tojalali($date->year, $date->month, $date->day);
            @endphp
            <td>{{ implode('/',$date) }}</td>
            <td class="text-danger">
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
            </td>
            <td><a href="{{ route('panel.order.show',$order->id) }}"><i class="fa fa-eye" style="font-size: 20px"></i></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
