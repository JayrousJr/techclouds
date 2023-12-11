<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @if($count>0)
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <caption
                            class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            My Service Requests
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of
                                All the requests that ypu have sent to TechClouds, we are looking forward to process
                                your requests, thank you!
                            </p>
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">N/O</th>
                                <th scope="col" class="px-6 py-3">Requested On</th>
                                <th scope="col" class="px-6 py-3">Service Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$loop->iteration}}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$request->created_at->format('D, F d, Y')}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$request->Service_Requested }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-4 py-2">{{$requests->links()}}</div>
                    @else
                    <p class="my-10 mx-20 text-md text-center font-bold text-gray-500 dark:text-gray-400">You currently
                        have no any service that you have requested at TechClouds, to make a request please <a
                            href="/services" class="text-white bg-slate-500 rounded-md  px-2 py-1 hover:bg-slate-600 ">
                            Visit our service
                            system</a> to place a request</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>