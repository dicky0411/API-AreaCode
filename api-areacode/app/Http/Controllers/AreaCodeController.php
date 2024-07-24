<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GB2260;


class AreaCodeController extends Controller
{
    public function getAreaCode($ac = null)
    {
        $gb2260 = new \GB2260\GB2260();
        $result = $gb2260->get($ac);
        

        // Optionally, you can return the result as a JSON response
        return response()->json($result);
    }
}
