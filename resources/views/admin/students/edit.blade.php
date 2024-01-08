@extends('admin.layouts.template')

@section('content')
<div class="jumbroton py-2 px-1">
    <h4 class="display" style="color: black;">
        Tambah Data Siswa
    </h4>
    <p style="color: black;">
        <a class="button_waterpump" style="color: black;" href="/dashboard">Home</a> /
        <a class="button_waterpump" style="color: black;" href="{{ route('student.home') }}">Data Student</a> /
        <a class="button_waterpump" style="color: black;">Edit Data Student</a>
    </p>
</div>

@if ($errors->any())
<ul class="alert alert-danger p-3">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
    <form action="{{ route('student.update' , $student['id'])}}" method="POST" class="card p-5 shadow p-1 mb-4 border-0" style="width: 80%">
        @csrf
        @method('PATCH')
        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">NIS</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nis" name="nis">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rombel" class="col-sm-2 col-form-label">Rombel</label>
            <div class="col-sm-10">
                <select name="rombel_id" class="form-control form-control-select">
                    @foreach(\App\Models\Rombel::all() as $rombel)
                    <option value="{{ $rombel->id }}">{{ $rombel->rombel }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rombel" class="col-sm-2 col-form-label">Rayon</label>
            <div class="col-sm-10">
                <select name="rayon_id" class="form-control form-control-select">
                    @foreach(\App\Models\Rayon::all() as $rayon)
                    <option value="{{ $rayon->id }}">{{ $rayon->rayon }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
@endsection

<style>
    .jumbroton.py-2.px-1 p a {
        text-decoration: none;
    }
</style>