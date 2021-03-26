<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="flex items-center min-h-screen bg-gray-50 dark:bg-gray-900">
                        <div class="container mx-auto">
                            <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
                                <div class="text-center">
                                    <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Plugin Configuratrion</h1>
                                    {{-- <p class="text-green-400 dark:text-green-400" id="response_message"> Configuration Errors/Success can go here  </p> --}}
                                </div>
                                <div class="m-7">
                                    <form action="#" method="POST" id="configuration_form">
                    
                                        <input type="hidden" name="apikey" value="YOUR_ACCESS_KEY_HERE">
                                        <input type="hidden" name="subject" value="New Submission from Web3Forms">
                                        <input type="checkbox" name="botcheck" id="" style="display: none;">
                    
                    
                                        <div class="mb-6">
                                            <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Shop Url</label>
                                            <input type="text" name="shop_url" id="shop_url" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                                        </div>
                                        <div class="mb-6">
                                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Client Id</label>
                                            <input type="email" name="client_id" id="client_id" required class="disabled:opacity-50 w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                                        </div>
                                        <div class="mb-6">
                    
                                            <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">Client Secret</label>
                                            <input type="text" name="client_secret" id="client_secret" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                                        </div>
                                        <div class="mb-6">
                                            <label for="message" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Number Field</label>
                                            <input type="text" name="number_field" id="number_field" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                                        </div>
                                        <div class="mb-6">
                                            <button type="submit" class="w-full px-3 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none">Save Configuration</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
