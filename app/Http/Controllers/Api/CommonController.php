<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SecurityQuestion;

class CommonController extends Controller
{
    public function getSecurityQuestions(){
        $questions = SecurityQuestion::all();
        return response()->json(['status' => true, 'questions' => $questions], 200);
    }
}
