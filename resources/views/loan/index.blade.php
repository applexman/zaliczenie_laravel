<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Twoje kredyty') }}
        </h2>
        <p class="balance">Saldo Twojego Konta: <b>{{ Auth::user()->balance }}</b>zł.</p>
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

    <div class="dashboard-container">
        <a href="{{ route('loan.get') }}" class="blue-button">Weź szybki kredyt</a><br>
        <div class="transaction-section">
            @if (session('error'))
                <h3 class="sending text-center">{{ session('error') }}</h3>
            @endif
            @if (count($userLoan) <= 0)
                <h2>Nie masz historii kredytów</h2>
            @else
                <table>
                    <thead>
                        <th>
                            Wszystkie Twoje Szybkie Kredyty
                        </th>
                        <th>
                            Spłać
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($userLoan as $loan)
                            <tr>
                                <td>
                                    <h3>Numer użytkownika: {{ $loan->user_id }} wartość kredytu do spłacenia:
                                        {{ $loan->amount }}.
                                </td>
                                <td>
                                    <a href="{{ route('payLoan', ['id' => $loan->id]) }}" class="blue-button">Spłać ten
                                        kredyt</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            @endif
        </div>
    </div>
</x-app-layout>
