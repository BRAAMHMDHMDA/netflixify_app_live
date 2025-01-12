<form action="" wire:submit.prevent="submit">

    <!--email-->
    <div class="form-group">
        <x-dash.form.input id="email" name="email" label="Email" wire:model="email"/>
    </div>

    <!--password-->
    <div class="form-group">
        <x-dash.form.input id="password" name="password" label="Password" wire:model="password" type="password"/>
    </div>

    <!--remember me-->
    <div class="form-group">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1" wire:model="remember">
            <label class="custom-control-label" for="customCheck1">Remember Me</label>
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit">
            <span wire:loading.remove>Sign In</span>
            <div wire:loading wire:target="submit">
                Signing in, please wait
                <span class="spinner-border spinner-border-sm text-white ms-1" role="status"></span>
            </div>
        </button>
    </div>

    <p class="text-center">Create new account<a href="{{ route('register') }}"> Register</a></p>

    <hr>
    <a class="btn btn-block btn-primary" style="background:#ea4335;" href="{{ route('auth.socialite.redirect', 'google') }}">Login by Google</a>
    <a class="btn btn-block btn-primary" style="background:#3b5998;" href="{{ route('auth.socialite.redirect', 'facebook') }}">Login by Facebook</a>

</form><!-- end of form -->
