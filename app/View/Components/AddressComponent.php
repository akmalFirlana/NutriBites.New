<?php
namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressComponent extends Component
{
    public $addresses;

    public function __construct()
    {
        $this->addresses = UserAddress::where('user_id', Auth::id())->with('alamat')->get();
    }

    public function render()
    {
        return view('components.address-component');
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
                'is_primary' => false, // Set default value
            ]);

            return redirect()->back()->with('success', 'Alamat berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan alamat: ' . $e->getMessage());
        }
    }

}
