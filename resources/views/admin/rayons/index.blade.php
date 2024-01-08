@extends('admin.layouts.template')

@section('content')
    <div class="jumbroton py-2 px-1">
        <h4 class="display" style="color: black;">
            Data Rayon
        </h4>
        <p style="color: black;">
            <a class="button_waterpump" style="color: black;" href="/dashboard">Home</a> /
            <a class="button_waterpump" style="color: black;">Data Rayon</a>
        </p>
        <a href="{{ route('rayon.create')}}" class="btn btn-primary">Tambah Rayon</a>
        <br>
    </div>
    @if(Session::get('succses'))
            <div class="alert alert-success"> {{ Session::get('succses') }} </div>
        @endif
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

<div class="table shadow p-1 mb-4 border-0" style="background-color: white">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Rayon</th>
                <th scope="col">Pembimbing Siswa</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($rayon as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['rayon'] }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('rayon.edit', $item['id'] )}}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('rayon.delete', $item['id'])}}" method='POST'>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
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