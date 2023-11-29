<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Twoje Konto') }}
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

    <div class="dashboard-container">
        <div class="header-section">
            <div class="user-info">
                <p>
                <h2>Witaj, {{ Auth::user()->name }}</h2>
                </p>
                <p class="balance">Saldo Twojego Konta: <b>{{ Auth::user()->balance }}</b>zł.</p>
            </div>

            <div>
                <a href="{{ route('transactions') }}" class="blue-button">Wykonaj przelew</a>
            </div>
        </div>

        <div class="transaction-section">

            <ul class="transaction-list">
                <h3>Twoje transakcje:</h3><br>
                @foreach ($userTransaction as $transaction)
                    <li>
                        @if ($transaction->sender_id === Auth::user()->id)
                            -{{ $transaction->amount }}zł - do {{ $transaction->receiver->name}} tytułem: "{{ $transaction->title }}" wysłano
                            przelew: {{ $transaction->created_at }}.
                        @else
                            +{{ $transaction->amount }}zł - od {{ $transaction->sender->name}} tytułem: "{{ $transaction->title }} wysłano
                            przelew:
                            {{ $transaction->created_at }}.
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
