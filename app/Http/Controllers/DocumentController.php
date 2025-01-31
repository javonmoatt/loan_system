<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Customer;
use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::with(['loan', 'customer'])->paginate(10);
        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loans = Loan::all();
        $customers = Customer::all();
        return view('documents.create', compact('loans', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreDocumentRequest $request)
    // {
    //     $request->validate([
    //         'loan_id' => 'nullable|exists:loans,id',
    //         'customer_id' => 'nullable|exists:customers,id',
    //         'document_type' => 'required|string|max:255',
    //         'file_path' => 'required|string|max:255',
    //     ]);

    //     // Handle the file upload
    //     if ($request->hasFile('file_file')) {
    //         //$file = $request->file('file');
    //         $path = $request->file('documents')->store('public'); // Store in the 'public' disk under 'documents' directory
    //     }
    //     dd($request->all());

    //     //Document::create($request->all());
    //     Document::create([
    //         'loan_id' => $request->loan_id,
    //         'customer_id' => $request->customer_id,
    //         'document_type' => $request->document_type,
    //         'file_path' => $path,
    //     ]);

    //     return redirect()->route('documents.index')->with('success', 'Document created successfully.');
    // }

    public function store(StoreDocumentRequest $request)
    {
        // Validate the request
        $request->validate([
            'loan_id' => 'nullable|exists:loans,id',
            'customer_id' => 'nullable|exists:customers,id',
            'document_type' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:pdf,jpeg,png,doc,docx|max:10240', // Validate file input
        ]);

        // Handle the file upload
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $path = $file->store('documents', 'public'); // Store in the 'public' disk under 'documents' directory
        } else {
            return redirect()->back()->with('error', 'File upload failed. Please try again.');
        }

        if( $request->loan_id === null){
            $request->loan_id = $request->customer_id;
        }

        // Create a new Document record
        Document::create([
            'loan_id' => $request->loan_id,
            'customer_id' => $request->customer_id,
            'document_type' => $request->document_type,
            'file_path' => $path, // Use the stored file path
        ]);

        return redirect()->route('documents.index')->with('success', 'Document created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $loans = Loan::all();
        $customers = Customer::all();
        return view('documents.edit', compact('document', 'loans', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $request->validate([
            'loan_id' => 'nullable|exists:loans,id',
            'customer_id' => 'nullable|exists:customers,id',
            'document_type' => 'required|string|max:255',
            'file_path' => 'required|string|max:255',
        ]);

        $document->update($request->all());

        return redirect()->route('documents.index')
                         ->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('documents.index')
                         ->with('success', 'Document deleted successfully.');
    }
}
