<x-dash-layout>
    <x-slot:breadcrumb>
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Account Settings</h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">My Profile</li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Account Settings</li>
            </ul>
        </div>
    </x-slot:breadcrumb>

        <!--begin::Content container-->

            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{ Auth::user()->image_url }}" alt="image" />
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1 m-auto">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ Auth::user()->name }}</a>
                                        <a href="#">
                                            <i class="ki-duotone ki-verify fs-1 text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>{{ Auth::user()->username }}</a>
                                        {{--                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">--}}
                                        {{--                                            <i class="ki-duotone ki-geolocation fs-4 me-1">--}}
                                        {{--                                                <span class="path1"></span>--}}
                                        {{--                                                <span class="path2"></span>--}}
                                        {{--                                            </i>SF, Bay Area</a>--}}
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            <i class="ki-duotone ki-sms fs-4">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>{{ Auth::user()->email }}</a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Title-->

                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{ route('dashboard.profile.index') }}">Overview</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="{{ route('dashboard.profile.settings') }}">Settings</a>
                        </li>
                        <!--end::Nav item-->

                    </ul>
                    <!--begin::Navs-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Basic Info</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" class="form" action="{{ route('dashboard.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <x-dash.form.image name="image" old="{{ Auth::user()->image_url }}"  />
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <!--begin::Col-->
                                    <div class="">
                                        <x-dash.form.input name="name" value="{{ Auth::user()->name }}" class="form-control form-control-lg form-control-solid"/>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Username</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Username must be unique">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <x-dash.form.input name="username" value="{{ Auth::user()->username }}" class="form-control form-control-lg form-control-solid"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Contact Phone</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <x-dash.form.input type="tel" name="phone_number" value="{{ Auth::user()->phone_number }}" placeholder="Phone number" class="form-control form-control-lg form-control-solid"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2" onclick="window.history.back()">Discard</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->
            <!--begin::Sign-in Method-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Sign-in Method</h3>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_signin_method" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Email Address-->
                        <div class="d-flex flex-wrap align-items-center">
                            <!--begin::Label-->
                            <div id="kt_signin_email">
                                <div class="fs-6 fw-bold mb-1">Email Address</div>
                                <div class="fw-semibold text-gray-600">{{Auth::user()->email}}</div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Edit-->
                            <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                <!--begin::Form-->
                                <form id="kt_signin_change_email" class="form" novalidate="novalidate" action="{{ route('dashboard.profile.update.email') }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row mb-6">
                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <div class="fv-row mb-0">
                                                <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New Email Address</label>
                                                <x-dash.form.input type="email" class="form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="email" value="{{Auth::user()->email}}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-0">
                                                <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
                                                <x-dash.form.input type="password" class="form-control-lg form-control-solid" name="password" id="confirmemailpassword" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary me-2 px-6">Update Email</button>
                                        <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Edit-->
                            <!--begin::Action-->
                            <div id="kt_signin_email_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Change Email</button>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Email Address-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-6"></div>
                        <!--end::Separator-->
                        <!--begin::Password-->
                        <div class="d-flex flex-wrap align-items-center mb-10">
                            <!--begin::Label-->
                            <div id="kt_signin_password">
                                <div class="fs-6 fw-bold mb-1">Password</div>
                                <div class="fw-semibold text-gray-600">************</div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Edit-->
                            <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                <!--begin::Form-->
                                <form id="kt_signin_change_password" class="form" action="{{ route('dashboard.profile.update.password') }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row mb-1">
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                                <x-dash.form.input type="password" class="form-control-lg form-control-solid" name="current_password" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                                <x-dash.form.input type="password" class="form-control-lg form-control-solid" name="new_password" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                                <x-dash.form.input type="password" class="form-control-lg form-control-solid" name="new_password_confirmation" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
                                        <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Edit-->
                            <!--begin::Action-->
                            <div id="kt_signin_password_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Password-->

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Sign-in Method-->

{{--            <!--begin::Notifications-->--}}
{{--            <div class="card mb-5 mb-xl-10">--}}
{{--                <!--begin::Card header-->--}}
{{--                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_notifications" aria-expanded="true" aria-controls="kt_account_notifications">--}}
{{--                    <div class="card-title m-0">--}}
{{--                        <h3 class="fw-bold m-0">Notifications</h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--begin::Card header-->--}}
{{--                <!--begin::Content-->--}}
{{--                <div id="kt_account_settings_notifications" class="collapse show">--}}
{{--                    <!--begin::Form-->--}}
{{--                    <form class="form">--}}
{{--                        <!--begin::Card body-->--}}
{{--                        <div class="card-body border-top px-9 pt-3 pb-4">--}}
{{--                            <!--begin::Table-->--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table table-row-dashed border-gray-300 align-middle gy-6">--}}
{{--                                    <tbody class="fs-6 fw-semibold">--}}
{{--                                    <!--begin::Table row-->--}}
{{--                                    <tr>--}}
{{--                                        <td class="min-w-250px fs-4 fw-bold">Notifications</td>--}}
{{--                                        <td class="w-125px">--}}
{{--                                            <div class="form-check form-check-custom form-check-solid">--}}
{{--                                                <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_email" checked="checked" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=email]" />--}}
{{--                                                <label class="form-check-label ps-2" for="kt_settings_notification_email">Email</label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="w-125px">--}}
{{--                                            <div class="form-check form-check-custom form-check-solid">--}}
{{--                                                <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_phone" checked="checked" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=phone]" />--}}
{{--                                                <label class="form-check-label ps-2" for="kt_settings_notification_phone">Phone</label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <!--begin::Table row-->--}}
{{--                                    <!--begin::Table row-->--}}
{{--                                    <tr>--}}
{{--                                        <td>Billing Updates</td>--}}
{{--                                        <td>--}}
{{--                                            <div class="form-check form-check-custom form-check-solid">--}}
{{--                                                <input class="form-check-input" type="checkbox" value="1" id="billing1" checked="checked" data-kt-settings-notification="email" />--}}
{{--                                                <label class="form-check-label ps-2" for="billing1"></label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <div class="form-check form-check-custom form-check-solid">--}}
{{--                                                <input class="form-check-input" type="checkbox" value="" id="billing2" checked="checked" data-kt-settings-notification="phone" />--}}
{{--                                                <label class="form-check-label ps-2" for="billing2"></label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <!--begin::Table row-->--}}
{{--                                    <!--begin::Table row-->--}}
{{--                                    <tr>--}}
{{--                                        <td>New Team Members</td>--}}
{{--                                        <td>--}}
{{--                                            <div class="form-check form-check-custom form-check-solid">--}}
{{--                                                <input class="form-check-input" type="checkbox" value="" id="team1" checked="checked" data-kt-settings-notification="email" />--}}
{{--                                                <label class="form-check-label ps-2" for="team1"></label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <div class="form-check form-check-custom form-check-solid">--}}
{{--                                                <input class="form-check-input" type="checkbox" value="" id="team2" data-kt-settings-notification="phone" />--}}
{{--                                                <label class="form-check-label ps-2" for="team2"></label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <!--begin::Table row-->--}}
{{--                                    <!--begin::Table row-->--}}
{{--                                    <tr>--}}
{{--                                        <td>Completed Projects</td>--}}
{{--                                        <td>--}}
{{--                                            <div class="form-check form-check-custom form-check-solid">--}}
{{--                                                <input class="form-check-input" type="checkbox" value="" id="project1" data-kt-settings-notification="email" />--}}
{{--                                                <label class="form-check-label ps-2" for="project1"></label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <div class="form-check form-check-custom form-check-solid">--}}
{{--                                                <input class="form-check-input" type="checkbox" value="" id="project2" checked="checked" data-kt-settings-notification="phone" />--}}
{{--                                                <label class="form-check-label ps-2" for="project2"></label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <!--begin::Table row-->--}}
{{--                                    <!--begin::Table row-->--}}
{{--                                    <tr>--}}
{{--                                        <td class="border-bottom-0">Newsletters</td>--}}
{{--                                        <td class="border-bottom-0">--}}
{{--                                            <div class="form-check form-check-custom form-check-solid">--}}
{{--                                                <input class="form-check-input" type="checkbox" value="" id="newsletter1" data-kt-settings-notification="email" />--}}
{{--                                                <label class="form-check-label ps-2" for="newsletter1"></label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="border-bottom-0">--}}
{{--                                            <div class="form-check form-check-custom form-check-solid">--}}
{{--                                                <input class="form-check-input" type="checkbox" value="" id="newsletter2" data-kt-settings-notification="phone" />--}}
{{--                                                <label class="form-check-label ps-2" for="newsletter2"></label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <!--begin::Table row-->--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                            <!--end::Table-->--}}
{{--                        </div>--}}
{{--                        <!--end::Card body-->--}}
{{--                        <!--begin::Card footer-->--}}
{{--                        <div class="card-footer d-flex justify-content-end py-6 px-9">--}}
{{--                            <button class="btn btn-light btn-active-light-primary me-2" onclick="window.history.back()">Discard</button>--}}
{{--                            <button class="btn btn-primary px-6">Save Changes</button>--}}
{{--                        </div>--}}
{{--                        <!--end::Card footer-->--}}
{{--                    </form>--}}
{{--                    <!--end::Form-->--}}
{{--                </div>--}}
{{--                <!--end::Content-->--}}
{{--            </div>--}}
{{--            <!--end::Notifications-->--}}
{{--            <!--begin::Deactivate Account-->--}}
{{--            <div class="card">--}}
{{--                <!--begin::Card header-->--}}
{{--                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">--}}
{{--                    <div class="card-title m-0">--}}
{{--                        <h3 class="fw-bold m-0">Deactivate Account</h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end::Card header-->--}}
{{--                <!--begin::Content-->--}}
{{--                <div id="kt_account_settings_deactivate" class="collapse show">--}}
{{--                    <!--begin::Form-->--}}
{{--                    <form id="kt_account_deactivate_form" class="form">--}}
{{--                        <!--begin::Card body-->--}}
{{--                        <div class="card-body border-top p-9">--}}
{{--                            <!--begin::Notice-->--}}
{{--                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">--}}
{{--                                <!--begin::Icon-->--}}
{{--                                <i class="ki-duotone ki-information fs-2tx text-warning me-4">--}}
{{--                                    <span class="path1"></span>--}}
{{--                                    <span class="path2"></span>--}}
{{--                                    <span class="path3"></span>--}}
{{--                                </i>--}}
{{--                                <!--end::Icon-->--}}
{{--                                <!--begin::Wrapper-->--}}
{{--                                <div class="d-flex flex-stack flex-grow-1">--}}
{{--                                    <!--begin::Content-->--}}
{{--                                    <div class="fw-semibold">--}}
{{--                                        <h4 class="text-gray-900 fw-bold">You Are Deactivating Your Account</h4>--}}
{{--                                        <div class="fs-6 text-gray-700">For extra security, this requires you to confirm your email or phone number when you reset yousignr password.--}}
{{--                                            <br />--}}
{{--                                            <a class="fw-bold" href="#">Learn more</a></div>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Content-->--}}
{{--                                </div>--}}
{{--                                <!--end::Wrapper-->--}}
{{--                            </div>--}}
{{--                            <!--end::Notice-->--}}
{{--                            <!--begin::Form input row-->--}}
{{--                            <div class="form-check form-check-solid fv-row">--}}
{{--                                <input name="deactivate" class="form-check-input" type="checkbox" value="" id="deactivate" />--}}
{{--                                <label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my account deactivation</label>--}}
{{--                            </div>--}}
{{--                            <!--end::Form input row-->--}}
{{--                        </div>--}}
{{--                        <!--end::Card body-->--}}
{{--                        <!--begin::Card footer-->--}}
{{--                        <div class="card-footer d-flex justify-content-end py-6 px-9">--}}
{{--                            <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-danger fw-semibold">Deactivate Account</button>--}}
{{--                        </div>--}}
{{--                        <!--end::Card footer-->--}}
{{--                    </form>--}}
{{--                    <!--end::Form-->--}}
{{--                </div>--}}
{{--                <!--end::Content-->--}}
{{--            </div>--}}
{{--            <!--end::Deactivate Account-->--}}

    @push('scripts')
        <script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
    @endpush

</x-dash-layout>