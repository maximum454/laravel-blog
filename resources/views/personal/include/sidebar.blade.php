<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('personal.dashboard')}}" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar mt-2">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(auth()->user()->avatar)
                    <img src="{{asset('storage/'.auth()->user()->avatar)}}" class="img-circle elevation-2"
                         alt="{{auth()->user()->name}}">
                @else
                    <img src="{{asset('admin/dist/img/avatar-no.png')}}" class="img-circle elevation-2"
                         alt="{{auth()->user()->name}}">
                @endif
            </div>
            <div class="info">
                <a href="{{route('profile.index')}}" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.messages')}}" class="nav-link">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>
                        Чаты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('like.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-heart"></i>
                    <p>
                        Понравившиеся посты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('comment.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>
                        Комментарии
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('contact.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Обратная связь
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
