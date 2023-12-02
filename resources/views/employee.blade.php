<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel pracownika') }}
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
        <div class="transaction-section">
            <table>
                <thead>
                    <th>
                        Wszystkie transakcje banku
                    </th>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>
                                <h3>{{ $transaction->amount }}zł do numeru:
                                    {{ $transaction->receiver_id }} od numeru:
                                    {{ $transaction->sender_id }}
                                    tytułem: "{{ $transaction->title }}" wysłano
                                    przelew: {{ $transaction->created_at }}.</h3>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
</x-app-layout>
