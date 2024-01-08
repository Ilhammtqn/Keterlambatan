<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Student;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayon = Rayon::all();
        return view('admin.rayons.index', compact('rayon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rayons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);
        
        Rayon::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayon.home')->with('succses', 'Berhasil menambahkan data rayon');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rayon $rayon, $id)
    {
        $rayon = Rayon::find($id);

        return view('admin.rayons.edit', compact('rayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rayon $rayon, $id)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        Rayon::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);


        return redirect()->route('rayon.home')->with('succses', 'Berhasil mengubah data rayon');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rayon $rayon, $id)
    {
        Rayon::where('id', $id)->delete();

        return redirect()->back()->with('succses', 'Berhasil menghapus data!');
    }
}
