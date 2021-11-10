<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

class LeadController extends AppBaseController
{
    //

    public function saveLead(Request $request)
    {
        return $this->sendResponse("OK WORKING ON SAVING LEADS...", $request->all());
    }
}
