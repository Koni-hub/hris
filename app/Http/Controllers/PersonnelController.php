<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnels = Personnel::all();
        return Inertia::render('Personnels/Index', [
            'personnels' => $personnels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Personnels/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'surname' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'extension' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'citizenship' => 'nullable|string|max:255',
            'sex' => 'required|in:MALE,FEMALE',
            'civil_status' => 'required|in:SINGLE,MARRIED,WIDOWED,SEPARATED',

            'children' => 'nullable|array',
            'children.*.name' => 'nullable|string|max:255',
            'children.*.date_of_birth' => 'nullable|date',
    
            // Educational background fields
            'elementary_name_school' => 'nullable|string|max:255',
            'elementary_basic_education' => 'nullable|string|max:255',
            'elementary_from_school' => 'nullable|date_format:Y',
            'elementary_to_school' => 'nullable|date_format:Y',
            'elementary_highest_level' => 'nullable|string|max:255',
            'elementary_year_graduate' => 'nullable|string|max:4',
            'elementary_scholarship' => 'nullable|string|max:255',
    
            'secondary_name_school' => 'nullable|string|max:255',
            'secondary_basic_education' => 'nullable|string|max:255',
            'secondary_from_school' => 'nullable|date_format:Y',
            'secondary_to_school' => 'nullable|date_format:Y',
            'secondary_highest_level' => 'nullable|string|max:255',
            'secondary_year_graduate' => 'nullable|string|max:4',
            'secondary_scholarship' => 'nullable|string|max:255',

            'college_education' => 'nullable|array',
            'college_education.*.college_name_school' => 'nullable|string|max:255',
            'college_education.*.college_basic_education' => 'nullable|string|max:255',
            'college_education.*.college_from_school' => 'nullable|date_format:Y',
            'college_education.*.college_to_school' => 'nullable|date_format:Y',
            'college_education.*.college_highest_level' => 'nullable|string|max:255',
            'college_education.*.college_year_graduate' => 'nullable|string|max:4',
            'college_education.*.college_scholarship' => 'nullable|string|max:255',
        ]);
    
        // If validation passes, store the data
        Personnel::create($request->all());
    
        // Redirect back with success message (this will not be used with Inertia.js)
        return redirect()->route('personnels.index')->with('success', 'Personnel created successfully.');
    
        // Inertia response for errors
        return Inertia::render('/personnels/create', [
            'errors' => session('errors') ? session('errors')->getBag('default')->messages() : [],
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Personnel $personnel)
    {
        return Inertia::render('Personnels/Show', [
            'personnel' => $personnel,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnel $personnel)
    {
        return Inertia::render('Personnels/Edit', [
            'personnel' => $personnel,
            'form' => [
                'children' => $personnel->children,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personnel $personnel)
    {
        $request->validate([
            'surname' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'extension' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'citizenship' => 'nullable|string|max:255',
            'sex' => 'required|in:MALE,FEMALE',
            'civil_status' => 'required|in:SINGLE,MARRIED,WIDOWED,SEPARATED',

            'children' => 'nullable|array',
            'children.*.name' => 'nullable|string|max:255',
            'children.*.date_of_birth' => 'nullable|date',
    
            // Educational background fields
            'elementary_name_school' => 'nullable|string|max:255',
            'elementary_basic_education' => 'nullable|string|max:255',
            'elementary_from_school' => 'nullable|date_format:Y',
            'elementary_to_school' => 'nullable|date_format:Y',
            'elementary_highest_level' => 'nullable|string|max:255',
            'elementary_year_graduate' => 'nullable|string|max:4',
            'elementary_scholarship' => 'nullable|string|max:255',
    
            'secondary_name_school' => 'nullable|string|max:255',
            'secondary_basic_education' => 'nullable|string|max:255',
            'secondary_from_school' => 'nullable|date_format:Y',
            'secondary_to_school' => 'nullable|date_format:Y',
            'secondary_highest_level' => 'nullable|string|max:255',
            'secondary_year_graduate' => 'nullable|string|max:4',
            'secondary_scholarship' => 'nullable|string|max:255',
    
            'college_education' => 'nullable|array',
            'college_education.*.college_name_school' => 'nullable|string|max:255',
            'college_education.*.college_basic_education' => 'nullable|string|max:255',
            'college_education.*.college_from_school' => 'nullable|date_format:Y',
            'college_education.*.college_to_school' => 'nullable|date_format:Y',
            'college_education.*.college_highest_level' => 'nullable|string|max:255',
            'college_education.*.college_year_graduate' => 'nullable|string|max:4',
            'college_education.*.college_scholarship' => 'nullable|string|max:255',
        ]);

        $personnel->update($request->all());

        return redirect()->route('personnels.index')->with('success', 'Personnel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Personnel $personnel)
    {
        try {
            $request->validate([
                'password' => ['required', 'current_password'],
            ]);

            $personnel->delete();

            return redirect()->route('personnels.index')
                ->with('message', 'Personnel deleted successfully.');

        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (QueryException $e) {
            Log::error('Database query error during personnel deletion: ' . $e->getMessage());

            return redirect()->back()
                ->withErrors(['error' => 'Database error occurred. Please try again later.'])
                ->withInput();

        } catch (\Exception $e) {
            Log::error('Error during personnel deletion: ' . $e->getMessage());

            return redirect()->back()
                ->withErrors(['error' => 'Failed to delete personnel. Please try again later.'])
                ->withInput();
        }
    }
}