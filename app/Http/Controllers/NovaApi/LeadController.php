<?php

namespace App\Http\Controllers\NovaApi;

use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Illuminate\Http\Request;

class LeadController extends AppBaseController
{
    public function people(Request $request)
    {

        $data = user::where(['role' => 'user'])->paginate(10)->withQueryString();
        return $this->sendResponse("People fetched successfully", $data);
    }
}
