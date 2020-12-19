
  

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

       <br><br><br>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

         
                <label for="email" value="">Email</label><br>

                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus /><br>

                <input type="submit" value="Check" name="">
         

           
        </form>
  

