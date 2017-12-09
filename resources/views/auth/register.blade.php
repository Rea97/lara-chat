@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight is-dark is-bold">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column is-4 is-offset-4">
                        <h1 class="title">
                            Join us!
                        </h1>
                        <div class="box">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <div class="field">
                                    <label class="label">Username</label>
                                    <p class="control">
                                        <input id="name"
                                               type="text"
                                               class="input {{ $errors->has('name') ? 'is-danger' : '' }}"
                                               name="name"
                                               value="{{ old('name') }}"
                                               placeholder="jhonsmith"
                                               required
                                               autofocus>
                                        @if($errors->has('name'))
                                            <span class="input-error">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                    </p>
                                </div>
                                <div class="field">
                                    <label class="label">Email</label>
                                    <p class="control">
                                        <input id="email"
                                               type="email"
                                               class="input {{ $errors->has('email') ? 'is-danger' : '' }}"
                                               name="email"
                                               value="{{ old('email') }}"
                                               placeholder="jsmith@example.org"
                                               required>
                                        @if($errors->has('email'))
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
                                               class="input {{ $errors->has('password') ? 'is-danger' : '' }}"
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
                                    <label class="label">Password confirmation</label>
                                    <p class="control">
                                        <input id="password-confirm"
                                               type="password"
                                               class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}"
                                               name="password_confirmation"
                                               placeholder="●●●●●●●"
                                               required>
                                        @if($errors->has('password_confirmation'))
                                            <span class="input-error">
                                                {{ $errors->first('password_confirmation') }}
                                            </span>
                                        @endif
                                    </p>
                                </div>
                                <hr>
                                <p class="control">
                                    <button class="button is-primary">Sign up</button>

                                </p>
                            </form>
                        </div>
                        <p class="has-text-centered">
                            <a href="{{ route('login') }}">Sign in</a>
                            |
                            <a href="#">Help</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection