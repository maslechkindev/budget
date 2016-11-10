<?php

namespace App\Http\Bl;

use App\Http\Models\Order;
use App\Http\Models\OrderSettings;
use \App\Http\Bl\OrderBuilder;

class OrderDetails
{
    /** @var  array */
    private $_periods;

    /** @var  object */
    private $_order;

    /** @var  array */
    private $_details;

    /**
     * @param array $periods
     */
    private function _setPeriods($periods)
    {
        $this->_periods = $periods;
    }

    /**
     * @param object $order
     */
    private function _setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @param array $details
     */
    private function _setDetails($details)
    {
        $this->_details = $details;
    }

    /**
     * @return array
     */
    public function getPeriods()
    {
        return $this->_periods;
    }

    /**
     * @return array
     */
    public function getOrder()
    {
        return $this->_order;
    }

    /**
     * @return array
     */
    public function getDetails()
    {
        return $this->_details;
    }

    /**
     * @param OrderBuilder $orderBuilder
     * @param Order $model
     * @param OrderSettings $modelSettings
     * @param integer | null $month
     * @param integer | null $year
     */
    public function getOrderDetails(
        OrderBuilder $orderBuilder,
        Order $model,
        OrderSettings $modelSettings,
        $month = null,
        $year = null
    ) {
        $order = $orderBuilder->getOrder($model, $month, $year);
        $this->_setPeriods($orderBuilder->getPeriods());
        $this->_setOrder($order);
        $this->_setDetails($orderBuilder->getOrderDetails($modelSettings, $order->id));
    }
}