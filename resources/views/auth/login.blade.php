@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 150px 0 100px;">
        <div class="row justify-content-center" style="display:flex; justify-content:center;">
            <div class="col-md-6" style="max-width:400px; width:100%;">
                <div class="card" style="box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-radius: 10px; overflow:hidden;">
                    <div class="card-header"
                        style="background:var(--primary-color); color:white; padding: 15px; text-align:center; font-weight:bold;">
                        Admin Login</div>

                    <div class="card-body" style="padding: 30px;">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3" style="margin-bottom: 15px;">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    required autofocus
                                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="color:red; font-size:0.9em;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3" style="margin-bottom: 20px;">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="color:red; font-size:0.9em;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary"
                                    style="width:100%; padding: 12px; background:var(--primary-color); color:white; border:none; border-radius:5px; cursor:pointer; font-weight:bold;">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection