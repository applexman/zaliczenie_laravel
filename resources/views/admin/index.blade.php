<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel Admina') }}
        </h2>
    </x-slot>
    <style>
    </style>
    <div class="admin-container">

        <a href="{{ route('admin.create') }}" class="blue-button">Dodaj osobę</a><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Mail</th>
                    <th>Rola</th>
                    <th>Edytuj</th>
                    <th>Usuń</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @if (!$user->role('admin'))
                                <a href="{{ route('admin.edit', ['id' => $user->id]) }}" class="blue-button">Edytuj</a>
                            @else
                                ---
                            @endif
                        </td>
                        <td>
                            @if (!$user->role('admin'))
                                <a href="{{ route('deleteUser', ['id' => $user->id]) }}" class="red-button">Usuń</a>
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
