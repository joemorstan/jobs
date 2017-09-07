<h1>Hello, {{ $user->first_name }}</h1>
<p>
    Please click the following link to activate your account:
    <a href="{{ env('APP_URL') }}/activate/{{ $user->email }}/{{ $code }}">Activate account</a>
</p>