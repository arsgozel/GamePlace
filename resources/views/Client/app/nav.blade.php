<nav class="navbar navbar-expand-md navbar-dark" aria-label="navbar" style="background-color: #0F0071">
    <div class="container-xl fs-6" style="font-family: sans-serif;">
        <a class="navbar-brand fs-4" href="{{ route('home') }}"> @lang('app.app-name')</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul>
            <li class="nav-item">
                <a class="nav-link link-light fs-5" href="{{ route('contacts.create') }}">
                    <i class="bi-envelope-plus"></i> @lang('app.contact')
                </a>
            </li>
        </ul>
    </div>
</nav>