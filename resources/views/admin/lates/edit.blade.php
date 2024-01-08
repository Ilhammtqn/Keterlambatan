@extends('admin.layouts.template')

@section('content')
<div class="jumbroton py-2 px-1">
    <h4 class="display" style="color: black;">
        Edit Data Keterlambatan
    </h4>
    <p style="color: black;">
        <a class="button_waterpump" style="color: black;" href="/dashboard">Home</a> /
        <a class="button_waterpump" style="color: black;" href="{{ route('late.home') }}">Data Keterlambatan</a> /
        <a class="button_waterpump" style="color: black;">Edit Data Keterlambatan</a>
    </p>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Error!</strong> <br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('late.update', $late['id']) }}" method="POST" class="card p-5 shadow p-1 mb-4 border-0" style="width: 80%">
    @csrf
    @method('PATCH') 
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <select name="student_id" class="form-control form-control-select">
                @foreach(\App\Models\Student::all() as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>        
        </div>
    </div>
    <div class="mb-3 row">
        <label for="date_time_late" class="col-sm-2 col-form-label">Date Time Late</label>
        <div class="col-sm-10">
            <input type="datetime-local" name="date_time_late" class="form-control" placeholder="Date Time Late">                  
        </div>
    </div>
    <div class="mb-3 row">
        <label for="information" class="col-sm-2 col-form-label">Information</label>
        <div class="col-sm-10">
            <textarea class="form-control" style="height:150px" name="information" placeholder="Information"></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="bukti" class="col-sm-2 col-form-label">Bukti</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="bukti" value="upload gambar" placeholder="Bukti">
        </div>
        <img src="{{ asset('/storage/late/' . $late->bukti) }}" class="card-img-top m-3 w-25" alt="...">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>         
@endsection

<style>
    .jumbroton.py-2.px-1 p a {
        text-decoration: none;
    }
</style>