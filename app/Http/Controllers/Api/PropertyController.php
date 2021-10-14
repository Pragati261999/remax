<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends AppBaseController
{
    public function getProperties(Request $request)
    {
        $msg = 'Property fetched successfully.';
        $response = Property::with('images')->paginate('15');
        return $this->sendResponse($msg, $response);
    }

    public function getDetails(Request $request)
    {
        $Ml_num = $request->input('id');
        $msg = 'Property details fetched successfully.';
        $response = Property::with('images')->where(['Ml_num' => $Ml_num])->get();
        return $this->sendResponse($msg, $response);
    }
}
