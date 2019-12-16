<nav class="sticky top-0 z-50 flex items-center justify-between flex-wrap bg-gray-600 p-1">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a class="text-3xl ml-2 semibold" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <div class="block lg:hidden">
        <button @click="toggle" class="flex items-center p-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
        <svg class="fill-current h-3 w-3 " viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
        <a href="{{ route('admin.dashboard') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">Admin</a>
        <a href="{{ route('cart.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4"> Cart</a>
        <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">Blog</a>
        </div>
        <div class="text-white flex mr-4">

        @guest
        <a class="mr-2" href="{{ route('login') }}">{{ __('Login') }}</a>
        @if (Route::has('register'))
            <a class="mr-2" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif 
        @else
        <div class="dropdown align-baseline">
            <button @click="toggle" id="navbarDropdown" class="dropdown-toggle">
            {{ Auth::user()->name }}  <span class="inline-flex my-auto">
            <svg width="20" height="20" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1395 736q0 13-10 23l-466 466q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l393 393 393-393q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg>
            </span>
            </button>
            <div :class="open ? 'block': 'hidden'">
                <div  class="dropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    style="display: none;">
                    @csrf
                    </form>
                </div>
            </div>
        @endguest  
        </div>
    </div>
</nav>