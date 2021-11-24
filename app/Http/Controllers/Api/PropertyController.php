<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Models\Favourite;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends AppBaseController
{

    public function getAllAutocomplete(Request $request)
    {
        $key = $request->input('key');
        $response = Property::where('Ml_num', 'LIKE', "{$key}%")
            ->orWhere('addr', 'LIKE', "{$key}%")
            ->select('Ml_num', 'addr')
            ->get();

        dd("PPP");

        $msg = 'Autocomplete fetched successfully.';
        return $this->sendResponse($msg, $response);
    }

    public function getProperties(Request $request)
    {

        $addrr = $request->input('property-location');
        $msg = 'Property fetched successfully.';
        $response = Property::where('Municipality', 'LIKE', "%{$addrr}%")
            ->orWhere('Municipality_district', 'LIKE', "%{$addrr}%")
            ->orWhere('Community', 'LIKE', "%{$addrr}%")
            ->with('images')
            ->orderby('id', 'DESC')
            ->paginate('9');
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

        // bedRoom: 2
        // minPrice: 500
        // maxPrice: 20000
        // listedFor: Lease
        // propertyType: Residential
        // bath: 2
        // openHouse: true
        // addedFrom: 2021-11-26
        // key: 555
        // addr: 34

        // sqft: 2500

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

            // ->when(!empty($data['addr']), function ($query) use ($data) {
            //     $addrr = $data['addr'];
            //     return $query->where('Addr', 'LIKE', "%{$addrr}%")
            //         ->orWhere(function ($query) use ($addrr) {
            //             $query->where('Ml_num', 'LIKE', "%{$addrr}%");
            //         });
            // })

            // return $query->where('Addr', 'LIKE', "%{$addrr}%")
            //         ->orWhere('Municipality_district', 'LIKE', "{$addrr}%")
            //         ->orWhere('Community', 'LIKE', "{$addrr}%")
            //         ->orWhere('Municipality', 'LIKE', "{$addrr}%")
            //         ->orWhere(function ($query) use ($addrr) {
            //             $query->where('Ml_num', 'LIKE', "%{$addrr}%");
            //         });

            ->when($addr, function ($query) use ($data) {
                $addrr = $data['addr'];
                return $query->where('Addr', 'LIKE', "%{$addrr}%")
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
                    });
            })

            // Bed Rooms -- done
            ->when($bedRoom, function ($query) use ($data) {
                $br = (int) $data['bedRoom'];
                return $query->where('Br', '>=', $br);
            })

            // Min Price - done
            ->when($min_price, function ($query) use ($data) {
                $minp = (float) $data['minPrice'];
                return $query->where('Lp_dol', '>=', $minp);
            })

            // Max Price - Done
            ->when($max_price, function ($query) use ($data) {
                $mxp = (float) $data['maxPrice'];
                return $query->where('Lp_dol', '<=', $mxp);
            })

            // Listed for - Rent or sell - done
            ->when($listedFor, function ($query) use ($data) {
                $S_r = $data['listedFor'];
                return $query->where('S_r', $S_r);
            })

            // Property type - Done
            ->when($propType, function ($query) use ($data) {
                $propertyType = $data['propertyType'];
                return $query->where('property_type', 'LIKE', "%{$propertyType}%");
            })

            // bath - Done
            ->when($bath, function ($query) use ($data) {
                $bath = (int) $data['bath'];
                return $query->where('Bath_tot', '>=', $bath);
            })

            // openHouse - Done
            ->when($openHouse, function ($query) use ($data) {
                $openHouse_ = [NULL, 'None', ''];
                return $query->whereNotIn('Patio_ter', $openHouse_);
            })

            // addedFrom -- Idx_dt - Done
            ->when($addedFrom, function ($query) use ($data) {
                $addedFrom_ = $data['addedFrom'];
                return $query->where('Idx_dt', '<=', $addedFrom_);
            })

            // key - Done
            ->when($key, function ($query) use ($data) {
                $key_ = $data['key'];
                return $query->where('Ad_text', 'LIKE', "%{$key_}%");
            })

            // sqft
            // ->when($Sqft, function ($query) use ($data) {
            //     $Sqft_ = (int) $data['sqft'];
            //     return $query->where('Sqft', '>', $Sqft_);
            // })

            ->orderby('id', 'DESC')
            ->paginate('15')->withQueryString();

        // $response = $request->all();
        return $this->sendResponse($msg, $response);
    }

    public function searchProperty_BCUP(Request $request)
    {

        $data = $request->all();

        // vars
        $bedRoom = !empty($data['bedRoom']) ? (float) $data['bedRoom'] : '';
        $min_price = !empty($data['minPrice']) ? (float) $data['minPrice'] : '';
        $max_price = !empty($data['maxPrice']) ? (float) $data['maxPrice'] : '';

        $bath = !empty($data['bath']) ? (float) $data['bath'] : '';
        $addedFrom =  !empty($data['addedFrom']) ? $data['addedFrom'] : '';
        $key = !empty($data['key']) ? $data['key'] : '';

        $Sqft = !empty($data['sqft']) ? (float) $data['sqft'] : '';
        $openHouse = !empty($data['openHouse']) ? $data['openHouse'] : '';

        $msg = 'Property fetched successfully.';

        $response = Property::with('images')

            ->when(!empty($data['addr']), function ($query) use ($data) {
                $addrr = $data['addr'];
                return $query->where('Addr', 'LIKE', "%{$addrr}%")
                    ->orWhere('Municipality_district', 'LIKE', "{$addrr}%")
                    ->orWhere('Community', 'LIKE', "{$addrr}%")
                    ->orWhere('Municipality', 'LIKE', "{$addrr}%")
                    ->orWhere(function ($query) use ($addrr) {
                        $query->where('Ml_num', 'LIKE', "%{$addrr}%");
                    });
            })

            ->when($bedRoom, function ($query) use ($data) {
                $br = (float) $data['bedRoom'];
                $col = 'Rm' . $br . '_len';
                return $query->where($col, '>', 0.00);
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

            // bath
            ->when($bath, function ($query) use ($data) {
                $bath = (int) $data['bath'];
                return $query->where('Bath_tot', '>=', $bath);
            })

            // sqft
            // ->when($Sqft, function ($query) use ($data) {
            //     $Sqft_ = (int) $data['sqft'];
            //     return $query->where('Sqft', '>', $Sqft_);
            // })

            // addedFrom -- Idx_dt
            ->when($addedFrom, function ($query) use ($data) {
                $addedFrom_ = $data['addedFrom'];
                return $query->where('Idx_dt', '<=', $addedFrom_);
            })

            // key
            ->when($key, function ($query) use ($data) {
                $key_ = $data['key'];
                return $query->where('Ad_text', 'LIKE', "%{$key_}%");
            })

            // openHouse
            // ->when($openHouse, function ($query) use ($data) {
            //     $openHouse_ = $data['openHouse'];
            //     return $query->where('openHouse', 'LIKE', "%{$openHouse_}%");
            // })

            ->orderby('id', 'DESC')
            ->paginate('15')->withQueryString();

        // $response = $request->all();
        return $this->sendResponse($msg, $response);
    }

    // saveFavourite
    public function saveFavourite(Request $request)
    {

        $userId = auth()->user()->id;

        $data = [
            'user_id' => $userId,
            'ml_num' => $request->ml_num
        ];

        $exists = Favourite::where($data)->exists();

        if ($exists) {
            Favourite::where($data)->delete();
            return $this->sendResponse("Removed from your favourite list.", ['action' => 'removed', 'ml_num' => $request->ml_num]);
        }

        Favourite::create($data);
        return $this->sendResponse("Added to your favourite list.", ['action' => 'added', 'ml_num' => $request->ml_num]);
    }
    public function getFavourite(Request $request)
    {
        // return $this->sendResponse('Bookmark Property successfully', []);
        $userId = auth()->user()->id;
        $f_id =  Favourite::where(['user_id' => $userId])->get('ml_num');
        // echo count($f_id);
        $response = Property::whereIn('ml_num', $f_id)->with('images')->orderby('id', 'DESC')->paginate('3');
        return $this->sendResponse('Bookmark Property successfully', $response);
    }
    public function getRecent(Request $request)
    {
        $f_id = $request->ml_num;
        // echo count($f_id);
        $response = Property::whereIn('ml_num', $f_id)->with('images')->orderby('id', 'DESC')->paginate('3');
        return $this->sendResponse('Bookmark Property successfully', $response);
    }
}
