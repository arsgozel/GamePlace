<div class="d-flex flex-column flex-shrink-0 col-md-3 col-lg-2 d-md-block bg-light border-end sidebar collapse" style="width: 226px;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('manager.dashboard') }}" class="nav-link link-dark pt-4">
                <i class="bi bi-speedometer text-primary"></i>
                @lang('app.dashboard')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.apps.index') }}" class="nav-link link-dark">
                <i class="bi bi-hdd-stack-fill text-primary"></i>
                @lang('app.apps')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.types.index') }}" class="nav-link link-dark">
                <i class="bi bi-bookmarks-fill text-primary"></i>
                @lang('app.types')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.devices.index') }}" class="nav-link link-dark">
                <i class="bi bi-phone-fill text-primary"></i>
                @lang('app.devices')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.clients.index') }}" class="nav-link link-dark">
                <i class="bi bi-person-lines-fill text-primary"></i>
                @lang('app.clients')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.comments.index') }}" class="nav-link link-dark">
                <i class="bi bi-chat-dots-fill text-primary"></i>
                @lang('app.comments')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.contacts.index') }}" class="nav-link link-dark">
                <i class="bi bi-envelope-fill text-primary"></i>
                @lang('app.contacts')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.managers.index') }}" class="nav-link link-dark">
                <i class="bi bi-person-bounding-box text-primary"></i>
                @lang('app.managers')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.visitors.index') }}" class="nav-link link-dark">
                <i class="bi bi-people-fill text-primary"></i>
                @lang('app.visitors')
            </a>
        </li>
    </ul>
</div>