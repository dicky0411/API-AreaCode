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
    try {
        $gb2260 = new \GB2260\GB2260();
        $result = $gb2260->get($ac);
        
        if ($result) {
            $message = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } else {
            $message = 'Invalid Area Code.';
        }
    } catch (\Exception $e) {
        $message = 'An error occurred: ' . $e->getMessage();
    }

    return view('welcome', [
        "message" => $message,
        "AC" => $ac,
    ]);
}

}
