<!--begin::Form-->
<form class="form w-100"
{{--      action="{{ route('login') }}" method="POST"--}}
      wire:submit.prevent="submit"
>
    @csrf
    <div class="text-center mb-11">
        <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
        <div class="text-gray-500 fw-semibold fs-1">Dashboard {{config('app.name')}}</div>
    </div>
    <div class="pb-5">
        <div>Email     : super_admin@admin.com </div>
        <div>Password  : 123123 </div>
    </div>
    <div class="fv-row mb-8">

        <!--begin::Email-->
        <x-dash.form.input type="text" placeholder="Email Address" name="email" autocomplete="off" class="form-control bg-transparent" label="Email Address" wire:model="email"/>
        <!--end::Email-->
    </div>
    <div class="fv-row mb-3">
        <!--begin::Password-->
        <x-dash.form.input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" label="Password" wire:model="password"/>
        <!--end::Password-->
    </div>
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div></div>
        <!--begin::Link-->
{{--        <a href="#" class="link-primary">Forgot Password ?</a>--}}
        <!--end::Link-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
            <span class="indicator-label" wire:loading.remove>Sign In</span>
            <div wire:loading wire:target="submit">
                Signing in, please wait
                <span class="spinner-border spinner-border-sm text-white ms-1" role="status">
                    <span class="visually-hidden">Loading...</span>
                </span>
            </div>

        </button>
    </div>
    <!--end::Submit button-->
</form>
<!--end::Form-->
