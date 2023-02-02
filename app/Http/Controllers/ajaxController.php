<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ajaxController extends Controller
{
    public function checkDate( \Illuminate\Http\Request $request )
    {
        $dates = explode(',',$request->get('date'));
        $date = \Morilog\Jalali\CalendarUtils::toGregorian($dates[0], $dates[1], $dates[2]);
        $date = implode('-',$date);
        $isExists = \App\Models\Order::query()->where('date',$date)->where('time',$request->get('time'))->exists();
        if($isExists or 1)
        {
            $reservedTable = \App\Models\Order::query()->where('date',$date)->where('time',$request->get('time'))->get();
            $ids = [];
            foreach ($reservedTable as $table){
                $ids[] = $table['id'];
            }
            $tables = \App\Models\Table::query()->whereNotIn('id',$ids)->get();
            return response()->json(['tables' => $tables],200);
        }
        else{
            return response()->json(['reserved' => $isExists],200);
        }
    }

    public function getFood()
    {
        $food = \App\Models\Food::query()->get();
        return response()->json($food,200);
    }
}
