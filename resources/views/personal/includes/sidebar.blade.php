<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            @if(!(Auth::user()->role))
                <li class="nav-item">
                    <a href="{{ route('admin.main.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-astronaut"></i>
                        <p>
                            Админ
                        </p>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('personal.main.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-heart"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.liked.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Понравившиеся посты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.comment.index') }}" class="nav-link">
                    <i class="nav-icon far fa-comment"></i>
                    <p>
                        Комментарии
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('post.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-globe"></i>
                    <p>
                        Вернуться на сайт
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
