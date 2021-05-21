<x-app-layout>
    <div class="login"> 
        <h1>{{__('Login')}}</h1>
        <form method="POST" class="loginForm" action="{{ route('login') }}">
            @csrf
            <label for="login">
                <span>{{__('Login')}}:</span>
                <input type="text" name="email" id="login" size="40" value="{{old('email')}}" required autofocus />
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </label>
            <label for="password">
                <span>{{__('Password')}}:</span>
                <input type="text" name="password" id="password" required autocomplete="current-password" size="40" />
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </label>
            <label for="rememberme">
                <span>{{__('Remember me')}}:</span>
                <input type="checkbox" name="remember" id="rememberme" />
            </label>
            <input type="submit" value="Login" />
        </form>
        <ul>
            @if (Route::has('password.request'))
                <li><a href="{{ route('password.request') }}">{{__('Forgot Password?')}}</a></li>
            @endif
            <li><a href="{{ route('register') }}">{{__('Create Account')}}</a></li>
            <li><a href="{{ route('login') }}">{{__('Administrator Login')}}</a></li>
        </ul>
    </div>
</x-app-layout>