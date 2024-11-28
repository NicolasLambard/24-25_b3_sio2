<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;



class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $roles = Role::all();
        return view('roles.index', compact('roles'));
      }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'label' => 'required',
      ]);
      Role::create($request->all());
      return redirect()->route('roles.index')
        ->with('success', 'Post created successfully.');
    }

    public function create()
    {
        return view('roles.create');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find($id);

        return view('roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::find($id);

        return view('roles.edit', compact('role'));
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'label' => 'required|max:255',
        ]);

        $role = Role::find($id);
        $role->update($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Post updated successfully.');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $role = Role::find($id);
        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Post deleted successfully');
    }
}
