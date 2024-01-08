<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombel = Rombel::all();
        return view('admin.rombels.index', compact('rombel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rombels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required'
        ]);

        Rombel::create([
            'rombel' => $request->rombel
        ]);

        return redirect()->route('rombel.home')->with('succses', 'Berhasil menambahkan data rombel');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rombel $rombel, $id)
    {
        $rombel = Rombel::find($id);

        return view('admin.rombels.edit', compact('rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rombel' => 'required'
        ]);

        Rombel::where('id', $id)->update([
            'rombel' => $request->rombel
        ]);

        return redirect()->route('rombel.home')->with('succses', 'Berhasil mengubah data rombel');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rombel $rombel, $id)
    {
        Rombel::where('id', $id)->delete();

        return redirect()->back()->with('succses', 'Berhasil menghapus data!');
 
    }
}
