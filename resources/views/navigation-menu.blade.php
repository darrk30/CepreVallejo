@php
    // Links cuando no está autenticado
    $nav_links_public = [
        [
            'name' => 'Cursos',
            'route' => route('cursos.index'),
            'active' => request()->routeIs('cursos.index'),
        ],
        [
            'name' => 'Conócenos',
            'route' => route('conocenos'),
            'active' => request()->routeIs('conocenos'),
        ],
        [
            'name' => 'Convenios',
            'route' => route('convenios'),
            'active' => request()->routeIs('convenios'),
        ],
        [
            'name' => 'Ciclos',
            'route' => route('ciclos'),
            'active' => request()->routeIs('ciclos'),
        ],
        [
            'name' => 'Contáctanos',
            'route' => route('contactanos'),
            'active' => request()->routeIs('contactanos'),
        ],
    ];

    // Links cuando está autenticado
    $nav_links_auth = [
        [
            'name' => 'Página Principal',
            'route' => route('paginaInicio'),
            'active' => request()->routeIs('paginaInicio'),
        ],
        [
            'name' => 'Mis Cursos',
            'route' => route('misCursos'),
            'active' => request()->routeIs('misCursos'),
        ],
        [
            'name' => 'Recursos',
            'route' => '#', // No necesitas una ruta aquí ya que tendrá un submenú
            'active' => request()->routeIs('recursos'),
            'submenu' => [
                [
                    'name' => 'Biblioteca',
                    'route' => route('biblioteca'),
                    'active' => request()->routeIs('recursos'),
                ],
                [
                    'name' => 'Videos',
                    'route' => route('videos'),
                    'active' => request()->routeIs('videos'),
                ],
            ],
        ],
    ];

    $nav_links_admin = [
        [
            'name' => 'Cursos',
            'route' => route('admin.cursos'),
            'active' => request()->routeIs('admin.cursos'),
        ],
        [
            'name' => 'Academico',
            'route' => '#', // No necesitas una ruta aquí ya que tendrá un submenú
            'active' => request()->routeIs('admin.ciclos'),
            'submenu' => [
                [
                    'name' => 'Ciclos',
                    'route' => route('admin.ciclos'),
                    'active' => request()->routeIs('admin.ciclos'),
                ],
                [
                    'name' => 'Matriculas',
                    'route' => route('admin.matriculas'),
                    'active' => request()->routeIs('admin.matriculas'),
                ],
            ],
        ],
        [
            'name' => 'Registros',
            'route' => '#', // No necesitas una ruta aquí ya que tendrá un submenú
            'active' => request()->routeIs('admin.docentes'),
            'submenu' => [
                [
                    'name' => 'Docentes',
                    'route' => route('admin.docentes'),
                    'active' => request()->routeIs('admin.docentes'),
                ],
                [
                    'name' => 'Libros',
                    'route' => route('admin.books'),
                    'active' => request()->routeIs('admin.books'),
                ],
                [
                    'name' => 'Videos',
                    'route' => route('admin.videos'),
                    'active' => request()->routeIs('admin.videos'),
                ],
            ],
        ],
    ];

    $nav_links_prof = [
        [
            'name' => 'Mis Cursos',
            'route' => route('misCursos'),
            'active' => request()->routeIs('misCursos'),
        ],
    ];

    $nav_links = [];

    if (auth()->check()) {
        // El usuario está autenticado
        if (auth()->user()->hasRole('Alumno')) {
            // Si el usuario tiene el rol de 'alumno'
            $nav_links = $nav_links_auth; // Enlaces para el alumno
        } elseif (auth()->user()->hasRole('Administrador')) {
            // Si el usuario tiene el rol de 'administrador'
            $nav_links = $nav_links_admin; // Enlaces para el administrador
        } elseif (auth()->user()->hasRole('Profesor')) {
            // Si el usuario tiene el rol de 'administrador'
            $nav_links = $nav_links_prof; // Enlaces para el administrador
        }
    } else {
        // Si el usuario no está autenticado
        $nav_links = $nav_links_public; // Enlaces públicos
    }

@endphp

<nav x-data="{ open: false }" class="bg-yellow-300 border-gray-100 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('Home') }}">
                    <x-application-mark class="block h-9 w-auto" />
                </a>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @foreach ($nav_links as $nav_link)
                        <div x-data="{ open: false }" class="relative">
                            <x-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']" @mouseover="open = true"
                                @mouseleave="open = false"
                                class="flex items-center h-full text-gray-700 hover:text-white hover:bg-blue-800 px-3 transition duration-300 ease-in-out font-semibold">
                                {{ $nav_link['name'] }}
                            </x-nav-link>
                            @if (isset($nav_link['submenu']))
                                <div x-show="open" x-cloak
                                    class="absolute left-0 w-40 bg-white shadow-lg rounded-lg z-50 transition transform ease-out duration-200"
                                    @mouseover="open = true" @mouseleave="open = false">
                                    @foreach ($nav_link['submenu'] as $submenu_item)
                                        <a href="{{ $submenu_item['route'] }}"
                                            class="block px-4 py-2 text-gray-700 hover:bg-blue-600 hover:text-white">
                                            {{ $submenu_item['name'] }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="ms-3 relative">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="block px-4 py-2 text-xs text-gray-700">{{ __('Administrar cuenta') }}</div>
                                <x-dropdown-link href="{{ route('profile.show') }}">{{ __('Perfil') }}</x-dropdown-link>
                                <div class="border-t border-gray-200"></div>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">{{ __('Cerrar Sesión') }}</x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-4 py-2 bg-blue-800 text-white font-semibold rounded-md shadow-md hover:bg-blue-600 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">Iniciar
                            Sesión</a>
                    @endauth
                </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-yellow-300 focus:outline-none focus:bg-yellow-300 focus:text-gray-900 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ($nav_links as $nav_link)
                <div x-data="{ open: false }">
                    <div @click="open = !open" class="flex justify-between items-center cursor-pointer">
                        <x-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']"
                            class="text-gray-700 hover:text-white hover:bg-blue-800 active:bg-blue-900 px-3 py-1 transition duration-300 ease-in-out font-semibold">
                            {{ $nav_link['name'] }}
                        </x-responsive-nav-link>
                        @if (isset($nav_link['submenu']))
                            <svg x-show="!open" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 10l5 5 5-5H7z" />
                            </svg>
                            <svg x-show="open" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 14l5-5 5 5H7z" />
                            </svg>
                        @endif
                    </div>
                    <div x-show="open" x-cloak class="mt-1 pl-5 space-y-1">
                        @if (isset($nav_link['submenu']))
                            @foreach ($nav_link['submenu'] as $submenu_item)
                                <x-responsive-nav-link href="{{ $submenu_item['route'] }}" :active="$submenu_item['active']"
                                    class="text-gray-600 hover:bg-blue-600 hover:text-white px-3 py-1 transition duration-300 ease-in-out font-semibold block">
                                    {{ $submenu_item['name'] }}
                                </x-responsive-nav-link>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-2">
                    <x-responsive-nav-link href="{{ route('profile.show') }}"
                        class="block text-gray-700 hover:bg-blue-600 hover:text-white">Perfil</x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                            class="block text-gray-700 hover:bg-blue-600 hover:text-white">Cerrar
                            Sesión</x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
