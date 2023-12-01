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
            <table>
                <thead>
                    <th>
                        Twoje transakcje
                    </th>
                </thead>
                <tbody>
                    @foreach ($userTransaction as $transaction)
                        <tr>
                            <td>
                                @if ($transaction->sender_id === Auth::user()->id)
                                    <h3 class="sending">-{{ $transaction->amount }}zł do numeru:
                                        {{ $transaction->receiver_id}}
                                        tytułem: "{{ $transaction->title }}" wysłano
                                        przelew: {{ $transaction->created_at }}.</h3>
                                @else
                                    <h3 class="reciving">+{{ $transaction->amount }}zł od numeru
                                        {{ $transaction->sender_id }}
                                        tytułem: "{{ $transaction->title }} wysłano
                                        przelew:
                                        {{ $transaction->created_at }}.</h3>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
</x-app-layout>
