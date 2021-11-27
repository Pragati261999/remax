<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Property;

class MasterSearchController extends AppBaseController
{

    // Master search using key:
    public function search(Request $request)
    {
        $isFound = false;

        $key = $request->key;

        // Search in list max 5 
        $list = Property::where('property_type', 'LIKE', "{$key}%")
            ->orWhere('S_r', 'LIKE', "%{$key}%")
            ->orWhere('Ad_text', 'LIKE', "%{$key}%")
            ->orWhere('Addr', 'LIKE', "%{$key}%")
            ->orWhere('Ml_num', 'LIKE', "%{$key}%")
            // ->orWhere('Municipality_district', 'LIKE', "%{$key}%")
            // ->orWhere('Municipality', 'LIKE', "%{$key}%")
            // ->orWhere('Community', 'LIKE', "%{$key}%")
            ->orderby('id', 'DESC')
            ->take(5)
            ->get();


        // Search in location max 5
        $loc = Property::Where('Addr', 'LIKE', "%{$key}%")
            ->orWhere('Municipality_district', 'LIKE', "{$key}%")
            ->orWhere('Municipality', 'LIKE', "{$key}%")
            ->orWhere('Community', 'LIKE', "{$key}%")
            ->orderby('id', 'DESC')
            ->take(4)
            ->get();

        if (count($loc) > 0 || count($list) > 0) {
            $isFound = true;
        }

        $data = [
            'dataFound' => $isFound, //false
            'location' => $loc,
            'listing' => $list,
        ];

        return $this->sendResponse('Your query has been saved. We will contact you very soon.', $data);
    }



    public function searchProperty(Request $request)
    {

        $data = $request->all();

        // vars
        $bedRoom = !empty($data['bedRoom']) ? (int) $data['bedRoom'] : '';
        $min_price = !empty($data['minPrice']) ? (int) $data['minPrice'] : '';
        $max_price = !empty($data['maxPrice']) ? (int) $data['maxPrice'] : '';
        $listedFor = !empty($data['listedFor']) ? $data['listedFor'] : '';
        $propType = !empty($data['propertyType']) ? $data['propertyType'] : '';
        $bath = !empty($data['bath']) ? (int) $data['bath'] : '';
        $openHouse = !empty($data['openHouse']) ? (bool) $data['openHouse'] : '';
        $addedFrom =  !empty($data['addedFrom']) ? $data['addedFrom'] : '';
        $key = !empty($data['key']) ? $data['key'] : '';
        $addr = !empty($data['addr']) ? $data['addr'] : '';

        $Sqft = !empty($data['sqft']) ? (int) $data['sqft'] : '';

        $msg = 'Property fetched successfully.';

        $response = Property::with('images')

            // sqft - working
            ->when($Sqft, function ($query) use ($data) {
                $Sqft_ = (int) $data['sqft'];
                return $query->whereRaw('CAST(Sqft AS UNSIGNED) >= ' . $Sqft_);
            })

            // Addr - Done
            ->when($addr, function ($query) use ($data) {

                $addrr = $data['addr'];

                $id = Property::where('Addr', 'LIKE', "%{$addrr}%")
                    ->orWhere(function ($query) use ($addrr) {
                        $query->where('Ml_num', 'LIKE', "%{$addrr}%");
                    })
                    ->orWhere(function ($query) use ($addrr) {
                        $query->where('Municipality_district', 'LIKE', "{$addrr}%");
                    })
                    ->orWhere(function ($query) use ($addrr) {
                        $query->where('Municipality', 'LIKE', "{$addrr}%");
                    })
                    ->orWhere(function ($query) use ($addrr) {
                        $query->where('Community', 'LIKE', "{$addrr}%");
                    })
                    ->select('id')->get();

                return $query->whereIn('id', $id);
            })

            ->orderby('id', 'DESC')
            // ->toSql();
            ->paginate('15')->withQueryString();

        // $response = $request->all();
        return $this->sendResponse($msg, $response);
    }
}
