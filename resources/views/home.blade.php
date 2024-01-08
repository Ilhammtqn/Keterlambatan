@extends('admin.layouts.template')

@section('content')
    @if (Session::get('alreadyAccess'))
        <div class="alert alert-danger">{{ Session::get('alreadyAccess') }}</div>
    @endif
    <div class="jumbroton py-2 px-3">
        <h4 class="display" style="color: black;">
            Dashboard
        </h4>
        <p style="color: black;">Home / Dashboard</p>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col">
              <div class="card h-100 shadow p-1 mb-4 border-0">
                <div class="card-body">
                  <h5 class="card-title">Peserta Didik</h5>
                  <p class="card-text" style="margin-top: 15%; font-size: 1.5rem;">
                    <i class="fi fi-sr-user" style="margin-right:20px;"></i>
                    {{ App\Models\Student::count() }}
                  </p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 shadow p-1 mb-4 border-0">
                <div class="card-body">
                  <h5 class="card-title">Administrator</h5>
                  <p class="card-text" style="margin-top: 15%; font-size: 1.5rem;">
                    <i class="fi fi-sr-user" style="margin-right:20px;"></i>
                    {{ App\Models\User::where('role', '=', 'admin')->count() }}
                  </p>                
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 shadow p-1 mb-4 border-0">
                <div class="card-body">
                  <h5 class="card-title">Pembimbing Siswa</h5>
                  <p class="card-text" style="margin-top: 15%; font-size: 1.5rem;">
                    <i class="fi fi-sr-user" style="margin-right:20px;"></i>
                    {{ App\Models\User::where('role', '=', 'ps')->count() }}
                  </p>                
                </div>
              </div>
            </div>
        </div>
        <br>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col">
              <div class="card h-100 shadow p-1 mb-4 border-0">
                <div class="card-body">
                  <h5 class="card-title">Rombel</h5>
                  <p class="card-text" style="margin-top: 15%; font-size: 1.5rem;">
                    <i class="fi fi-br-bookmark" style="margin-right:20px;"></i> 
                    {{ App\Models\Rombel::count() }}
                  </p>                
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 shadow p-1 mb-4 border-0">
                <div class="card-body">
                  <h5 class="card-title">Rayon</h5>
                  <p class="card-text" style="margin-top: 15%; font-size: 1.5rem;">
                    <i class="fi fi-br-bookmark" style="margin-right:20px;"></i> 
                    {{ App\Models\Rayon::count() }} 
                  </p>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .jumbroton.py-2.px-3 h4 p{
        color: black;
    }
</style>