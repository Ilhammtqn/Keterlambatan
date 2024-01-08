@extends('admin.layouts.template')

@section('content')
<div class="container">
    <div class="jumbroton py-2 px-1">
        <h4 class="display" style="color: black;">
            Detail Data Keterlambatan
        </h4>
        <p style="color: black;">
            <a class="button_waterpump" style="color: black;" href="/dashboard">Home</a> /
            <a class="button_waterpump" style="color: black;" href="{{ route('late.home') }}">Data Keterlambatan</a> /
            <a class="button_waterpump" style="color: black;">Detail Data Keterlambatan</a>
        </p>
        <hr>    
        <h4 style="float: left">{{$student->name}}</h4> 
        <h5 style="float: right">{{$student->nis}} | {{$student->rombel->rombel}} | {{$student->rayon->rayon}}</h5>
        <br>
        <hr> 
    </div>
    <div class="row">
        @php $no = 1; @endphp
        @foreach ($late as $item)
        <div class="card m-3 shadow p-1 mb-5 border-0" style="width: 20rem; height:15rem;">
            <div class="card-body">
                <h4 class="card-title">Keterlambatan ke-{{ $no++ }}</h4>
                <div class="detail ">
                    <b><p class="card-subtitle text-body-secondary mt-3">{{ $item['date_time_late'] }}</p></b>
                    <p class="card-text" style="color: blue;">{{ $item['information'] }}</p>
                    @if ($item->bukti)
                    <img class="card-img-top" src="{{ asset('/storage/late/' . $item->bukti) }}" alt="Card image cap">
                    @else
                    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg" alt="Card image cap">
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

<style>
    .row img {
        width: 150px;
        height: 90px;
        display: flex;
        border-bottom-left-radius: var(--bs-card-inner-border-radius);
        border-bottom-right-radius: var(--bs-card-inner-border-radius);
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .jumbroton.py-2.px-1 p a {
        text-decoration: none;
    }
</style>