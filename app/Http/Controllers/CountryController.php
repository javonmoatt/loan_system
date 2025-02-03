<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::orderBy('name')->paginate(10);
        return view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        // Validate the request
        $validator = $request->validate( [
            'name' => 'required|string|max:100|unique:countries',
            'code' => 'required|string|size:2|unique:countries',
            'phone_code' => 'required|string|max:5',
            'currency' => 'required|string|max:50',
            'currency_symbol' => 'required|string|max:5',
            'region' => 'nullable|string|max:50',
            'subregion' => 'nullable|string|max:50',
        ]);

        // If validation fails, redirect back with errors
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // Create the country
        Country::create($request->all());

        return redirect()->route('countries.index')
            ->with('success', 'Country created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return view('countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        // Validate the request
        $validator = $request->validate( [
            'name' => 'required|string|max:100|unique:countries,name,' . $country->id,
            'code' => 'required|string|size:2|unique:countries,code,' . $country->id,
            'phone_code' => 'required|string|max:5',
            'currency' => 'required|string|max:50',
            'currency_symbol' => 'required|string|max:5',
            'region' => 'nullable|string|max:50',
            'subregion' => 'nullable|string|max:50',
        ]);

        // If validation fails, redirect back with errors
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // Update the country
        $country->update($request->all());

        return redirect()->route('countries.index')->with('success', 'Country updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        // Delete the country
        $country->delete();
        return redirect()->route('countries.index')->with('success', 'Country deleted successfully.');
    }

        /**
     * Search for countries based on the provided query.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Perform the search query
        $countries = Country::where('name', 'like', "%{$search}%")
            ->orWhere('code', 'like', "%{$search}%")
            ->orWhere('phone_code', 'like', "%{$search}%")
            ->orWhere('currency', 'like', "%{$search}%")
            ->orWhere('region', 'like', "%{$search}%")
            ->orWhere('subregion', 'like', "%{$search}%")
            ->paginate(10);

        return view('countries.index', compact('countries'));
    }
}
