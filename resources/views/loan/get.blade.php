<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Twoje kredyty') }}
            Twoje saldo {{ Auth::user()->balance }}zł
        </h2>
    </x-slot>

    <style>
        h2,
        h3 {
            font-weight: bold;
        }

        h2 {
            font-size: 24px;
        }

        h3 {
            font-size: 20px;
        }
    </style>

    <div class="center-container">
        <div class="form-container">
            <form method="POST" action="{{ route('addLoan') }}">
                @csrf
                <div style="margin-bottom: 1rem;">
                    <label for="amount">Kwota kredytu:</label><br>
                    <select id="amount" name="amount">
                        <option value="500">500PLN</option>
                        <option value="1000">1000PLN</option>
                        <option value="2000">2000PLN</option>
                    </select>
                    @error('amount')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div style="margin-bottom: 1rem;">
                    <a href="{{ route('loan.index') }}" class="back-button">Powrót</a>
                    <button type="submit" class="submit-button">Weź szybki kredyt</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
