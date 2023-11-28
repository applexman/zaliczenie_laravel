<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Twoje Konto') }}
        </h2>
    </x-slot>

    <style>
        .dashboard-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
            color: #333; /* Ciemniejszy tekst dla lepszej czytelności */
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 800px;
            background-color: #8d8b8b; /* Szary kolor dla header-section */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Cień */
            margin-bottom: 20px; /* Odstęp od transaction-section */
        }

        .user-info {
            margin-right: 20px;
        }

        .balance {
            font-size: 24px; /* Zwiększona czcionka */
            margin-top: auto; /* Wyśrodkowanie pionowe */
        }

        .transaction-section {
            width: 100%;
            max-width: 800px;
            background-color: #8d8b8b; /* Szary kolor dla transaction-section */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Cień */
            font-size: 18px; /* Zwiększona czcionka */
        }

        .blue-button {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            color: #fff;
            background-color: #0056b3; /* Ciemniejszy odcień niebieskiego */
            border: 1px solid #0056b3;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .blue-button:hover {
            background-color: #004080; /* Efekt przy najechaniu myszką */
            border-color: #004080;
        }

        /* Zmiany w nagłówkach */
        h2, h3 {
            font-weight: bold;
        }

        h2 {
            font-size: 24px; /* Zwiększona czcionka dla h2 */
        }

        h3 {
            font-size: 20px; /* Zwiększona czcionka dla h3 */
        }
    </style>

    <div class="dashboard-container">
        <div class="header-section">
            <div class="user-info">
                <p><h2>Witaj, {{Auth::user()->name}}</h2></p>
                <p class="balance">Saldo Twojego Konta: <b>{{Auth::user()->balance}}</b>zł.</p>
            </div>

            <div>
                <a href="{{ route('transactions') }}" class="blue-button">Wykonaj przelew</a>
            </div>
        </div>

        <div class="transaction-section">

            <ul class="transaction-list">
                <h3>Twoje transakcje:</h3><br>
                <li>-500,00zł - od [Nazwa] tytułem: "Tytuł" wysłano przelew: [Data]</li>
                <li>+250,00zł - od [Nazwa] tytułem: "Tytuł" wysłano przelew: [Data]</li>
                <li>+233,00zł - od [Nazwa] tytułem: "Tytuł" wysłano przelew: [Data]</li>
            </ul>
        </div>
    </div>
</x-app-layout>
