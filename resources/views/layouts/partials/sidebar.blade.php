
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid" style="min-height:0">

        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('root') }}">
            <img src="{{asset('web/logos/logo.png')}}" class="navbar-brand-img" alt="Admin Logo">
        </a>
        <!-- Collapse -->
        <div>
            {{-- Main Admin --}}
            <ul class="navbar-nav">


                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('root') ? 'active':'' }}" href="{{ route('root') }}">
                        <i class="fa fa-desktop text-teal"></i>
                        <span class="nav-link-text">{{ __('Dashboard') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('customer*') ? 'active':'' }}" href="{{ route('categories') }}">
                        <i class="fa fa-folder text-red"></i>
                        <span class="nav-link-text">{{ __('Categories') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('customer*') ? 'active':'' }}" href="{{ route('sub.categories') }}">
                       <i class="fa fa-folder-open	text-red"></i>
                        <span class="nav-link-text">{{ __('Sub Categories') }}</span>
                    </a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link  {{ request()->routeIs('setting.*') ? 'active':'' }}" href="#setting" data-toggle="collapse"  aria-expanded="false" role="button" aria-controls="navbar-examples">
                        <i class="fa fa-wrench text-red"></i>
                        <span class="nav-link-text">{{__('Vehicle Attributes')}}</span>
                    </a>

                    <div class="collapse {{ request()->routeIs('setting.*') ? 'show':'' }}" id="setting">
                        <ul class="nav nav-sm flex-column">
                            <a class="nav-link" href="{{ route('transmissions') }}">
                                <span class="nav-link-text">{{ __('Transmissions') }}</span>
                            </a>
                            <a class="nav-link" href="{{ route('fuels') }}">
                                <span class="nav-link-text">{{ __('Fuel') }}</span>
                            </a>
                            <a class="nav-link " href="{{ route('vehicle_types') }}">
                                <span class="nav-link-text">{{ __('Vehicle Types') }}</span>
                            </a>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('customer*') ? 'active':'' }}" href="{{ route('customer') }}">
                        <i class="fa fa-users text-red"></i>
                        <span class="nav-link-text">{{ __('Customers') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('rent*') ? 'active':'' }}" href="{{ route('rent') }}">
                        <i class="fas fa-list text-pink"></i>
                        <span class="nav-link-text">{{ __('Rents') }}</span>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('subscription.*') ? 'active' : '' }}"
                        href="{{ route('subscription.index') }}">
                        <i class="far fa-bell text-success"></i>
                        <span class="nav-link-text">{{ __('Subscriptions') }}</span>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('notification.*') ? 'active' : '' }}"
                        href="{{ route('notification.index') }}">
                        <i class="fas fa-bell text-primary"></i>
                        <span class="nav-link-text">{{ __('Notifications') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('city*') ? 'active':'' }}" href="{{ route('city')}}">
                        <i class="fas fa-city text-green"></i>
                        <span class="nav-link-text">{{ __('Cities') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('area*') ? 'active':'' }}" href="{{ route('area')}}">
                        <i class="fas fa-map-marked text-purple"></i>
                        <span class="nav-link-text">{{ __('Areas') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('messages') ? 'active':'' }}" href="{{ route('messages') }}">
                        <i class="fa fa-envelope text-teal"></i>
                        <span class="nav-link-text">{{ __('Messages') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('ads.*') ? 'active':'' }}" href="{{ route('ads.index') }}">
                        <i class="fas fa-ad text-warning"></i>
                        <span class="nav-link-text">{{ __('Ads') }}</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link  {{ request()->routeIs('setting.*') ? 'active':'' }}" href="#setting" data-toggle="collapse"  aria-expanded="false" role="button" aria-controls="navbar-examples">
                        <i class="fa fa-cog text-red"></i>
                        <span class="nav-link-text">{{__('Settings')}}</span>
                    </a>

                    <div class="collapse {{ request()->routeIs('setting.*') ? 'show':'' }}" id="setting">
                        <ul class="nav nav-sm flex-column">
                            <a class="nav-link" href="{{ route('setting.currency') }}">
                                <span class="nav-link-text">{{ __('Currency') }}</span>
                            </a>
                            <a class="nav-link" href="{{ route('setting.socialLink') }}">
                                <span class="nav-link-text">{{ __('Social Link') }}</span>
                            </a>
                            <a class="nav-link " href="{{ route('setting.index') }}">
                                <span class="nav-link-text">{{ __('App Setting') }}</span>
                            </a>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('rentconfig.*') ? 'active':'' }}" href="{{ route('rentconfig.index') }}">
                        <i class="fas fa-tools text-pink"></i>
                        <span class="nav-link-text">{{ __('Rent Config') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('bkash.*') ? 'active':'' }}" href="{{ route('bkash.index') }}">
                        <i class="fas fa-money-check text-success"></i>
                        <span class="nav-link-text">{{ __('bkash Config') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" onclick="event.preventDefault();
                                        document.getElementById('logout').submit()" href="#">
                        <i class="fas fa-sign-out-alt text-warning"></i>
                        <span class="nav-link-text">{{ __('Logout') }}</span>
                    </a>
                    <form id="logout" action="{{ route('logout') }}" method="POST"> @csrf </form>
                </li>

            </ul>
        </div>
    </div>
</nav>
