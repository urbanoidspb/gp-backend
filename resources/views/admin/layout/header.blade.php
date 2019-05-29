<nav>
    <div class="nav-wrapper blue darken-2">
        <a href="#" class="brand-logo" style="margin-left: 10px">Город перемен</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{ route('admin.news.index') }}">Новости</a></li>
            <li><a href="{{ route('admin.events.index') }}">События</a></li>
            <li><a href="#">Альбомы</a></li>
            <li>
                <form id="form-logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="document.getElementById('form-logout').submit();">Выход</a>
                </form>
            </li>
        </ul>
    </div>
</nav>