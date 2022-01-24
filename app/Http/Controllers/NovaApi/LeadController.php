<?php

namespace App\Http\Controllers\NovaApi;

use App\Http\Controllers\AppBaseController;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends AppBaseController
{
    public function people(Request $request)
    {

        $data = Lead::all();

        return $this->sendResponse("People fetched successfully", $data);
    }
}
