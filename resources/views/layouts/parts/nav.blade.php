<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-3">
        <div class="container-fluid">
            <a href="javascript:;"><img src="{{asset('admin/images/logo-icon-3.png')}}" width="140" alt="" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3 login-menu-2">
            </ul>
            @if (!empty(Auth::user()->name))
                @if (Auth::user()->is_admin==0)
                    <a class="btn btn-sm btn-primary px-4 radius-30" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="d-flex align-items-center">
                        <div class="">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </div>
                        <div class="ms-3"><span>Logout</span></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </div>
                    </a>

                @endif
            @endif
            </div>
        </div>
    </nav>
</header>
