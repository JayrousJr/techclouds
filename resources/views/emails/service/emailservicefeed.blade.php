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


            <section class="max-w-2xl px-1 py-2 mx-auto bg-white dark:bg-gray-900 rounded-lg">
                <header>
                    <img class="w-auto h-20 sm:h-22" src="https://cloudstechn.com/images/logo.png" width="80x"
                        height="auto" alt="Compnay logo">
                </header>

                <main class="mt-2">
                    <p class="text-md text-gray-700 dark:text-gray-200">Hi Dear, <span
                            class="text-blue-400">{{$name}}</span>,</p>
                    <p class="text-md text-gray-700 dark:text-gray-200">You've requested <span
                            class="text-blue-400">{{$service}}</span> Service.</p>

                    <p class="mt-4 leading-loose text-gray-600 dark:text-gray-300">
                        Thank you for reaching out to us and submitting the service request form. Your message
                        has been
                        received loud and clear, and we're thrilled to have the opportunity to assist you. Our
                        dedicated
                        team is already at work, carefully reviewing your request and planning the best way to
                        meet your
                        needs. We understand how valuable your time is, and we're committed to providing you
                        with prompt
                        and effective solutions.
                    </p>

                    <hr class="my-6 border-gray-200 dark:border-gray-700">

                    <div>

                        <div>
                            <a href="{{config('company.link')}}"
                                class="inline-flex items-center text-blue-600 underline dark:text-blue-400 gap-x-2 underline-offset-4">
                                <span>Check Our Website</span>

                                <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:rotate-180">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg> -->
                            </a>

                            <p class="mt-6 text-gray-500 dark:text-gray-400">Stay up-to-date with the latest
                                announcements, offers, updates and new services.</p>
                        </div>

                        <hr class="my-6 border-gray-200 dark:border-gray-700">

                        <div>
                            <a href="{{config('company.link')}}"
                                class="inline-flex items-center text-blue-600 underline dark:text-blue-400 gap-x-2 underline-offset-4">
                                <span>Why TechCllouds</span>

                                <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:rotate-180">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg> -->
                            </a>

                            <p class="mt-6 text-gray-500 dark:text-gray-400">Visit our services and get more
                                offers for
                                the services</p>
                        </div>

                        <hr class="my-8 border-gray-200 dark:border-gray-700">
                    </div>

                    <p class="my-6 text-gray-500 dark:text-gray-400 mb-10">
                        Thanks for making an order. If you have any questions, send us a message <br /> at
                        <a href="mailto:{{config('company.email')}}"
                            class="font-medium text-blue-600 hover:text-blue-500">{{config('company.email')}}</a>
                        or on <a href="{{config('company.link')}}contact"
                            class="font-medium text-blue-600 hover:text-blue-500">Customer Service</a>. We’d
                        love
                        to hear from you.<br />
                        — {{config('company.name')}} Team
                    </p>

                    <a href="{{config('company.link')}}"
                        class="px-6 py-2 my-6 text-sm font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                        Go in directly
                    </a>
                </main>


                <footer class="mt-8">
                    <p class="text-gray-500 dark:text-gray-400">
                        This email was sent from <a href="{{config('company.link')}}"
                            class="text-blue-600 hover:underline dark:text-blue-400"
                            target="_blank">{{config('company.name')}}</a>.
                        If you did not send the message, check in your <a href="{{config('company.link')}}dashboard"
                            class="text-blue-600 hover:underline dark:text-blue-400">account management.</a>
                    </p>

                    <p class="mt-3 text-gray-500 dark:text-gray-400">&copy; {{date('Y')}}
                        {{config('company.name')}}.
                        All
                        Rights Reserved.
                    </p>
                </footer>
            </section>
        </div>
    </body>

</html>