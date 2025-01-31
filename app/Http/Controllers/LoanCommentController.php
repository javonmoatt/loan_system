<?php

namespace App\Http\Controllers;

use App\Models\LoanComment;
use App\Http\Requests\StoreLoanCommentRequest;
use App\Http\Requests\UpdateLoanCommentRequest;

class LoanCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loanComments = LoanComment::all();
        return view('loan_comments.index',compact('loanComments'));
        //return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // // Validate the request
        // $validatedData = $request->validate([
        //     'loan_id' => 'required|exists:loans,id',
        //     'user_id' => 'required|exists:users,id',
        //     'comment' => 'required|string',
        // ]);

        // // Create the comment
        // $loanComment = LoanComment::create($validatedData);

        // // Return the created comment with a 201 status code
        return view('loan_comment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanCommentRequest $request)
    {
        $validatedData = $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'user_id' => 'required|exists:users,id',
            'comment' => 'required|string',
        ]);

        $loanComment = LoanComment::create($validatedData);
        return response()->json($loanComment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanComment $loanComment)
    {
        $loanComment = LoanComment::with(['loan', 'user'])->findOrFail($loanComment);
        return response()->json($loanComment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanComment $loanComment)
    {
        // // Find the comment or fail
        // $loanComment = LoanComment::findOrFail($id);

        // // Validate the request
        // $validatedData = $request->validate([
        //     'comment' => 'required|string', // Only allow the comment text to be updated
        // ]);

        // // Update the comment
        // $loanComment->update(['comment' => $validatedData['comment']]);

        // // Return the updated comment
        // return response()->json($loanComment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanCommentRequest $request, LoanComment $loanComment)
    {
        $loanComment = LoanComment::findOrFail($loanComment);

        $validatedData = $request->validate([
            'loan_id' => 'sometimes|required|exists:loans,id',
            'user_id' => 'sometimes|required|exists:users,id',
            'comment' => 'sometimes|required|string',
        ]);

        $loanComment->update($validatedData);
        return response()->json($loanComment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanComment $loanComment)
    {
        $loanComment = LoanComment::findOrFail($loanComment);
        $loanComment->delete();
        return response()->json(null, 204);
    }
}
