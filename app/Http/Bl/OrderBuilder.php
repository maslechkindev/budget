<?php

namespace App\Http\Bl;

use App\Http\Models\Order;
use App\Http\Models\OrderSettings;

class OrderBuilder implements IOrder, IOrderSettings
{
    const MONTHS = 12;
    const YEARS = 5;

    /** @var  integer */
    private $_currentMonth;

    /** @var  integer */
    private $_currentYear;
    

    public function __construct()
    {
        $this->_currentMonth = (int)date('m', time());
        $this->_currentYear = (int)date('Y', time());
    }

    /**
     * @return array
     */
    public function getPeriods()
    {
        for ($id = 1; $id <= self::MONTHS; $id++) {
            $months[$id] = date('F', mktime(0, 0, 0, $id, 1, date('Y')));
        }
        for ($id = self::YEARS; $id >= 0; $id--) {
            $years[$id] = (int)date('Y', time()) - $id;
        }
        return [
            'months' => !empty($months) ? $months : [],
            'years' => !empty($years) ? $years : [],
            'currentMonth' => [$this->_currentMonth],
            'currentYear' => [$this->_currentYear]
        ];
    }


    /**
     * @param Order $model
     * @param integer $month
     * @param integer $year
     * @return object
     */
    public function getOrder(Order $model, $month = null, $year = null)
    {
        $order = json_decode($model->getOrder(!empty($month) ? $month : $this->_currentMonth,
            !empty($year) ? $year : $this->_currentYear));
        return !empty($order[0]) ? $order[0] : null;
    }


    /**
     * @param OrderSettings $model
     * @param integer $orderId
     * @return array
     */
    public function getOrderDetails(OrderSettings $model, $orderId)
    {
        $order = json_decode($model->getOrderDetails($orderId));
        return !empty($order) ? $order : null;
    }

}