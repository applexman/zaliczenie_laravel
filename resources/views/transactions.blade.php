<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Przelej') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nowa transakcja</div>

                    <div class="card-body">
                        <div class="d-flex justify-content-center"> <!-- Centered box -->
                            <form method="POST" action="" class="needs-validation" novalidate style="width: 80%;">
                                @csrf

                                <div class="mb-3">
                                    <label for="receiver_id" class="form-label">ID odbiorcy:</label>
                                    <input type="text" class="form-control" id="receiver_id" name="receiver_id" required>
                                    <div class="invalid-feedback">
                                        Pole ID odbiorcy jest wymagane.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="amount" class="form-label">Kwota:</label>
                                    <input type="text" class="form-control" id="amount" name="amount" required>
                                    <div class="invalid-feedback">
                                        Pole Kwota jest wymagane.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Tytuł:</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                    <div class="invalid-feedback">
                                        Pole Tytuł jest wymagane.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Wyślij transakcję</button>
                                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Powrót</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
