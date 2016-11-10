<?php

namespace App\Http\Bl;

use App\Http\Models;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;

class Bl
{
    protected function checkEmpty($param)
    {
        return !empty($param) ? $param : null;
    }
}