<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel Admina') }}
        </h2>
    </x-slot>

    <style>

    </style>
    <div class="dashboard-container">
        <div class="form-container">

            <label for="name"><h2 style="color: white">Dodaj użytkownika</h2></label>
            <form method="post" {{ route('createUser') }}>
                @csrf
                <div style="margin-bottom: 1rem;">
                <label for="name">Nazwa użytkownika</label>
                <input type="text" name="name" id="name" placeholder="Podaj nazwę użytkownika" required>
                </div>
                <div style="margin-bottom: 1rem;">
                <label for="email">Email użytkownika</label>
                <input type="email" name="email" id="email" placeholder="Podaj email" required>
                </div>
                <div style="margin-bottom: 1rem;">
                <label for="password">Hasło</label>
                <input type="password" name="password" id="password" placeholder="Podaj hasło" required>
                </div>
                <a href="{{ route('admin.index') }}" class="back-button">Powrót</a>
                <button type="submit" class="submit-button">Dodaj użytkownika</button>
            </form>
        </div>
    </div>
</x-app-layout>
