<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plugin Configuration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="flex items-center min-h-screen bg-gray-50 dark:bg-gray-900">
                        <div class="container mx-auto">
                            <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
                                <div class="text-center">
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <p 
                                        class="{% if $success == True %} text-green-400 {% else %} text-red-400 {% endif %} dark:text-green-400" 
                                        id="response_message"
                                    > {{ $message }} </p>
                                </div>
                                <div class="m-7">
                                    <form action="{{ route('update_configuration') }}" method="POST" id="save_configuration_form">
                                        @csrf
                                        
                                        <div class="mb-6">
                                            <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Shop Url</label>
                                            <input type="text" name="shop_url" id="shop_url" value="{{ old('shop_url', $configuration->shop_url) }}" required disabled class="disabled:opacity-50 w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                                        </div>
                                        <div class="mb-6">
                                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Client Id</label>
                                            <input type="text" name="client_id" id="client_id" value="{{ old('client_id', $configuration->client_id) }}" required disabled class="disabled:opacity-50 w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                                        </div>
                                        <div class="mb-6">
                    
                                            <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">Client Secret</label>
                                            <input type="text" name="client_secret" id="client_secret" value="{{ old('client_secret', $configuration->client_secret) }}" required disabled class="disabled:opacity-50 w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                                        </div>
                                        <div class="mb-6">
                                            <label for="message" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Number Field</label>
                                            <input type="number" name="number_field" id="number_field" value="{{ old('number_field', $configuration->number_field) }}" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
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
