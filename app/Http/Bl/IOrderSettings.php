<?php

namespace App\Http\Bl;

use App\Http\Models\OrderSettings;

interface IOrderSettings
{
    public function getOrderDetails(OrderSettings $model, $orderId);
}