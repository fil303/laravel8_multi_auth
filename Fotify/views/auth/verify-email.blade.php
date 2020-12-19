



@if (session('status') == 'verification-link-sent')
            <div>
               A new verification link has been sent to the email address you provided during registration.
            </div>
@endif

<form method="POST" action="{{ route('verification.send') }}">
@csrf

     <div>
          <input name="" type="submit" />
           
        
     </div>
</form>