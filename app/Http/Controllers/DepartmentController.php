<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DepartmentController extends Controller
{
    private $apiUrl = 'http://127.0.0.1:8000/api/departments';

    public function index()
    {
        $response = Http::get($this->apiUrl);
        $departments = $response->json();

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $response = Http::post($this->apiUrl, $request->all());

        if ($response->successful()) {
            return redirect()->route('departments.index')->with('success', 'Department created successfully.');
        }

        return back()->withErrors('Failed to create department.');
    }

    public function edit($id)
    {
        $response = Http::get("{$this->apiUrl}/{$id}");
        $department = $response->json();

        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::put("{$this->apiUrl}/{$id}", $request->all());

        if ($response->successful()) {
            return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
        }

        return back()->withErrors('Failed to update department.');
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
        }

        return back()->withErrors('Failed to delete department.');
    }
}
