<div class="flex-shrink-0 p-3">
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <a href="{{ route('admin.dashboard') }}" class="nav-link active fs-5 @if (Route::currentRouteName() == 'admin.dashboard') fw-bold @endif" aria-current="page">
                Dashboard
            </a>
        </li>
        @if (Route::currentRouteName() == 'admin.projects.index')
            <li class="mb-1">
                <button class=" ps-0 btn btn-toggle rounded border-0 collapsed fs-5 fw-bold" data-bs-toggle="collapse"
                    data-bs-target="#projects-collapse" aria-expanded="false">
                    Projects List
                </button>
                <div class="collapse ps-3" id="projects-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        @foreach ($projects as $project)
                            <li class="border-bottom">
                                <a href="{{ route('admin.projects.show', $project->slug) }}"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">
                                    {{ $project->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @else
            <li class="mb-1">
                <a href="{{ route('admin.projects.index') }}" class="nav-link active fs-5" aria-current="page">
                    Projects
                </a>
            </li>
        @endif

        @if (Route::currentRouteName() == 'admin.types.index')
            <li class="mb-1">
                <button class=" ps-0 btn btn-toggle rounded border-0 collapsed fs-5 fw-bold" data-bs-toggle="collapse"
                    data-bs-target="#types-collapse" aria-expanded="false">
                    Types List
                </button>
                <div class="collapse ps-3" id="types-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        @foreach ($types as $type)
                            <li class="border-bottom">
                                <a href="{{ route('admin.types.show', $type->slug) }}"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">
                                    {{ $type->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @else
            <li class="mb-1">
                <a href="{{ route('admin.types.index') }}" class="nav-link active fs-5" aria-current="page">
                    Types
                </a>
            </li>
        @endif

        @if (Route::currentRouteName() == 'admin.technologies.index')
            <li class="mb-1">
                <button class=" ps-0 btn btn-toggle rounded border-0 collapsed fs-5 fw-bold" data-bs-toggle="collapse"
                    data-bs-target="#technologies-collapse" aria-expanded="false">
                    Technologies List
                </button>
                <div class="collapse ps-3" id="technologies-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        @foreach ($technologies as $technology)
                            <li class="border-bottom">
                                <a href="{{ route('admin.technologies.show', $technology->slug) }}"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">
                                    {{ $technology->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @else
            <li class="mb-1">
                <a href="{{ route('admin.technologies.index') }}" class="nav-link active fs-5" aria-current="page">
                    Technologies
                </a>
            </li>
        @endif

    </ul>
</div>
