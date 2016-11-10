<?php

namespace App\Http\Bl;

use App\Http\Models\Order;

interface IOrder
{
    public function getPeriods();

    public function getOrder(Order $model, $month = null, $year = null);
}