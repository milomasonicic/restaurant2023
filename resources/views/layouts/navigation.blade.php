<nav x-data="{ open: false }" class="bg-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('items.all') }}">
                        <p style="color: #F75C1E; font-weight:bold;">PIZZA BAR</p>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                    <x-nav-link :href="route('pizza.all')" :active="request()->routeIs('pizza.all')">
                        {{ __('Pizza') }}
                    </x-nav-link>

                    <x-nav-link :href="route('hamburger.all')" :active="request()->routeIs('hamburger.all')">
                        {{ __('Hamburger') }}
                    </x-nav-link>

                    <x-nav-link :href="route('salad.all')" :active="request()->routeIs('salad.all')">
                        {{ __('Salad') }}
                    </x-nav-link>

                    <x-nav-link :href="route('drinks.all')" :active="request()->routeIs('drinks.all')">
                        {{ __('Drinks') }}
                    </x-nav-link>

                    @if(auth()->user()->roles === "user")
                    <x-nav-link :href="route('yourOrder')" :active="request()->routeIs('yourOrder')">
                        {{ __('Your Carts') }}
                    </x-nav-link>
                    @endif

                   
                    @if(auth()->user()->roles === "admin")
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Admin <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                      </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                              <a href="{{route("items")}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Items</a>
                            </li>
                          <li>
                            <a href="{{route("admin.page")}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Create new item</a>
                          </li>
                          <li>
                            <a href="{{route("users.page")}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Users</a>
                          </li>
                          <li>
                            <a href="{{route("showOrdersPage")}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Orders</a>
                          </li>
                        </ul>
                    </div>
                    @endif
                    
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('items.all')" :active="request()->routeIs('items.all')">
                {{ __('All items') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pizza.all')" :active="request()->routeIs('pizza.all')">
                {{ __('Pizza') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('hamburger.all')" :active="request()->routeIs('hamburger.all')">
                {{ __('Hamburger') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('salad.all')" :active="request()->routeIs('salad.all')">
                {{ __('Salad') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('drinks.all')" :active="request()->routeIs('drinks.all')">
                {{ __('Drinks') }}
            </x-responsive-nav-link>
            <li>
                Admin Links
            </li>
            @if(auth()->user()->roles === "admin")
            
            <x-responsive-nav-link :href="route('items')" :active="request()->routeIs('items')">
                {{ __('Items') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.page')" :active="request()->routeIs('admin.page')">
                {{ __('Create new item') }}
            </x-responsive-nav-link>
        
            <x-responsive-nav-link :href="route('users.page')" :active="request()->routeIs('users.page')">
                {{ __('Users') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('showOrdersPage')" :active="request()->routeIs('showOrdersPage')">
                {{ __('Orders') }}
            </x-responsive-nav-link>

            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
