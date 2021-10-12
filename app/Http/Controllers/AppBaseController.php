<?php

namespace App\Http\Controllers;

class AppBaseController extends Controller
{
    public function sendResponse($message, $result)
    {
        return response()->json(['success' => true, 'message' => $message, 'data' => $result], 200);
    }

    public function sendError($error, $code = 404)
    {
        return response()->json(['success' => false, 'message' => $error, 'error' => $error], $code);
    }
}
