<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif" href="{{ route("admin.dashboard") }}">
                    <span data-feather="dashboard"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route("admin.news.index") }}">
                    <span data-feather="news"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif" href="{{ route("admin.categories.index") }}">
                    <span data-feather="categories"></span>
                    Категории
                </a>
            </li>
        </ul>
    </div>
</nav>
