@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight is-dark is-bold">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column is-4 is-offset-4">
                        <h1 class="title">
                            Login
                        </h1>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {!! csrf_field() !!}
                            <div class="box">
                                <div class="field">
                                    <label class="label">
                                        Email
                                    </label>
                                    <p class="control">
                                        <input id="email"
                                               type="email"
                                               class="input {{ $errors->has('email') ? 'is-danger' : '' }}"
                                               name="email"
                                               value="{{ old('email') }}"
                                               placeholder="jhon@example.org"
                                               required
                                               autofocus>
                                        @if ($errors->has('email'))
                                            <span class="input-error">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </p>
                                </div>
                                <div class="field">
                                    <label class="label">Password</label>
                                    <p class="control">
                                        <input id="password"
                                               type="password"
                                               class="input {{ $errors->has('password') ? ' is-danger' : '' }}"
                                               name="password"
                                               placeholder="●●●●●●●"
                                               required>
                                        @if($errors->has('password'))
                                            <span class="input-error">
                                                {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control" style="color: #0a0a0a">
                                        <label class="checkbox">
                                            <input type="checkbox"
                                                   name="remember"
                                                   class="checkbox"
                                                   {{ old('remember') ? 'checked' : '' }}>
                                            Remember me
                                        </label>
                                    </p>
                                </div>
                                <hr>
                                <p class="control">
                                    <button class="button is-primary">
                                        Sign in!
                                    </button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection