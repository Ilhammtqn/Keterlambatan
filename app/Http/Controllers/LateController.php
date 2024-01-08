<?php

namespace App\Http\Controllers;

use App\Exports\LateExport;
use App\Models\Late;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $late = Late::with('student')->get();
        return view('admin.lates.index', compact('late'));
    }

    public function keterlambatan()
    {
        $late = Late::with('student')->get();
        return view('ps.lates.index', compact('late'));
    }

    public function rekap()
    {
        $late = Late::all();
        $student = Student::withCount('late')->get();
        // dd ($student);
        return view('admin.lates.detail', compact('late', 'student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'image|file '
        ]);

        if($request->file('bukti')) {
            $image = $request->file('bukti');
            $destinationPath = 'storage/late/';
            $buktiImage = date('YhmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $buktiImage);
        }

        Late::create([
            'student_id' => $request->student_id,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $buktiImage,
        ]);

        return redirect()->route('late.home')->with('success', 'Berhasil membuat data keterlambatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Late $late, $id)
    {
        $late = Late::where('student_id',$id)->get();
        $student = Student::find($id);

        return view('admin.lates.show', compact('late', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Late $late, $id)
    {
        $late = Late::find($id);

        return view('admin.lates.edit', compact('late'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
        ]);

        Late::where('id', $id)->update([
            'student_id' => $request->student_id,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
        ]);

        return redirect()->route('late.home')->with('succses', 'Berhasil mengubah data keterlambatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Late::where('id', $id)->delete();

        return redirect()->route('late.home')->with('success', 'Berhasil menghapus data siswa');
    }

    public function print($id) 
    {
        $late = Late::where('student_id',$id)->get();
        $student = Student::find($id);
        $rayon = Rayon::find($id);
        $rombel = Rombel::find($id);
        $ps = User::find($id);

        return view('admin.lates.print', compact('late', 'student', 'rayon', 'rombel', 'ps'));
    }

    public function downloadPDF($id)
    {
        $late = Late::find($id)->toArray();
        view()->share('late',$late);

        $student = Student::where('id', $late['student_id'])->first()->toArray();
        view()->share('student',$student);

        $rayon = Rayon::where('id', $student['rayon_id'])->first()->toArray();
        view()->share('rayon',$rayon);
        
        $rombel = Rombel::where('id', $student['rombel_id'])->first()->toArray();
        view()->share('rombel',$rombel);

        $ps = User::where('id', $rayon['user_id'])->first()->toArray();
        view()->share('ps',$ps);

        $pdf = PDF::loadview('lates.download-pdf', $late);

        return $pdf->download('Surat Pernyataan.pdf');
    }

    public function search(Request $request)
    {
      $search = $request->get('search');
      $late = Late::where('date_time_late', $search)->simplePaginate(5);

      return view('admin.lates.home', compact('late'));
    }

    public function exportExcel()
    {
        $file_name = 'data_keterlambatan' . '.xlsx';

        return Excel::download(new LateExport, $file_name);
    }
}
