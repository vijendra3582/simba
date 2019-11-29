<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\SecurityQuestion;

class UserController extends AuthorizationController
{
    use FileUploadTrait;
    public function __construct() 
    {
        $this->middleware(['auth']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
		$this->checkPermission('view user');
		
        $users = User::paginate(20);
        
		return view('admin.user.index')->with(['users' => $users, 'title' => 'Manage Users']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$this->checkPermission('create user');
		
		$questions = SecurityQuestion::all();
        return view('admin.user.create', ['questions' => $questions, 'title' => 'Create User']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
		$this->checkPermission('create user');

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

        return redirect()->route('admin.user')
            ->with('flash_message',
             'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$this->checkPermission('view user');
		
        return redirect('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$this->checkPermission('edit user');
		
        $user = User::findOrFail($id);
        $questions = SecurityQuestion::all();
        return view('admin.user.edit', ['user' => $user, 'questions' => $questions, 'title' => 'Edit User : '.$user->name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request)
    {
		$this->checkPermission('edit user');
		$id = $request->id;
        $user = User::findOrFail($id);
        $avatar = $user->avatar;
        if($request->hasFile('avatar')){
            $avatar = $this->saveAvatar($request->avatar);
        }

        $user->name = $request->name;
        $user->avatar = $avatar;
        $user->contact = $request->contact;
        $user->city = $request->city;
        $user->dob = $request->dob;
        $user->security_question_id = $request->security_question_id;
        $user->security_question_answer = $request->security_question_answer;
        $user->save();

        return redirect()->route('admin.user')
            ->with('flash_message',
             'User successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$this->checkPermission('delete user');
		
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user')
            ->with('flash_message',
             'User successfully deleted.');
    }
}
