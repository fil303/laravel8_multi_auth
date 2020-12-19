<form method="POST" action="/two-factor-challenge">
  @csrf
<label for="recovery_code" value="Recovery Code" >Recovery Code </label>
<br>
 <input type="text" name="recovery_code"  autocomplete="one-time-code" />

<br>
<input type="submit" value="login" name="">

</form>