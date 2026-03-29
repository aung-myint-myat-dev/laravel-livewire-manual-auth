<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="min-h-screen bg-gray-50">

        <main class="flex-1 flex flex-col">

            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8">
                <div class="text-gray-500 font-medium">{{ auth()->user()->name}}'s Dashboard</div>
                <div class="flex items-center gap-4">
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        @method('post')
                        <button class="text-sm font-bold text-red-300 hover:text-red-500 transition-all duration-150 ease-in cursor-pointer border-[1.5px] px-3 py-1 rounded-sm">Logout</button>
                    </form>
                    <button class="p-2 text-gray-400 hover:text-gray-900"><svg class="w-6 h-6" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg></button>
                    <div
                        class="h-8 w-8 bg-gray-900 rounded-full flex items-center justify-center text-white text-xs font-bold">
                        {{Str::limit(Str::initials(auth()->user()->name, capitalize: true), 2, '')}}</div>
                </div>
            </header>

            <div class="p-8 space-y-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Welcome {{ auth()->user()->name }} 👋</h2>
                    <p class="text-gray-500">Your information are here</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Sales</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-2">$24,500</h3>
                        <span class="text-green-500 text-xs font-bold">+12.5% from last month</span>
                    </div>
                    <div class="bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Active Users</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-2">1,240</h3>
                        <span class="text-blue-500 text-xs font-bold">Updated just now</span>
                    </div>
                    <div class="bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">New Orders</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-2">45</h3>
                        <span class="text-gray-400 text-xs">Pending review: 3</span>
                    </div>
                </div>

                <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                        <h3 class="font-bold text-gray-900">Recently List</h3>
                        <button class="text-sm text-blue-600 font-semibold hover:underline">View All</button>
                    </div>
                    <div class="p-0">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Customer</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                <tr>
                                    <td class="px-6 py-4 text-gray-900 font-medium">U Ba Gyi</td>
                                    <td class="px-6 py-4"><span
                                            class="px-3 py-1 bg-green-100 text-green-700 text-xs rounded-full font-bold">Success</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 font-bold">$120.00</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-gray-900 font-medium">Daw Nu</td>
                                    <td class="px-6 py-4"><span
                                            class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full font-bold">Pending</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 font-bold">$450.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
