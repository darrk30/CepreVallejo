<x-guest-layout>
    <!-- component -->
    <div class="h-screen w-screen bg-gray-100">
        <div class="flex flex-col items-center justify-center h-full px-4 sm:px-0">
            <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-blue-500 sm:mx-0" style="height: 500px;">
                <!-- Formulario de inicio de sesión -->
                <div class="flex flex-col w-full md:w-1/2 p-6 bg-blue-500 rounded-l-lg">
                    <div class="flex flex-col flex-1 justify-center mb-8">
                        <h1 class="text-4xl text-center font-light text-gray-100">BIENVENIDO</h1>
                        <div class="w-full mt-4">
                            <x-validation-errors class="mb-4" />

                            @session('status')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ $value }}
                                </div>
                            @endsession
                            <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('login') }}">
                                @csrf
                                <!-- Campo de Email -->
                                <div class="flex flex-col mt-4 relative">
                                    <i class="fa-solid fa-envelope absolute text-gray-400 left-2 top-2.5"></i>
                                    <input id="email" type="email"
                                        class="flex-grow h-10 px-10 border rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 ease-in-out"
                                        name="email" :value="old('email')" placeholder="Correo">
                                </div>
                                <!-- Campo de Contraseña -->
                                <div class="flex flex-col mt-4 relative">
                                    <i class="fa-solid fa-lock absolute text-gray-400 left-2 top-2.5"></i>
                                    <input id="password" type="password"
                                        class="flex-grow h-10 px-10 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 ease-in-out"
                                        name="password" required placeholder="Contraseña">
                                </div>
                                <!-- Recordarme -->
                                <div class="flex items-center mt-4">
                                    <x-checkbox id="remember_me" name="remember" />
                                    <label for="remember" class="text-sm text-white ml-2">Recordar Sesión</label>
                                </div>
                                <!-- Botón de inicio de sesión -->
                                <div class="flex flex-col mt-8">
                                    <button type="submit"
                                        class="bg-yellow-400 hover:bg-yellow-300 text-black text-sm font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                                        <i class="fa-solid fa-sign-in-alt mr-2"></i> Iniciar Sesión
                                    </button>
                                </div>
                            </form>
                            <!-- Enlace de contraseña olvidada -->
                            <div class="text-center mt-4">
                                <a class="no-underline hover:text-gray-300 transition duration-300 ease-in-out text-white"
                                    href="#">
                                    <i class="fa-solid fa-key mr-2"></i> Olvido su contraseña?
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Imagen lateral -->
                <div class="hidden md:block md:w-1/2 rounded-r-lg"
                    style="background: url('https://scontent.fcix1-1.fna.fbcdn.net/v/t39.30808-6/327687321_475295858124349_7099153918126242271_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeG_c1VtSMXp3ZxIPjxrvsDZvP7xPYats7O8_vE9hq2zswFix9I5IZ_p-1U2vj5lYBqYTV8kbNZRiFBp9GKf--cH&_nc_ohc=cc16ArkX5bgQ7kNvgGVIwgn&_nc_ht=scontent.fcix1-1.fna&_nc_gid=AuqPnmDoIVikgzMJBZ8X-m9&oh=00_AYCJmOYU5AfHujEXW_NSUJjlH3Vp4lgpY5lkakYQ3oIW7A&oe=670896E7'); background-size: cover; background-position: center center;">
                </div>
            </div>
        </div>
    </div>

    {{-- <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card> --}}
</x-guest-layout>
