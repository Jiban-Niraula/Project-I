@extends('layouts.inc.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
<<<<<<< HEAD
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                        
                    @else
                    <div class="alert alert-success" role="alert">
                        {{ __('You are logged in!') }}
                   
                    @endif

                   
=======
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
