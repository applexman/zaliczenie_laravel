<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-2 gap-4 p-4">
                    <div class="bg-white dark:bg-gray-800 border rounded-lg p-4 shadow-md">
                        <h3 class="text-lg font-semibold mb-4">Stan Konta</h3>
                        <!-- Tutaj dodaj zawartość dla stanu konta -->
                        <p>Saldo: $1000.00</p>
                        <p>Aktywne konto</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 border rounded-lg p-4 shadow-md">
                        <h3 class="text-lg font-semibold mb-4">Historia</h3>
                        <!-- Tutaj dodaj zawartość dla historii -->
                        <ul>
                            <li>Transakcja 1</li>
                            <li>Transakcja 2</li>
                            <li>Transakcja 3</li>
                        </ul>
                    </div>
                </div>
            </div>
            <a href="{{ route('transactions') }}" class="text-blue-500 hover:underline">Przelej pieniądze</a>
        </div>
    </div>
</x-app-layout>
