<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthorizationController;
use App\Models\SecurityQuestion;

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
		$this->checkPermission('view question');
		
        $questions = SecurityQuestion::paginate(20);

        return view('admin.question.index')->with(['questions' => $questions, 'title' => 'Manage Questions']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$this->checkPermission('create question');
		
        return view('admin.question.create', ['title' => 'Create Question']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->checkPermission('create question');
		
        $this->validate($request, [
            'question'=>'required|unique:security_questions|string|max:255'
        ]
        );

        $question = new SecurityQuestion();
        $question->question = $request->question;
        $question->save();

        return redirect()->route('admin.question')
            ->with('flash_message',
             'Question '. $question->question.' added !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$this->checkPermission('edit question');
		
        $question = SecurityQuestion::findOrFail($id);

        return view('admin.question.edit',['question' => $question, 'title' => 'Edit Question : '.$question->question]);
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
		$this->checkPermission('edit question');
		$id = $request->id;
        $question = SecurityQuestion::findOrFail($id);

        $this->validate($request, [
            'question'=>'required|string|max:255|unique:security_questions,question,'.$id,
        ]);
        
        $question->question = $request->question;
        $question->save();

        return redirect()->route('admin.question')
            ->with('flash_message',
             'Question '. $question->question.' updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$this->checkPermission('delete question');
		
        $question = SecurityQuestion::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.question')
            ->with('flash_message',
             'Question deleted !');
    }
}
