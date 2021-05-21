<x-app-layout>
<div class="login"> 
        <h1>{{__('Login')}}</h1>
        <form method="POST" class="loginForm" action="{{ route('register') }}">
            @csrf
            <label for="name">
                <span>{{__('Name')}}:</span>
                <input type="text" name="name" id="name" size="40" value="{{old('name')}}" required autofocus />
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </label>
            <label for="email">
                <span>{{__('Email')}}:</span>
                <input type="text" name="email" id="email" size="40" value="{{old('email')}}" required autofocus />
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
            <label for="password_confirmation">
                <span>{{__('Confirm Password')}}:</span>
                <input type="text" name="password_confirmation" id="password_confirmation" required autocomplete="current-password" size="40" />
            </label>
            <input type="submit" value="Register" />
        </form>
        <ul>
            @if (Route::has('password.request'))
                <li><a href="{{ route('password.request') }}">{{__('Forgot Password?')}}</a></li>
            @endif
            <li><a href="{{ route('login') }}">{{__('Login')}}</a></li>
            <li><a href="{{ route('login') }}">{{__('Administrator Login')}}</a></li>
        </ul>
    </div>
</x-app-layout>
