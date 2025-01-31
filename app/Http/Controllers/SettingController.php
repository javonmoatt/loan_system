<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the settings from the database
        $settings = Setting::first();

        // If no settings exist, create a default entry
        // if (!$settings) {
        //     $settings = Setting::create([
        //         'auto_approval' => false,
        //         'interest_rate_type' => 'fixed',
        //         'loan_term' => 'medium_term',
        //         'required_documents' => json_encode(['id_proof', 'address_proof']),
        //     ]);
        // }
        $settings = ([
            'auto_approval' => false,
            'interest_rate_type' => 'fixed',
            'loan_term' => 'medium_term',
            'required_documents' => json_encode(['id_proof', 'address_proof']),
        ]);

        // Pass the settings to the view
        return view('settings.index', compact('settings'));
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
    public function store(StoreSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
