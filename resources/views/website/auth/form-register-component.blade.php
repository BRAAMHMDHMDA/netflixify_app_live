<form wire:submit.prevent="submit">

    <!--username-->
    <div class="form-group">
        <x-dash.form.input id="name" name="name" label="Name" wire:model="name"/>
    </div>

    <!--email-->
    <div class="form-group">
        <x-dash.form.input id="email" name="email" label="Email" wire:model="email"/>
    </div>

    <!--password-->
    <div class="form-group">
        <x-dash.form.input id="password" name="password" label="Password" wire:model="password" type="password"/>
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit">
            <span wire:loading.remove>Register</span>
            <div wire:loading wire:target="submit">
                registering in, please wait
                <span class="spinner-border spinner-border-sm text-white ms-1" role="status"></span>
            </div>
        </button>
    </div>


    <p class="text-center">Already have an account<a href="{{ route('login') }}"> Login</a></p>

    <hr>
    <a class="btn btn-block btn-primary" style="background:#ea4335;" href="{{ route('auth.socialite.redirect', 'google') }}">Login by Google</a>
    <a class="btn btn-block btn-primary" style="background:#3b5998;" href="{{ route('auth.socialite.redirect', 'facebook') }}">Login by Facebook</a>

</form><!-- end of form -->
