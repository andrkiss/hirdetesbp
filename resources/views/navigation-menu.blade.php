<nav x-data="{ open: false }" class="bg-white drop-shadow sticky top-0 z-50">
<!-- Primary Navigation Menu -->

    {{-- felso resz --}}
    <div class="flex justify-between items-end w-5xl mx-auto">

        {{-- bal logokep --}}
        <div class="flex pl-3 pt-5 pb-3">
            <a href="{{ url('/') }}">
                <x-logo />
            </a>
        </div>

        {{-- jobb hird felh lemenu --}}
        <div class="hidden sm:flex sm:items-center sm:ml-6 mr-2">
            <!-- Teams Dropdown -->
            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                    {{ Auth::user()->currentTeam->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-60">
                                <!-- Team Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-dropdown-link href="{{ route('teams.create') }}">
                                        {{ __('Create New Team') }}
                                    </x-dropdown-link>
                                @endcan

                                <div class="border-t border-gray-100"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-switchable-team :team="$team" />
                                @endforeach
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endif

            <!-- Settings Dropdown -->
            <x-bifent />
            {{-- hirdfeladas --}}
            <div class="flex ml-3 mr-2 mb-0.5">
                <x-nav-link href="{{ route('ad.create') }}" :active="request()->routeIs('ad.create')">
                    <p class="font-bold text-sm py-1 px-3 mr-3 rounded bg-gray-700 hover:bg-gray-600 text-white transition">Hirdetésfeladás</p>
                </x-nav-link>
            </div>

            {{-- felh --}}
            @auth
            <div class="flex mr-1">
                <x-nav-link href="{{ route('dashboard') }}" class="mr-1" :active="request()->routeIs('dashboard')">
                    <i class="text-base fa fa-user"></i>
                </x-nav-link>
            </div>
            @endauth

            {{-- belepes regisztr lemenu --}}
            @if(! Auth::user())
                <div class="flex mr-4 space-x-2">
                    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')" >
                        Belépés
                    </x-nav-link>
                    @if (Route::has('register'))
                    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                        Regisztráció
                    </x-nav-link>
                    @endif
                </div>
            @else
            {{-- lemenu --}}
            <div class="relative">
                <x-dropdown align="right" width="48">

                    {{-- gomb --}}
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center mr-3 py-2 text-sm leading-4 font-medium text-gray-700 hover:text-gray-800 focus:outline-none transition">
                                    {{ Auth::user()->name }}
                                    <svg class="ml-1 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </x-slot>

                    {{-- menu --}}
                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Profil') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Beállítások') }}
                        </x-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                {{ __('Kijelentkezés') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endif
        </div>

        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>


    {{-- kek resz --}}
    <div class="h-4 bg-blue-300"></div>

    {{-- alul linkek --}}
    <div class="flex justify-center space-x-11 p-1">
        @foreach($KategN as $kateg)
        <x-nav-link href="/ad/kategoria/{{ $kateg->id }}" class="text-lg">
            <div class="flex space-x-1 items-center">
                    <i class="text-xl mb-0.5 text-center fa fa-{{ $kateg->ikon }}"></i>
                    <b class="text-sm">{{ $kateg->nev }}</b>
            </div>
        </x-nav-link>
        @endforeach
    </div>

    <!-- Responsive Navigation Menu -->
    {{-- kis kepernyo --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif
                @auth
                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
