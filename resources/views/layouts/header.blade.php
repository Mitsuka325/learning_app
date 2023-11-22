<header>
    @if (Auth::check())
        <nav class="navbar navbar-expand-md" style="background-color: #00bfff;">
            <div class="container">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="{{route('admin.course.index')}}" class="btn btn-secondary me-3">授業管理</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.notice.index')}}" class="btn btn-secondary me-3">お知らせ管理</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.banner.index')}}" class="btn btn-secondary me-3">バナー管理</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            style="color: white; font-size: 18px;">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
            </div>
            </li>
            </ul>
            </div>
        </nav>
    @else
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <ul class="navbar-nav me-auto">
                    <!-- ログインしていない状態のナビゲーションバーのリンク -->
                </ul>
                <ul class="navbar-nav ms-auto">
                    @if (Route::currentRouteName() === 'login')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @if (Route::currentRouteName() === 'register')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    @endif
</header>
