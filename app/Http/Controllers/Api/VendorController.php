<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\VendorCreateRequest;
use App\Models\VendorDetail;
use App\User;

class VendorController extends Controller
{

    use FileUploadTrait;

    public function __construct()
    {
        
    }

    public function register(VendorCreateRequest $request)
    {

        $avatar = $this->saveAvatar($request->avatar);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => $request->password,
            'city' => $request->city,
            'avatar' => $avatar
        ]);

        $user->assignRole('vendor');
        
        $registration_details = [];
        $titles = $request->registration_details_title;
        foreach ($request->registration_details_file as $key => $value) {
            $file = $this->saveAvatar($value);
            $title = $titles[$key];
            $registration_details[] = [
                'title' => $title,
                'file' => $file
            ];
        }

        VendorDetail::create([
            'user_id' => $user->id,
            'category_id' => $request->category_id,
            'designation_id' => $request->designation_id,
            'discount' => $request->discount,
            'registration_tenure' => $request->registration_tenure,
            'registration_details' => $registration_details,
        ]);

        return response()->json(['status' => true, 'message' => 'You have registered successfully.', 'user' => $user], 200);
    }
}
