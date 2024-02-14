<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .welcome-message {
            display: flex;
            align-items: center;
            justify-content: start;
            padding: 20px;
            background-color: #f0f4f8;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: #333;
            font-size: 18px;
        }

        .welcome-message svg {
            margin-right: 15px;
            color: #4f46e5;
            width: 50px;
            height: 50px;
        }

        .welcome-message p {
            margin: 0;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 welcome-message">

                    <p>{{ __("Bienvenido al sistema punto de venta de Don Porfirio") }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
