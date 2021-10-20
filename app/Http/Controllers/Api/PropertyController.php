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
        $response = Property::with('images')->paginate('500');
        return $this->sendResponse($msg, $response);
    }

    public function getDetails(Request $request)
    {
        $Ml_num = $request->input('id');
        $msg = 'Property details fetched successfully.';
        $response = Property::with('images')->where(['Ml_num' => $Ml_num])->get();
        return $this->sendResponse($msg, $response);
    }

    public function searchProperty(Request $request)
    {

        $data = $request->all();

        // vars
        $bedRoom = !empty($data['bedRoom']) ? (float) $data['bedRoom'] : '';
        $min_price = !empty($data['minPrice']) ? (float) $data['minPrice'] : '';
        $max_price = !empty($data['maxPrice']) ? (float) $data['maxPrice'] : '';

        $msg = 'Property fetched successfully.';

        $response = Property::with('images')

            ->when(!empty($data['addr']), function ($query) use ($data) {
                $addrr = $data['addr'];
                return $query->where('Addr', 'LIKE', "%{$addrr}%")
                        ->orWhere(function($query) use ($addrr) {
                            $query->where('Ml_num', 'LIKE', "%{$addrr}%");
                        });
            })

            ->when($bedRoom, function ($query) use ($data) {
                $br = (float) $data['bedRoom'];
                return $query->where('Rms', '>=', $br);
            })

            ->when($min_price, function ($query) use ($data) {
                $minp = (float) $data['minPrice'];
                return $query->where('Lp_dol', '>=', $minp);
            })

            ->when($max_price, function ($query) use ($data) {
                $mxp = (float) $data['maxPrice'];
                return $query->where('Lp_dol', '<=', $mxp);
            })

            ->when(!empty($data['listedFor']), function ($query) use ($data) {
                $S_r = $data['listedFor'];
                return $query->where('S_r', $S_r);
            })

            ->when(!empty($data['propertyType']), function ($query) use ($data) {
                $propertyType = $data['propertyType'];
                return $query->where('property_type', 'LIKE', "%{$propertyType}%");
            })

            ->orderby('id', 'DESC')
            ->paginate('500');
            
        // $response = $request->all();
        return $this->sendResponse($msg, $response);
    }
}
