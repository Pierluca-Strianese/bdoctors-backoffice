<script>
function closeTrashSuccessMessage() {
    var message = document.querySelector('.bg-red-600');
    if (message) {
        message.style.display = 'none'; // Nasconde il messaggio
    }
}
</script>

<x-app-layout>

    @section('contents')
        @if (session('trash_success'))
            <div class="bg-red-600 text-white px-4 py-2 mt-4 rounded">
                <p>Il messaggio è stato spostato nel cestino</p>
            </div>
        @endif
        <div class="bg">
            <div class="dark:text-gray-100 contain ">
                <div>
                    <h2 class="mt-4 mb-4 text-2xl font-semibold leadi">Messaggi</h2>
                    <button class="mb-4 px-8 py-2 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">
                        <a class="button mx-1" href="{{ route('admin.messages.trashed') }}">Cestino</a>
                    </button>
                </div>
                
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class=" colonna px-6 py-3">
                                    Data e Ora
                                </th>
                                <th scope="col" class=" colonna px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class=" colonna px-6 py-3">
                                    Testo
                                </th>
                                <th scope="col" class=" colonna px-6 py-3">
                                    Azioni
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class=" bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                @foreach ($messages as $message)
                            <tr>
                                <td class=" colonna px-6 py-4">
                                    <p>{{ $message->created_at }}</p>

                                </td>
                                <td class=" colonna px-6 py-4">
                                    <p>{{ $message->email }}</p>

                                </td>
                                <td class=" colonna px-6 py-4">
                                    <p>{{ $message->text }}</p>
                                </td>
                                <td class="flex">
                                    <div class="h-90">
                                        <button class="mt-3 px-8 py-3 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">
                                            <a class="button mx-1" href="{{ route('admin.messages.show', ['message' => $message]) }}">Dettagli</a>
                                        </button>
                                    </div>
                                    
                                    <form action="{{ route('admin.messages.destroy', ['message' => $message->id]) }}"
                                        method="POST" class="d-inline-block" id="confirm-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="mt-3 mx-2 px-8 py-3 font-semibold my-second-btn text-white rounded transition duration-300 ease-in-out transform hover:scale-105">Elimina</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

</x-app-layout>


<style>
    .bg {
        width: 100%;
        /* background-image: url('https://us.123rf.com/450wm/wstockstudio/wstockstudio1707/wstockstudio170700042/81669810-stetoscopio-isolato-su-sfondo-nero-scrivania-di-medici-sterili-accessori-medici-sullo-sfondo-nero.jpg'); */
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        padding-top: 4.5rem;
        text-align: center;
    }

    .contain {
        width: 70%;
        background-color: white;
        margin: auto;
        padding: 1rem;
        border-radius: 1rem;
    }

    h2 {
        color: #01bdcc;
    }

    @media (max-width:1000px){
       .colonna{
        witdh:50%
       }
    }
</style>
