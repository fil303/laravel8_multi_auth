login successful

<br><br><br>

<form action="{{ route('logout') }}" method="post">

	@csrf
	<input type="submit" value="log out" name="">
	
</form>

<br><br><br><br>


<form action="{{ route('user-password.update') }}" method="post">
	@method('put')
	@csrf
	


	<label>old password</label><br>
	<input type="password" name="current_password"><br>


	<label>new password</label><br>
	<input type="password" name="password"><br>


	<label>confrom password</label><br>
	<input type="password" name="password_confirmation"><br>

	<input type="submit" value="Save" name="">
</form>
<br><br><br>

@if(Auth::User()->email_verified_at)

@else
<a href="{{route('verification.notice')}}">Email Verify</a>

@endif


<br><br><br><br>



@if( Auth::User()->two_factor_secret )

<a href="{{url('/user/two-factor-qr-code')}}">QR Code</a>
<br><br>
<a href="{{url('/user/two-factor-recovery-codes')}}">Recovery Code</a>
<br><br>


<form action="{{route('2Auth')}}" method="post">
	@method('DELETE')
	@csrf

	<input type="submit" value="2Auth Disable" name="">
	

</form>


@else

<form action="{{route('2Auth')}}" method="post">
	@csrf

	<input type="submit" value="2Auth Enable" name="">
	

</form>
@endif




@if (session('status') == 'two-factor-authentication-enabled')
    <div class="mb-4 font-medium text-sm text-green-600">
        Two factor authentication has been enabled.
    </div>

@endif

<br><br><br><br>

<br><br><br><br>
