<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Designation;
use App\Models\SecurityQuestion;

class CommonController extends Controller
{
    public function getSecurityQuestions(){
        $questions = SecurityQuestion::all();
        return response()->json(['status' => true, 'questions' => $questions], 200);
    }

    public function getCategories(){
        $categories = Category::all();
        return response()->json(['status' => true, 'categories' => $categories], 200);
    }

    public function getDesignations(){
        $designations = Designation::all();
        return response()->json(['status' => true, 'designations' => $designations], 200);
    }
}
