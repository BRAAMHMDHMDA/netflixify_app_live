@extends('dashboard.auth.layout')

@section('content')
    <!--begin::Aside-->
{{--    <div class="d-flex flex-lg-row-fluid">--}}
{{--        <!--begin::Content-->--}}
{{--        <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">--}}
{{--            <!--begin::Image-->--}}
{{--            <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('assets/media/auth/agency.png') }}" alt="" />--}}
{{--            <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('assets/media/auth/agency-dark.png') }}" alt="" />--}}
{{--            <!--end::Image-->--}}
{{--            <!--begin::Title-->--}}
{{--            <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Fast, Efficient and Productive</h1>--}}
{{--            <!--end::Title-->--}}
{{--            <!--begin::Text-->--}}
{{--            <div class="text-gray-600 fs-base text-center fw-semibold">In this kind of post,--}}
{{--                <a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>introduces a person they’ve interviewed--}}
{{--                <br />and provides some background information about--}}
{{--                <a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a>and their--}}
{{--                <br />work following this is a transcript of the interview.</div>--}}
{{--            <!--end::Text-->--}}
{{--        </div>--}}
{{--        <!--end::Content-->--}}
{{--    </div>--}}
    <!--begin::Aside-->
    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center  p-12 w-100">
        <!--begin::Wrapper-->
        <div class="bg-body d-flex flex-column flex-center rounded-4">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-500px">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                    <!--begin::Form-->
                    @livewire('dashboard.auth.dashboard-login-component')
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Body-->
@endsection
