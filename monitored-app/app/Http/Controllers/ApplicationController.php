<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::paginate(10);
        return view('admin.applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.applications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'applications' => 'required|array|min:1',
            'applications.*.name' => 'required|string|max:255',
            'applications.*.url' => 'nullable|string',
        ]);

        foreach ($request->applications as $lien) {
            Application::create([
                'name' => $lien['name'],
                'url' => $lien['url']
            ]);
        }

        return redirect()->route('admin.applications.index')
            ->with('message', [
                'title' => 'Succès!',
                'message' => count($request->applications) > 1 ? 'Les applications ont été créés avec succès.' : 'Le lien a été créé avec succès.',
                'type' => 'success'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return redirect()->route('admin.applications.edit', $application);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        return view('admin.applications.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|string' . $application->id,
        ]);

        $application->update([
            'titre' => $request->title,
            'url' => $request->url
        ]);

        return redirect()->route('admin.applications.index')
            ->with('message', [
                'title' => 'Succès!',
                'message' => 'Le lien a été mis à jour avec succès.',
                'type' => 'success'
            ]);
    }
}
