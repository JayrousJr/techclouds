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

    <body class="p-1 bg-white dark:bg-slate-800 ">
        <div class="p-2 m-2 ">


            <section class="max-w-2xl px-2 py-2 mx-auto bg-white dark:bg-gray-900 rounded-lg">
                <header>
                    <img class="w-auto h-20 sm:h-22" src="https://cloudstechn.com/images/logo.png" width="80x"
                        height="auto" alt="Company Logo">

                    <nav class="flex items-center mt-3 gap-x-6 sm:gap-x-8">
                        <a href="{{config('company.link')}}"
                            class="text-sm text-white px-2 py-3 bg-info transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                            aria-label="Reddit"> Home </a>
                        <a href="{{config('company.link')}}dashboard"
                            class="text-sm text-white px-2 py-3 bg-info transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                            aria-label="Reddit"> Dashboard </a>
                    </nav>
                </header>

                <main class="mt-4">
                    <p class="text-md text-gray-700 dark:text-gray-200">Hi Dear {{$email}},</p>

                    <p class="mt-4 mb-5 leading-loose text-gray-600 dark:text-gray-300">
                        Your message has brightened our day! We want you to know that every word you've shared is
                        appreciated and valued. Your insights, questions, and thoughts contribute to the rich tapestry
                        of our community. We're excited to dive into your message and provide you with the best
                        assistance possible. Rest assured, your engagement drives us forward, and we're here to make
                        your experience exceptional. Thank you for being an essential part of our journey
                    </p>

                    <a href="{{config('company.link')}}"
                        class="px-6 py-2 mt-6 text-sm font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                        Visit Website</a>
                </main>


                <footer class="mt-6">
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Thanks, <br>
                        {{config('company.name')}} team
                    </p>
                    <p class="text-gray-500 dark:text-gray-400">
                        This email was sent from <a href="mailto:{{config('company.email')}}"
                            class="text-blue-600 hover:underline dark:text-blue-400"
                            target="_blank">{{config('company.email')}}</a>.
                        If you did not send the message, check in your <a href="{{config('company.link')}}dashboard"
                            class="text-blue-600 hover:underline dark:text-blue-400">account management.</a>
                    </p>

                    <p class="mt-1 text-gray-500 dark:text-gray-400">&copy;
                        {{date('Y')}} {{config('company.name')}}. All Rights Reserved.
                    </p>
                </footer>
            </section>


        </div>
    </body>

</html>