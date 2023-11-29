<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="color: #000000;">
            {{ __('Nowy przelew') }}
        </h2>
        Twoje saldo {{ Auth::user()->balance }}zł
    </x-slot>
    <div class="center-container">
        <div class="form-container">
            <div style="margin-bottom: 1rem;">
                <label for="receiver_id">
                    <h3>Dane do przelewu</h3>
                </label>
            </div>
            <form method="POST" action="{{ route('transfer') }}">
                @csrf
                <div style="margin-bottom: 1rem;">
                    <label for="receiver_id">ID odbiorcy:</label><br>
                    <input type="text" class="form-control" id="receiver_id" name="receiver_id"
                        placeholder="Podaj numer odbiorcy" required>
                </div>

                <div style="margin-bottom: 1rem;">
                    <label for="amount">Kwota:</label><br>
                    <input type="number" min="0" class="form-control" id="amount" name="amount"
                        placeholder="Podaj kwotę przelewu" required>
                </div>

                <div style="margin-bottom: 1rem;">
                    <label for="title">Tytuł:</label><br>
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="Podaj tytuł przelewu" required>
                </div>

                <div style="margin-bottom: 1rem;">
                    <a href="{{ route('dashboard') }}" class="back-button">Powrót</a>
                    <button type="submit" class="submit-button">Wyślij przelew</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
