<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Http\Requests\StoreApprovalRequest;
use App\Http\Requests\UpdateApprovalRequest;
use App\Models\Notification;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StoreApprovalRequest $request)
    {

        $filter = $request->query('filter', 'all');

        $approvals = Approval::with(['loan', 'approver'])
            ->when($filter === 'my_approvals', function ($query) {
                return $query->where('approver_id', auth()->id());
            })
            ->paginate(10);

        return view('approvals.index', compact('approvals', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApprovalRequest $request)
    {
        // Validate the request
        $request->validate([
            'loan_id' => 'nullable|exists:loans,id', // Optional if application_id is provided
            //'application_id' => 'nullable|exists:applications,id', // Optional if loan_id is provided
            //'requester_id' => 'required|exists:users,id',
            'approver_id' => 'required|exists:users,id',
            'comments' => 'nullable',
        ]);

        // Ensure either loan_id or application_id is provided
        if (!$request->loan_id && !$request->application_id) {
            return redirect()->back()->with('error', 'Either loan ID or application ID is required.');
        }

        // Create the approval record
        Approval::create([
            'loan_id' => $request->loan_id,
            //'application_id' => $request->application_id,
            'approver_id' => $request->approver_id,
            //'requester_id' => $request->request_id,
            'status' => 'pending', // Default status
            'comments' => $request->comments,
        ]);
        Notification::create([
            'user_id' => auth()->id(),
            'type' => 'Application Approval',
            'message' => 'Please approve Application for .....',
            'status' => 'sent',
        ]);
        return redirect()->back()->with('success', 'Approval request created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $approval = Approval::with(['loan', 'approver'])->findOrFail($id);
        return response()->json($approval);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Approval $approval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApprovalRequest $request, $id)
    {
        $request->validate([
            'status' => 'sometimes|in:pending,approved,rejected',
            'comments' => 'nullable|string',
        ]);

        $approval = Approval::findOrFail($id);
        $approval->update($request->only(['status', 'comments']));

        return response()->json($approval);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $approval = Approval::findOrFail($id);
        // Delete the approval
        $approval->delete();
        // Redirect to the payments index page with a success message
        return redirect()->route('approvals.index')->with('success', 'Approval deleted successfully.');
    }
        /**
     * Get approvals for a specific loan.
     *
     * @param  int  $loanId
     * @return \Illuminate\Http\Response
     */
    public function getApprovalsByLoan($loanId)
    {
        $approvals = Approval::with('approver')
            ->where('loan_id', $loanId)
            ->paginate(10);

        return response()->json($approvals);
    }

    /**
     * Get approvals by a specific approver.
     *
     * @param  int  $approverId
     * @return \Illuminate\Http\Response
     */
    public function getApprovalsByApprover($approverId)
    {
        $approvals = Approval::with('loan')
            ->where('approver_id', $approverId)
            ->paginate(10);

        return response()->json($approvals);
    }
}
