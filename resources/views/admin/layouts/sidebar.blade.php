<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="fas fa-chart-line"></i>
                    @lang('admin.dashboard.title') <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>@lang('admin.product.title')</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-plus"></i>
                    @lang('admin.product.add')
                </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>@lang('admin.checker.title')</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.checker.permissions.index')}}">
                    <i class="fas fa-scroll"></i>
                    @lang('admin.checker.permissions.title')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.checker.roles.index')}}">
                    <i class="fas fa-hat-cowboy"></i>
                    @lang('admin.checker.roles.title')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.checker.users.index')}}">
                    <i class="fas fa-users"></i>
                    @lang('admin.checker.users.title')
                </a>
            </li>
        </ul>
    </div>
</nav>
