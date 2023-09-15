<x-app-layout>
    @section('contents')

        @if(session('trash_success'))
            <div class="bg-red-600 text-white px-4 py-2 mt-4 rounded relative">
                <p class="inline-block">Il messaggio è stato spostato nel cestino</p>
                <button onclick="closeTrashSuccessMessage()" class="absolute top-1 right-2 px-2 py-1 text-white hover:bg-red-700 focus:outline-none">Chiudi</button>
            </div>
        @endif
        <div class="bg-white bg-opacity-75 dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg mt-4 mx-8">
            <div class="px-4 py-5 sm:px-6 flex justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                    Dettagli Messaggio
                </h3>
                <form
                    action="{{ route('admin.messages.destroy', ['message' => $message->id]) }}"
                    method="POST"
                    class="d-inline-block"
                    id="confirm-delete"
                    >
                        @csrf
                        @method('DELETE')
                        <button class="mx-1 px-8 py-3 font-semibold my-second-btn text-white rounded transition duration-300 ease-in-out transform hover:scale-105">Elimina</button>
                </form>
            </div>
            <div class="border-t border-gray-200 dark:border-gray-600 px-4 py-5 sm:p-0">
                <dl class="sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6 sm:py-5">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-900 dark:text-gray-400">
                            Data e Ora
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $message->created_at }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-900 dark:text-gray-400">
                            Email
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $message->email }}
                        </dd>
                    </div>
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-900 dark:text-gray-400">
                            Testo
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $message->text }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        
    @endsection
</x-app-layout>