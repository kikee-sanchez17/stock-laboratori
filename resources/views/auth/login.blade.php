
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center font-weight-bold">Login</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>

                        @error('message')
                        <p class="alert alert-danger">{{$message}}</p>
                        @enderror

                        <button type="submit" class="btn btn-primary btn-block">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection