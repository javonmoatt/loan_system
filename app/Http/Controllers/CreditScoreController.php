<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CreditScore;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCreditScoreRequest;
use App\Http\Requests\UpdateCreditScoreRequest;

class CreditScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creditScores = CreditScore::with('customer')->get();
        return response()->json($creditScores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditScoreRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|exists:users,id',
            'score' => 'required|integer|min:300|max:850',
            'source' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $creditScore = CreditScore::create($request->all());

        return response()->json($creditScore, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CreditScore $creditScore)
    {
        $creditScore = CreditScore::with('customer')->find($creditScore->id);

        if (!$creditScore) {
            return response()->json(['message' => 'Credit score not found'], 404);
        }

        return response()->json($creditScore);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CreditScore $creditScore)
    {
        $creditScore = CreditScore::findOrFail($creditScore);
        $customers = Customer::all(); // Assuming customers are stored in the `users` table
        return view('credit_scores.edit', compact('creditScore', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreditScoreRequest $request, CreditScore $creditScore)
    {
        $creditScore = CreditScore::find($creditScore->id);

        if (!$creditScore) {
            return response()->json(['message' => 'Credit score not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'customer_id' => 'sometimes|required|exists:users,id',
            'score' => 'sometimes|required|integer|min:300|max:850',
            'source' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $creditScore->update($request->all());

        return response()->json($creditScore);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreditScore $creditScore)
    {
        $creditScore = CreditScore::find($creditScore->id);

        if (!$creditScore) {
            return response()->json(['message' => 'Credit score not found'], 404);
        }

        $creditScore->delete();

        return response()->json(['message' => 'Credit score deleted successfully']);
    }
}
