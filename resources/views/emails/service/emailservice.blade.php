<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('company.name', 'Techclouds') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>

    <body class="p-2 bg-white dark:bg-slate-800 ">
        <div class="p-2 m-2 ">


            <section class="max-w-2xl px-1 py-2 mx-auto bg-white dark:bg-gray-900 rounded-lg">
                <header>
                    <img class="w-auto h-20 sm:h-22" src="https://cloudstechn.com/images/logo.png" width="80x"
                        height="auto" alt="Compnay logo">
                </header>

                <main class="mt-2 mb-6">
                    <p class="text-md text-gray-700 dark:text-gray-200">Hi {{config('company.name')}},</p>

                    <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                        We have received the Service request from our customer <span
                            class="text-blue-400">{{$name}}</span><br>
                        Email: <a href="mailto:{{$email}}"
                            class="font-sm text-blue-600 hover:text-blue-500">{{$email}}</a>
                        <br>Phone Number: <a href="tel:{{$phone}}"
                            class="font-sm text-blue-600 hover:text-blue-500">{{$phone}}</a>
                    </p>
                    <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                        <span class="text-blue-400">Service Requested:</span> {{$service}}
                    </p>
                    <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                        <span class="text-blue-400">Service Discription</span>: {{$description}}
                    </p>
                </main>

                <hr class="my-8 border-gray-200 dark:border-gray-700">

                <footer class="mt-2">
                    <p class="text-gray-500 dark:text-gray-400">
                        This email was sent from <a href="{{config('company.link')}}"
                            class="text-blue-600 hover:underline dark:text-blue-400"
                            target="_blank">{{config('company.name')}}</a>.
                    </p>

                    <p class="mt-3 text-gray-500 dark:text-gray-400">&copy; {{date('Y')}} {{config('company.name')}}.
                        All Rights Reserved.</p>
                </footer>
            </section>
        </div>
    </body>

</html>