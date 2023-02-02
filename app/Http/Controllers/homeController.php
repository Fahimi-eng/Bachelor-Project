<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\CalendarUtils;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;


class homeController extends Controller
{
    public function getPersianDate($date)
    {
        $date1 = new \Carbon\Carbon($date);
        $date2 = \Morilog\Jalali\CalendarUtils::tojalali($date1->year, $date1->month, $date1->day);
        $date3 = "{$date2[2]}-{$date2[1]}-{$date2[0]}";
        return $date3;
    }

    public function get_food_types_of($foods)
    {
        $food=array();
        for ($i=0 ; $i<count($foods) ; $i++)
        {
            if (in_array($foods[$i] , $food))
            {
                continue;
            }
            else{
                array_push($food,$foods[$i]);
            }
        }
        return $food;
    }
    public function count_numbers_of_food_from_food_types($food_type , $foods)
    {
        $counts=[count($food_type)];
        for ($i=0; $i<count($food_type) ; $i++)
        {
            $counts[$i]=0;
            for ($j=0;$j<count($foods);$j++)
            {
                if($foods[$j]==$food_type[$i])
                {
                    $counts[$i] += 1;
                }
            }
        }
        return$counts;
    }
    public function index()
    {
        return view('Client.index',[
            'foods' => Food::all(),
            'settings' => Setting::query()->first()
        ]);
    }

    public function order()
    {
        return view('Client.order');
    }

    public function submit(Request $request)
    {

//        check the same reserve
        $same_time = Order::query()->where('date' , \request('date'))->where('time' , \request('time'))->first();
        $same_table = Table::query()->find(\request('table'))->get();

        if ($same_table != null && $same_time != null)
        {
            return redirect()->back();
        }

//        calculate the type and numbers of received foods
        $foods = $request->input('foods');
        $food_types =  $this->get_food_types_of($foods);
        $food_count = $this->count_numbers_of_food_from_food_types($food_types,$foods);
//        calculate the bill of order
        $bill = 0;

        for ($i=0 ; $i < count($food_types) ; $i++)
        {
            $cost = Food::query()->where('id', $food_types[$i])->first();
            $bill += ($cost->price*$food_count[$i]);
        }

//        shetabit and Payment gateway
//        convert persian date to gregorian
        $dates = explode(',', \request('date'));
        $date = CalendarUtils::toGregorian($dates[0], $dates[1], $dates[2]);
        $date = implode('-',$date);
        $order = Order::create([
           'customer' => \request('name'),
           'phone' => \request('phone'),
           'date' => $date,
           'meal' => \request('meal'),
           'time' => \request('time'),
           'guests' => \request('guest'),
           'bill' => $bill
        ]);
        for ($i=0 ; $i < count($food_types) ; $i++)
        {
         $order->foods()->attach([$food_types[$i]],['count' => $food_count[$i]]);
        }
         $order->tables()->attach(\request('table'));
         $test = Order::query()->where('id',$order->id)->with('foods')->with('tables')->first();
         return view('Client.bill',[
             'bill' => $test,
             'date' => $this->getPersianDate($test->date)
         ]);
    }

    public function pay($id)
    {
        Order::query()->find($id)->update([
           'status' => 'done'
        ]);
        return redirect()->route('home');
    }
    public function cancel($id)
    {
        Order::query()->find($id)->update([
            'status' => 'failed'
        ]);
        return redirect()->route('home');
    }
}
