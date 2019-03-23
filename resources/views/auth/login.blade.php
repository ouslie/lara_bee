@extends('layouts.auth')

@section('content')
<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="navbar-header d-flex">
        <a class="navbar-brand" href="../index.html"> Larabee </a>
    </div>
</nav>
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="blue">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-7 mx-auto">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card card-login">
                                <div class="card-header text-center">
                                    <h4 class="card-title">Login</h4>
                                </div>
                                <div class="card-content">

                                    <h5 class="text-center">Larabee Account</h5>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </div>
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" value="{{ old('email') }}" placeholder="Email" required
                                                autofocus>

                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </div>
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" placeholder="Mot de passe" required>

                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Connexion
                                    </button>
                                    <p>Nouveau sur larabee ?&nbsp;&nbsp;
                                        <a  href="{{ route('register') }}">
                                            <i class="material-icons">person_add</i>Me creer un compte
                                        </a>
                                    </p>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Mot de passe oublié
                                    </a>
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())

                    </script>
                    <a href="http://www.wunder.com">Wunder</a> BootStrap Admin Dashboard
                </p>
            </div>
        </footer>
    </div>
</div>
@endsection
