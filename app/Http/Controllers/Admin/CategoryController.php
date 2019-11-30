<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthorizationController;

class CategoryController extends AuthorizationController
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
		$this->checkPermission('view category');
		
        $categories = Category::paginate(20);

        return view('admin.category.index')->with(['categories' => $categories, 'title' => 'Manage Categories']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$this->checkPermission('create category');
		
        return view('admin.category.create', ['title' => 'Create Category']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->checkPermission('create category');
		
        $this->validate($request, [
            'name'=>'required|unique:categories|string|max:255'
        ]
        );

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category')
            ->with('flash_message',
             'Category'. $category->name.' added !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$this->checkPermission('edit category');
		
        $category = Category::findOrFail($id);

        return view('admin.category.edit',['category' => $category, 'title' => 'Edit Category : '.$category->name]);
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
		$this->checkPermission('edit category');
		$id = $request->id;
        $category = Category::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|string|max:255|unique:categories,name,'.$id,
        ]);
        
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category')
            ->with('flash_message',
             'Category'. $category->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$this->checkPermission('delete category');
		
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category')
            ->with('flash_message',
             'Category deleted!');
    }
}
