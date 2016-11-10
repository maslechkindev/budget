<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Order;
use App\Http\Models\OrderSettings;
use App\Http\Bl\OrderDetails;
use App\Http\Bl\OrderBuilder;

use App\Http\Requests;

class OrderController extends Controller
{
    /**
     * @param OrderDetails $orderDetails
     * @param OrderBuilder $orderBuilder
     * @param Order $order
     * @param OrderSettings $orderSettings
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(
        OrderDetails $orderDetails,
        OrderBuilder $orderBuilder,
        Order $order,
        OrderSettings $orderSettings
    ) {
        //todo cache
        $orderDetails->getOrderDetails($orderBuilder, $order, $orderSettings);
        return view('order.index', [
            'periods' => $orderDetails->getPeriods(),
            'order' => $orderDetails->getOrder(),
            'details' => $orderDetails->getDetails(),
        ]);
    }
}
