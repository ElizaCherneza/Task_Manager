@extends('layouts.app')

@section('welcome')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('---') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Добро пожаловать, ') }}{{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
