


<form action="{{ route('password.update') }}" method="post">
	
	@csrf
	<input type="hidden" name="token" value="{{ $request->route('token') }}">


	<input type="hidden" name="email" value="{{ $request->email }}" required autofocus />


	<label>new password</label><br>
	<input type="password" name="password"><br>


	<label>confrom password</label><br>
	<input type="password" name="password_confirmation"><br>

	<input type="submit" value="Save" name="">
</form>