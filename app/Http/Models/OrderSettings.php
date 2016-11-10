<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class OrderSettings extends Model
{
    protected $table = 'order_settings';


    /**
     * @param integer $orderId
     * @return string
     */
    public function getOrderDetails($orderId)
    {
        $users = self::select(['good.*'])
            ->leftJoin('good', 'good_id', '=', 'good.id')
            ->leftJoin('subcategory', 'good.subcat_id', '=', 'subcategory.id')
            ->where('order_id', '=', $orderId)
            ->get();
        return !empty($users) ? $users : [];
    }
}