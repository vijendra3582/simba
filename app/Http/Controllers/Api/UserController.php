<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\UserCreateRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use FileUploadTrait;

    public function __construct()
    {
        
    }

    public function register(UserCreateRequest $request)
    {
        $avatar = $this->saveAvatar($request->avatar);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => $request->password,
            'city' => $request->city,
            'dob' => $request->dob,
            'security_question_id' => $request->security_question_id,
            'security_question_answer' => $request->security_question_answer,
            'avatar' => $avatar
        ]);

		$user->assignRole('user');

        return response()->json(['status' => true, 'message' => 'You have registered successfully.', 'user' => $user], 200);
    }

    public function login(Request $request){

    }
}
