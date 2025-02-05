<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyCRUDController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Save data to database
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        // Redirect with success message
        return redirect()->route('companies.create')->with('status', 'Company created successfully!');
    }

    public function create()
    {
        return view('companies.create');
    }

}
