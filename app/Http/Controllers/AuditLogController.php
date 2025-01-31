<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Customer;
use App\Http\Requests\StoreAuditLogRequest;
use App\Http\Requests\UpdateAuditLogRequest;

class AuditLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auditLogs = AuditLog::with('customer')->latest()->paginate(10);
        return view('audit_logs.index', compact('auditLogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('audit_logs.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuditLogRequest $request)
    {
        $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'action' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ip_address' => 'required|ip',
        ]);

        AuditLog::create($request->all());

        return redirect()->route('audit_logs.index')
                         ->with('success', 'Audit log created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AuditLog $auditLog)
    {
        return view('audit_logs.show', compact('auditLog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuditLog $auditLog)
    {
        $customers = Customer::all();
        return view('audit_logs.edit', compact('auditLog', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuditLogRequest $request, AuditLog $auditLog)
    {
        $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'action' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ip_address' => 'required|ip',
        ]);

        $auditLog->update($request->all());

        return redirect()->route('audit_logs.index')
                         ->with('success', 'Audit log updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuditLog $auditLog)
    {
        $auditLog->delete();

        return redirect()->route('audit_logs.index')
                         ->with('success', 'Audit log deleted successfully.');
    }
}
