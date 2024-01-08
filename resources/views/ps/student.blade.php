@extends('layouts.template')

@section('content')
    <div class="jumbroton py-2 px-1">
        <h4 class="display" style="color: black;">
            Data Siswa
        </h4>
        <p style="color: black;">
            <a class="button_waterpump" style="color: black;" href="/dashboard">Home</a> /
            <a class="button_waterpump" style="color: black;">Data Student</a>
        </p>
        <br>
    </div>
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif
    <div class="table shadow p-1 mb-4 border-0" style="background-color: white">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Name</th>
                <th scope="col">Rombel</th>
                <th scope="col">Rayon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $i => $students)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $students->nis }}</td>
                <td>{{ $students->name }}</td>
                <td>{{ $students->rombel->rombel }}</td>
                <td>{{ $students->rayon->rayon }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection

<style>
    .jumbroton.py-2.px-1 p a {
        text-decoration: none;
    }
</style>