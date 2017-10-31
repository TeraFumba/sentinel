
<h1>Hello</h1>

<p> Please Click the following link to Activate your Account

    <a href="{{env('APP_URL')}}/activate/{{$user->email}}/{{$code}}">Activate Account</a>
</p>