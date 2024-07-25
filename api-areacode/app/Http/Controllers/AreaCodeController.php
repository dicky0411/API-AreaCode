<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GB2260;
use Illuminate\Http\Request;


class AreaCodeController extends Controller
{
    public function getAreaCode($ac = null)
    {
        $gb2260 = new \GB2260\GB2260();
        $result = $gb2260->get($ac);

        if ($result === null) {
            return response()->json(['error' => 'Area code not found'], 404, [], JSON_PRETTY_PRINT);
        }

        return response()->json($result, 200, [], JSON_PRETTY_PRINT);
    }
    public function show(Request $request, $ac = null)
    {
        $gb2260 = new \GB2260\GB2260();
        $result = $gb2260->get($ac);
       
        return view('welcome', [
            "message" => json($result,200,[],JSON_PRETTY_PRINT),
            "AC" => $ac,
        ]);
    }

}
