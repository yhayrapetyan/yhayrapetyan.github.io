<p>Hi {{ $user->name }},</p>

<p>Please click the following link to verify your email:</p>

<p><a href="{{ route('verify.email', ['id' => $user->id, 'token' => $token]) }}">Verify Email</a></p>

<p>If you did not create an account, please ignore this email.</p>
