<x-app-layout>


    @section('contents')
        <div class="bg">
            <div class="dark:text-gray-100 contain ">
                <h2 class="mt-4 mb-4 text-2xl font-semibold leadi">Recensioni</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Voto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nome
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Recensione
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                @foreach ($reviews as $review)
                            <tr>
                                <td class="px-9 py-4">
                                    <p>{{ $review->valutation }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p>{{ $review->name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p>{{ $review->review }}</p>
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
</style>
