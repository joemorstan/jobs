<h1>Hello, {{ $user->first_name }}</h1>
<p>
    Please click the following link to reset your password:
    <a href="{{ env('APP_URL') }}/reset/{{ $user->email }}/{{ $code }}">Click here</a>
</p>