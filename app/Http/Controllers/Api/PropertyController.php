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
        $response = Property::with('images')->get();
        return $this->sendResponse($msg, $response);
    }
}
