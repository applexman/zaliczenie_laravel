<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel Admina') }}
        </h2>
    </x-slot>
    <div class="dashboard-container">
        <div class="form-container">

            <label for="name">
                <h2 style="color: white">Edytuj użytkownika</h2>
            </label>
            <form method="post" action="{{ route('editUser', ['id' => $user->id]) }}">
                @csrf
                @method('PUT')
                <div style="margin-bottom: 1rem;">
                    <label for="name">Nazwa użytkownika</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="email">Email użytkownika</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="role">Rola</label><br>
                    <select id="role" name="role">
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Employee</option>
                    </select>
                </div>
                <a href="{{ route('admin.index') }}" class="back-button">Powrót</a>
                <button type="submit" class="submit-button">Edytuj użytkownika</button>
            </form>
        </div>
    </div>
</x-app-layout>
