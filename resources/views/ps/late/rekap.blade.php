@extends('layouts.template')

@section('content')
    <div class="jumbroton py-2 px-1">
        <h4 class="display" style="color: black;">
            Data Keterlambatan
        </h4>
        <p style="color: black;">
            <a class="button_waterpump" style="color: black;" href="/dashboard">Home</a> /
            <a class="button_waterpump" style="color: black;" href="{{ route('late.home') }}">Data Keterlambatan</a>
        </p>
        <a href="#" class="btn btn-info" style="color: white">Export Data Keterlambatan</a>
        <br>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>    
    @endif
    <div class="table shadow p-1 mb-4 border-0" style="background-color: white;">
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('late.home') }}">Keseluruhan Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('late.rekap')}}">Rekapitulasi Data</a>
            </li>
          </ul>
          <br>
        <table class="table"> 
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah keterlambatan</th>
                    <th scope="col">Detail</th>
                    <th scope="col" width="280px">Surat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $i => $lates)
                {{-- {{ dd($lates)}} --}}
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ isset($lates['nis']) ? $lates['nis'] : '????'}}</td>
                    <td>{{ isset($lates['name']) ? $lates['name'] : 'N/A' }}</td>
                    <td>{{ $lates['late_count'] }}</td>
                    <td><a href="{{ route('late.show', ['student_id' => $lates->id]) }}">lihat</a></td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('late.print',  $lates['id']) }}">Cetak surat pernyataan</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<style>
    .btn {
        border: none;
        background-color: inherit;
        padding: 14px 28px;
        font-size: 16px;
        cursor: pointer;
        display: inline-block;
    }

    .jumbroton.py-2.px-1 p a {
        text-decoration: none;
    }
</style>