<h1>Admin Dashboard</h1>


<form method="POST" action="{{ route('admin.logout') }}">
    @csrf

    {{-- <x-responsive-nav-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-responsive-nav-link> --}}

    <a href="{{route('admin.logout')}}"
    onclick="event.preventDefault();
                this.closest('form').submit();">
        Log Out            
    </a>

</form>