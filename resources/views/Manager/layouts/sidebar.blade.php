<div class="d-flex flex-column flex-shrink-0 col-md-3 col-lg-2 d-md-block bg-light border-end sidebar collapse" style="width: 229px;">
    <ul class="nav nav-pills flex-column mb-auto">
        <hr>
        <li>
            <a href="{{ route('manager.dashboard') }}" class="nav-link link-dark">
                <i class="bi bi-speedometer"></i>
                @lang('app.dashboard')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.types.index') }}" class="nav-link link-dark">
                <i class="bi bi-bookmarks-fill"></i>
                @lang('app.types')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.devices.index') }}" class="nav-link link-dark">
                <i class="bi bi-phone-fill"></i>
                @lang('app.devices')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.clients.index') }}" class="nav-link link-dark">
                <i class="bi bi-person-lines-fill"></i>
                @lang('app.clients')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.comments.index') }}" class="nav-link link-dark">
                <i class="bi bi-chat-dots-fill"></i>
                @lang('app.comments')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.contacts.index') }}" class="nav-link link-dark">
                <i class="bi bi-envelope-fill"></i>
                @lang('app.contacts')
            </a>
        </li>
        <li>
            <a href="{{ route('manager.managers.index') }}" class="nav-link link-dark">
                <i class="bi bi-person-bounding-box"></i>
                @lang('app.managers')
            </a>
        </li>
    </ul>
</div>