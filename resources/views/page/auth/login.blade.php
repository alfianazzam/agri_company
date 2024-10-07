@extends('layouts.app')

@section('title', 'Login Page')

@section('content')

    <div class="main">
        <section class="module">
            <div class="container">
                <div class="col-sm-5 col-sm-offset-1 mb-sm-40">
                    <h4 class="font-alt">Login</h4>
                    <hr class="divider-w mb-10">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" id="identifier" type="text" name="identifier" placeholder="Email or Username" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-round btn-b">Login</button>
                        </div>
                        <div class="form-group"><a href="">Forgot Password?</a></div>
                        
                            @if(session('success'))
                            <div class="alert alert-success mt-2">
                                {{ session('success') }}
                            </div>
                            @endif

                            @if ($errors->any())
                            <div class="alert alert-danger mt-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection


