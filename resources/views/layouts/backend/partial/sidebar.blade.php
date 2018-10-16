
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            {{--<img src="{{Storage::disk('public')->url('profile/'.Auth::user()->image)}}" width="48" height="48" alt="User" />--}}
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Name</div>
            {{--<div class="email">{{Auth::user()->email}}</div>--}}
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">

                    <li>
                        {{--<a href="{{ Auth::user()->role->id == 1 ? route('admin.settings') : route('author.settings') }}"><i class="material-icons">settings</i>Settings</a>--}}
                    </li>

                    <li role="seperator" class="divider"></li>
                    {{--<li>--}}
                        {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                           {{--onclick="event.preventDefault();--}}
                           {{--document.getElementById('logout-form').submit();">--}}
                            {{--<i class="material-icons">input</i>{{ __('Logout') }}--}}
                        {{--</a>--}}

                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                            {{--@csrf--}}
                        {{--</form>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            @if(Request::is('admin*'))
                <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/product*') ? 'active' : ''}}">
                    <a href="{{route('admin.product.index')}}">
                        <i class="material-icons">library_books</i>
                        <span>Manage Products</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/category*') ? 'active' : ''}}">
                    <a href="{{route('admin.category.index')}}">
                        <i class="material-icons">apps</i>
                        <span>Categories</span>
                    </a>
                </li>
                {{--<li class="header">System</li>--}}
                {{--<li class="{{Request::is('admin/settings') ? 'active' : ''}}">--}}
                    {{--<a href="{{route('admin.settings')}}">--}}
                        {{--<i class="material-icons">settings</i>--}}
                        {{--<span>Settings</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                       {{--onclick="event.preventDefault();--}}
                           {{--document.getElementById('logout-form').submit();">--}}
                        {{--<i class="material-icons">input</i><span>{{ __('Logout') }}</span>--}}
                    {{--</a>--}}

                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--@csrf--}}
                    {{--</form>--}}
                {{--</li>--}}
            @endif
            {{--author section --}}

        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2018 <a href="">Ecommerce</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
