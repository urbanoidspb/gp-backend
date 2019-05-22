<nav>
    <div class="nav-wrapper blue darken-2">
        <a href="#" class="brand-logo" style="margin-left: 10px">Город перемен</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#">Настройки</a></li>
            <li><a href="#">Обратная связь</a></li>
            <li>
                <form id="form-logout" method="POST" action="#">
                    @csrf
                    <a href="#" onclick="document.getElementById('form-logout').submit();">Выход</a>
                </form>
            </li>
        </ul>
    </div>
</nav>