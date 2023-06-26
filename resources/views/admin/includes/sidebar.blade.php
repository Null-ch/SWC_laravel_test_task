<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <span class="brand-text font-weight-light">{{auth()->user()->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Все события
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach ($events as $event)
                            <li class="nav-item">
                                <a href="{{ route('admin.event.show', $event->id) }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $event->title }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Мои события
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach ($myEvents as $event)
                            <li class="nav-item">
                                <a href="{{ route('admin.event.show', $event->id) }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $event->title }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @if ((int) auth()->user()->id == 1)
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li> 
                @endif
                
            </ul>
        </nav>
    </div>
</aside>
