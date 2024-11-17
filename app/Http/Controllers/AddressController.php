<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = UserAddress::where('user_id', Auth::id())->with('alamat')->get();
        $provinces = Alamat::select('prov_id', 'prov_name')->distinct()->get();

        return view('alamat', [
            'addresses' => $addresses,
            'provinces' => $provinces,
            'showList' => true,
        ]);
    }

    public function admin()
    {
        $addresses = UserAddress::where('user_id', Auth::id())->with('alamat')->get();
        $provinces = Alamat::select('prov_id', 'prov_name')->distinct()->get();

        return view('admin.gudang', [
            'addresses' => $addresses,
            'provinces' => $provinces,
            'showList' => true,
        ]);
    }

    public function upload()
    {
        $addresses = UserAddress::where('user_id', Auth::id())->with('alamat')->get();
        $provinces = Alamat::select('prov_id', 'prov_name')->distinct()->get();

        return view('admin.produk.upload', [
            'addresses' => $addresses,
            'provinces' => $provinces,
            'showList' => true,
        ]);
    }

    // Show form for adding a new address
    public function create()
    {
        $provinces = Alamat::select('prov_id', 'prov_name')->distinct()->get(); 
        return view('alamat', [
            'provinces' => $provinces,
            'showForm' => true,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'province_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'label' => 'required',
            'recipient_name' => 'required',
            'phone_number' => 'required',
            'full_address' => 'required',
            'postal_code' => 'required',
        ]);

        try {
            UserAddress::create([
                'user_id' => Auth::id(),
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'district_id' => $request->district_id,
                'label' => $request->label,
                'recipient_name' => $request->recipient_name,
                'phone_number' => $request->phone_number,
                'full_address' => $request->full_address,
                'postal_code' => $request->postal_code,
                'is_primary' => true, 
            ]);

            return redirect()->back()->with('success', 'Alamat berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan alamat: ' . $e->getMessage());
        }
    }



    public function getCities($provinceId)
    {
        try {
            $cities = Alamat::where('prov_id', $provinceId)
                ->select('city_id', 'city_name')
                ->distinct()
                ->get();
            return response()->json($cities);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch cities'], 500);
        }
    }

    public function getDistricts($cityId)
    {
        try {
            $districts = Alamat::where('city_id', $cityId)
                ->select('dis_id', 'dis_name')
                ->distinct()
                ->get();
            return response()->json($districts);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch districts'], 500);
        }
    }


}
