<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function foods()
    {
        return $this->belongsToMany(Food::class)->withPivot('count');
    }

    public function tables()
    {
        return $this->belongsToMany(Table::class);
    }


}
