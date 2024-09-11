<!-- Topbar Start -->
<header class="app-header flex items-center px-4 gap-3.5" wire:ignore>
    @if(!Request::routeIs('general.select'))
        <!-- Sidenav Menu Toggle Button in Topbar -->
        <button id="button-toggle-menu" class="nav-link p-2">
            <span class="sr-only">Menu Toggle Button</span>
            <span class="flex items-center justify-center">
               <i class="fa-regular fa-align-left fa-xl"></i>
            </span>
        </button>
    @endif

    @if(!Request::routeIs('phoenix*'))
        @include('components.layouts.partials.logo')
    @endif

    @if(Request::routeIs('general.select') || Request::routeIs('legal*') || Request::routeIs('aeolus*'))
        <div class="logo-box logo-box-select">
            <div class="logo-light">
                <img src="{{ asset('/assets/images/logo/vAMSYS-white-logo.png') }}" class="logo-lg max-h-[60px]" alt="Light logo">
            </div>

            <!-- Dark Logo -->
            <div class="logo-dark">
                <img src="{{ asset('/assets/images/logo/vAMSYS-dark-logo.png') }}" class="logo-lg max-h-[60px]" alt="Dark logo">
            </div>
        </div>
    @elseif(Request::routeIs('phoenix*'))
        <div class="logo-box logo-box-select">
            <div class="logo-light">
                <img src="{{ $airline->design->logo_dark_image }}" class="logo-lg max-h-[60px]" alt="Light logo">
            </div>

            <!-- Dark Logo -->
            <div class="logo-dark">
                <img src="{{ $airline->design->logo_bright_image }}" class="logo-lg max-h-[60px]" alt="Dark logo">
            </div>
        </div>
    @else
        <div class="logo-box logo-box-select">
            <div class="logo-light">
                <img src="{{ $airline->design->logo_select_dark_image }}" class="logo-lg max-h-[60px]" alt="Light logo">
            </div>

            <!-- Dark Logo -->
            <div class="logo-dark">
                <img src="{{ $airline->design->logo_select_bright_image }}" class="logo-lg max-h-[60px]" alt="Dark logo">
            </div>
        </div>
    @endif

    @if(!Request::routeIs('general.select') && !Request::routeIs('aeolus*'))
        @if(isset($airline) && $airline->onTrial())
            <div class="relative ms-auto">
                <div class="alert alert-info">VA Under Trial due to end {{ $airline->trialEndsAt()->toDateString() }}</div>
            </div>
        @elseif(isset($airline) && $airline->billable && !$airline->subscribed() && isset($airlineStaff))
            <div class="relative ms-auto">
                <div class="alert alert-warning">Subscription Missing or Overdue. VA Owner needs to address this.</div>
            </div>
        @elseif(isset($airline) && $airline->maintenance_mode)
                <div class="relative ms-auto">
                    <div class="alert alert-warning">Maintenance Mode</div>
                </div>
        @endif
    @endif

    <!-- Notification Bell Button -->
    @if(!Request::routeIs('general.select') && !Request::routeIs('aeolus*'))
        <div class="relative ms-auto">
{{--            <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link p-2">--}}
{{--                <span class="sr-only">View notifications</span>--}}
{{--                <span class="flex items-center justify-center">--}}
{{--                <i class="fa-light fa-bell text-xl"></i>--}}
{{--                <span class="absolute top-5 end-2.5 w-2 h-2 rounded-full bg-danger"></span>--}}
{{--            </span>--}}
{{--            </button>--}}
{{--            <div class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-80 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg">--}}

{{--                <div class="p-3 border-b border-gray-200 dark:border-gray-700">--}}
{{--                    <div class="flex items-center justify-between">--}}
{{--                        <h6 class="text-sm text-gray-500 dark:text-gray-200"> Notification</h6>--}}
{{--                        <a href="javascript: void(0);" class="text-gray-500 dark:text-gray-200 underline">--}}
{{--                            <small>Clear All</small>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="py-4 h-80" data-simplebar>--}}

{{--                    <h5 class="text-xs text-gray-500 dark:text-gray-200 px-4 mb-2">Today</h5>--}}

{{--                    <a href="javascript:void(0);" class="block mb-4">--}}
{{--                        <div class="py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <div class="flex justify-center items-center h-9 w-9 rounded-full bg text-white bg-primary">--}}
{{--                                        <i class="ri-message-3-line text-lg"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow truncate ms-2">--}}
{{--                                    <h5 class="text-sm font-semibold mb-1">Datacorp <small class="font-normal ms-1">1 min ago</small></h5>--}}
{{--                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <a href="javascript:void(0);" class="block mb-4">--}}
{{--                        <div class="py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <div class="flex justify-center items-center h-9 w-9 rounded-full bg-info text-white">--}}
{{--                                        <i class="ri-user-add-line text-lg"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow truncate ms-2">--}}
{{--                                    <h5 class="text-sm font-semibold mb-1">Admin <small class="font-normal ms-1">1 hr ago</small></h5>--}}
{{--                                    <small class="noti-item-subtitle text-muted">New user registered</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <a href="javascript:void(0);" class="block mb-4">--}}
{{--                        <div class="py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <img src="assets/images/users/avatar-2.jpg" class="rounded-full h-9 w-9" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow truncate ms-2">--}}
{{--                                    <h5 class="text-sm font-semibold mb-1">Cristina Pride <small class="font-normal ms-1">1 day ago</small></h5>--}}
{{--                                    <small class="noti-item-subtitle text-muted">Hi, How are you? What about our next meeting</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <h5 class="text-xs text-gray-500 dark:text-gray-200 px-4 mb-2">Yesterday</h5>--}}

{{--                    <a href="javascript:void(0);" class="block mb-4">--}}
{{--                        <div class="py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <div class="flex justify-center items-center h-9 w-9 rounded-full bg-primary text-white">--}}
{{--                                        <i class="ri-discuss-line text-lg"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow truncate ms-2">--}}
{{--                                    <h5 class="text-sm font-semibold mb-1">Datacorp</h5>--}}
{{--                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <a href="javascript:void(0);" class="block">--}}
{{--                        <div class="py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <img src="assets/images/users/avatar-4.jpg" class="rounded-full h-9 w-9" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="flex-grow truncate ms-2">--}}
{{--                                    <h5 class="text-sm font-semibold mb-1">Karen Robinson</h5>--}}
{{--                                    <small class="noti-item-subtitle text-muted">Wow ! this admin looks good and awesome design</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <a href="javascript:void(0);" class="p-2 border-t border-gray-200 dark:border-gray-700 block text-center text-primary underline font-semibold">--}}
{{--                    View All--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>

        <!-- Light/Dark Toggle Button -->
        <div class="">
            <button type="button" class="nav-link p-2">
            <span class="flex items-center justify-center">
                    <i x-show="!darkMode" data-fc-theme="dark" data-fc-type="theme_switcher" x-on:click="darkMode = !darkMode" class="fa-light fa-lightbulb-slash text-xl !shadow-none"></i>
                    <i x-show="darkMode"  data-fc-theme="light" data-fc-type="theme_switcher" x-on:click="darkMode = !darkMode" class="fa-light fa-lightbulb text-xl"></i>
            </span>
            </button>
        </div>
    @else
        <div class="relative ms-auto">
            <button type="button" class="nav-link p-2">
            <span class="flex items-center justify-center">
                    <i x-show="!darkMode" data-fc-theme="dark" data-fc-type="theme_switcher" x-on:click="darkMode = !darkMode" class="fa-light fa-lightbulb-slash text-xl !shadow-none"></i>
                    <i x-show="darkMode"  data-fc-theme="light" data-fc-type="theme_switcher" x-on:click="darkMode = !darkMode" class="fa-light fa-lightbulb text-xl"></i>
            </span>
            </button>
        </div>
    @endif
    <div class="">
        <button type="button" class="nav-link p-2">
            <span class="sr-only">Zulu Time</span>
            <span class="flex items-center justify-center" id="zuluClock">
{{--                <i class="fa-light fa-clock text-xl"></i>--}}
                {{--                <span class="ml-2" id="zuluClock"></span>--}}
            </span>
        </button>
    </div>


    <!-- Profile Dropdown Button -->
    @if($user)
        <div class="relative">
            <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link flex items-center gap-2.5 px-3 bg-black/5 border-x border-black/10">
        <span class="md:flex flex-col gap-0.5 text-start hidden">
            <h5 class="text-sm">{{ $user->name }}</h5>
            @if(!Request::routeIs('general.select') && !Request::routeIs('aeolus*'))
                <span class="text-xs">{{ $pilot->username }} {{ $pilot->preferredRank->name }}</span>
            @endif
        </span>
                <span class="flex-col gap-0.5 text-start md:hidden">
            <h5 class="text-sm">{{ $user->first_name }}</h5>
             @if(!Request::routeIs('general.select') && !Request::routeIs('aeolus*'))
                        <span class="text-xs">{{ $pilot->username }}</span>
                    @endif
        </span>
                @if(!Request::routeIs('general.select') && !Request::routeIs('aeolus*'))
                    <img src="{{ $pilot->preferredRank->display_image }}" alt="{{ $pilot->preferredRank->name }}" class="h-8 md:flex hidden">
                @endif
            </button>

            <div class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-all duration-300 bg-white shadow-lg border rounded-lg py-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                <!-- item-->
                {{--            <h6 class="flex items-center py-2 px-3 text-xs text-gray-800 dark:text-gray-400">Welcome !</h6>--}}

                <!-- item-->
                <a href="{{ route('global.user.settings') }}" target="_blank" class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                    <i class="ri-account-circle-line text-lg align-middle"></i>
                    <span>My User Account</span>
                </a>

                {{--            <!-- item-->--}}
                {{--            <a href="pages-profile.html" class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">--}}
                {{--                <i class="ri-settings-4-line text-lg align-middle"></i>--}}
                {{--                <span>Settings</span>--}}
                {{--            </a>--}}

                {{--            <!-- item-->--}}
                {{--            <a href="pages-faqs.html" class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">--}}
                {{--                <i class="ri-customer-service-2-line text-lg align-middle"></i>--}}
                {{--                <span>Support</span>--}}
                {{--            </a>--}}

                <!-- item-->
                <a href="{{ route('general.select') }}" class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                    <i class="ri-lock-password-line text-lg align-middle"></i>
                    <span>Select Virtual Airline</span>
                </a>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                    <i class="ri-logout-box-line text-lg align-middle"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </div>
    @endif

</header>
<!-- Topbar End -->
