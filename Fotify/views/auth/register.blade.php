




<form action="{{ route('register') }}" method="post">
	@csrf 

	<label>Name</label><br>
	<input type="text" name="name"><br>

	<label>Email</label><br>
	<input type="email" name="email"><br>

	<label>Password</label><br>
	<input type="password" name="password"><br>

	<label>Confrom Password</label><br>
	<input type="password" name="password_confirmation"><br>

	<input type="submit" name="" value="Register">
</form>