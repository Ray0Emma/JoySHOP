<header class="app-header">
    <a class="app-header__logo" href="#">{{ config('app.name') }}</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="
                   Rechercher" />
            <button class="app-search__button">
                <i class="fa fa-search"></i>
            </button>
        </li>
        <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="{{ route('admin.settings') }}"><i class="fa fa-cog fa-lg"></i>
                        Paramètres</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-lg"></i>
                        Se Déconnecter</a>
                </li>
            </ul>
        </li>
    </ul>
</header>
