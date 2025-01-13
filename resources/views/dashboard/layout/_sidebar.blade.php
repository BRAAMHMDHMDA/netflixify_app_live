@php use Illuminate\Http\Request; @endphp
<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6 mb-2" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{ route('dashboard.home') }}">
            @if(config('app.logo_name'))
                <img alt="Logo" src="{{ config('app.logo_name') }}" class="h-25px app-sidebar-logo-default" />
                <img alt="Logo" src="{{ config('app.logo') }}" class="h-20px app-sidebar-logo-minimize" />
            @else
                <h1 class="text-white app-sidebar-logo-default fs-3x ls-3 pt-3" style="font-family: 'Rufina'">Netflix<span class="text-primary">ify</span></h1>
                <p class="text-white app-sidebar-logo-minimize" style="font-family: 'Rufina'">Nt<span class="text-primary">flx</span></p>
            @endif

{{--            <img alt="Logo" src="{{ asset('assets/media/logos/default-dark.svg') }}" class="h-25px app-sidebar-logo-default" />--}}
{{--            <img alt="Logo" src="{{ asset('assets/media/logos/default-small.svg') }}" class="h-20px app-sidebar-logo-minimize" />--}}
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <!--begin::Scroll wrapper-->
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                <!--begin::Menu-->
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                     <!--begin:Menu Home item-->
                    <div class="menu-item">
                        <!--begin:Home link-->
                        <a class="menu-link @if(Route::is('dashboard.home')) active @endif" href="{{ route('dashboard.home') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-home fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Home</span>
                        </a>
                        <!--end:Home link-->
                    </div>
                    <!--end:Menu Home item-->

                    <!--begin:Menu Categories item-->
                    @can('category-list')
                        <div class="menu-item">
                        <a class="menu-link @if(Route::is('dashboard.categories.*')) active @endif" href="{{ route('dashboard.categories.index') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-category fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Categories</span>
                        </a>
                    </div>
                    @endcan

                    <!--end:Menu Categories item-->

                    <!--begin:Menu movies item-->
                    @can('movie-list')
                        <div class="menu-item">
                            <a class="menu-link @if(Route::is('dashboard.movies.*')) active @endif" href="{{ route('dashboard.movies.index') }}">
                            <span class="menu-icon">
{{--                                <i class="ki-duotone ki-to-right"></i>--}}
                                <i class="ki-duotone ki-google-play fs-1">
                                 <span class="path1"></span>
                                 <span class="path2"></span>
                                </i>
                            </span>
                                <span class="menu-title">Movies</span>
                            </a>
                        </div>
                    @endcan
                    <!--end:Menu movies item-->

                    <!--begin:Menu Admins item-->
                    @can('role-list','admin-list')
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-gear fs-1">
                                 <span class="path1"></span>
                                 <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Admins Management</span>
                            <span class="menu-arrow"></span>
                        </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('admin-list')
                                    <div class="menu-item ">
                                        <a class="menu-link
                                        @if(Route::is('dashboard.admins.*')) active @endif" href="{{ route('dashboard.admins.index') }}"
                                        >
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                            <span class="menu-title">Admins List</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('role-list')
                                    <div class="menu-item">
                                        <a class="menu-link
                                            @if(Route::is('dashboard.roles.*')) active @endif" href="{{ route('dashboard.roles.index') }}"
                                                >
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Roles</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                            <!--end:Menu sub-->
                        </div>
                    @endcan

                    <!--end:Menu Admins item-->
                    <!--begin:Menu Users item-->
                    @can('user-list')
                        <div class="menu-item">
                            <a class="menu-link @if(Route::is('dashboard.users.*')) active @endif" href="{{ route('dashboard.users.index') }}">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-profile-user fs-1">
                                 <span class="path1"></span>
                                 <span class="path2"></span>
                                     <span class="path3"></span>
                                    <span class="path4"></span>

                                </i>
                            </span>
                                <span class="menu-title">Users Management</span>
                            </a>
                        </div>
                    @endcan
                    <!--end:Menu Users item-->

                    <!--begin:Menu item-->
                    @can('settings-list')
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-setting-3 fs-1">
                                 <span class="path1"></span>
                                 <span class="path2"></span>
                                 <span class="path3"></span>
                                 <span class="path4"></span>
                                 <span class="path5"></span>
                                </i>
                            </span>
                            <span class="menu-title">Settings</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            @foreach (Config::get("settings") as $key => $value)
                                <div class="menu-item ">
                                    <a class="menu-link @if(\Request::getRequestUri()==="/dashboard/settings/$key") active @endif" href="{{ route('dashboard.settings.index', $key) }}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">{{$value['name_menu']}}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    @endcan
                    <!--end:Menu item-->

                </div>
                <!--end::Menu-->
            </div>
            <!--end::Scroll wrapper-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    @can('settings-list')
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="{{ route('dashboard.settings.index') }}" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" data-bs-original-title="200+ in-house components and 3rd-party plugins" data-kt-initialized="1">
            <span class="menu-icon">
                                <i class="ki-duotone ki-gear fs-1 me-2">
                                 <span class="path1"></span>
                                 <span class="path2"></span>
                                </i>
                            </span>
            <span class="menu-title">General Settings</span>
        </a>
    </div>
    @endcan
</div>
<!--end::Sidebar-->
