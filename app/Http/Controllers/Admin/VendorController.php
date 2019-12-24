<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\VendorCreateRequest;
use App\Http\Requests\VendorEditRequest;
use App\Models\Category;
use App\Models\Designation;
use App\Models\VendorDetail;
use App\User;

class VendorController extends AuthorizationController
{
    use FileUploadTrait;
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $this->checkPermission('view vendor');
        $vendors = User::whereRole('vendor')->paginate(20);
        return view('admin.vendor.index', ['title' => 'Manage Vendors', 'users' => $vendors]);
    }

    public function create(){
        $this->checkPermission('create vendor');
        $designation = Designation::all();
        $category = Category::all();
        return view('admin.vendor.create', ['designation' => $designation, 'category' => $category, 'title' => 'Create Vendor']);
    }

    public function store(VendorCreateRequest $request){
        $this->checkPermission('create vendor');
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

        return redirect()->route('admin.vendor')
            ->with('flash_message',
             'Vendor successfully added.');
    }

    public function edit($id){
        $this->checkPermission('edit vendor');
        $user = User::with(['vendor'])->whereRole('vendor')->whereId($id)->firstOrFail();
        $designation = Designation::all();
        $category = Category::all();
        return view('admin.vendor.edit', ['user' => $user, 'designation' => $designation, 'category' => $category, 'title' => 'Edit Vendor : '.$user->name]);
    }

    public function update(VendorEditRequest $request){
        
    }
}
