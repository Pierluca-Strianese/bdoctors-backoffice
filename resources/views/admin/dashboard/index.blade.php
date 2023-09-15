<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}


    @section('contents')
        <div class="my-container">
            <div class="text-center ifDelete">
                @auth
                    @unless (auth()->user()->doctor)
                        <button type="button" class="font-semibold rounded dark:text-gray-100">
                            <a class="ifDelete" href="{{ route('admin.doctors.create') }}">Crea il tuo profilo</a>
                        </button>
                    @endunless

                    @if (auth()->user()->doctor)
                        <!-- Verifica se l'utente è associato a un dottore -->
                        <a href="{{ route('admin.doctors.show', ['doctor' => auth()->user()->doctor]) }}">
                            <button type="button"
                                class="my-8 px-8 py-3 font-semibold border rounded dark:text-gray-100 my-btn">Visualizza
                                Profilo Dottore</button>
                        </a>

                        <a href="{{ route('admin.doctors.edit', ['doctor' => auth()->user()->doctor]) }}">
                            <button type="button"
                                class="my-8 px-8 py-3 font-semibold border rounded dark:text-gray-100 my-btn">Edita Profilo
                                Dottore</button>
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    @endsection






</x-app-layout>
<style>
    .my-container {
        position: relative;
        height: 100vh;
    }

    .btn-container {
        height: 30%;
        width: 20%;
        position: absolute;
        bottom: 30%;
        right: 15%;
    }

    .ifDelete {
        padding-top: 10rem;
        color: white;
        font-size: 2.5rem;
        text-decoration: underline;
    }
</style>
