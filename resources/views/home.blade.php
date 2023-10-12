@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div>
           @can('is-admin')
           <h1 class="btn btn-success m-4">Welcome Admin</h1>
          @elsecan('is-user')
            <h1 class="btn btn-info m-4">Welcome User</h1>
            @endcan
</div>


            </div>
        </div>
    </div>
</div>
@endsection
