<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class Order extends Model
{
    protected $table = 'order';


    /**
     * @param $month
     * @param $year
     * @return string
     */
    public function getOrder($month, $year)
    {
        return self::where('order.month', '=', $month)
            ->where('order.year', '=', $year)
            ->get()
            ->toJson();
    }
}
