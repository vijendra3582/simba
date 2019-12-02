<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthorizationController;

class SecurityQuestionController extends AuthorizationController
{
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
		$this->checkPermission('view designation');
		
        $designations = Designation::paginate(20);

        return view('admin.designation.index')->with(['designations' => $designations, 'title' => 'Manage Designations']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$this->checkPermission('create designation');
		
        return view('admin.designation.create', ['title' => 'Create Designation']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->checkPermission('create designation');
		
        $this->validate($request, [
            'name'=>'required|unique:designations|string|max:255'
        ]
        );

        $designation = new Designation();
        $designation->name = $request->name;
        $designation->save();

        return redirect()->route('admin.designation')
            ->with('flash_message',
             'Designation'. $designation->name.' added !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$this->checkPermission('edit designation');
		
        $designation = Designation::findOrFail($id);

        return view('admin.designation.edit',['designation' => $designation, 'title' => 'Edit Designation : '.$designation->name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		$this->checkPermission('edit designation');
		$id = $request->id;
        $designation = Designation::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|string|max:255|unique:designations,name,'.$id,
        ]);
        
        $designation->name = $request->name;
        $designation->save();

        return redirect()->route('admin.designation')
            ->with('flash_message',
             'Designation'. $designation->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$this->checkPermission('delete designation');
		
        $designation = Designation::findOrFail($id);
        $designation->delete();

        return redirect()->route('admin.designation')
            ->with('flash_message',
             'Designation deleted!');
    }
}
