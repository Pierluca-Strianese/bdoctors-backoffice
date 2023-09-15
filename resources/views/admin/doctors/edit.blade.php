<x-app-layout>

    @section('contents')
        <section class="m-6 p-6 dark:bg-gray-800 dark:text-gray-50">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8"
                style="background-color:  rgba(242, 249, 247, 0.8);;">
                <h1 style="font-weight:700; font-size:30px colour-text">Modifica il tuo profilo</h1>
                <form method="POST" action="{{ route('admin.doctors.update', ['doctor' => $doctor]) }}"
                    enctype="multipart/form-data" novalidate class="container flex flex-col mx-auto space-y-12">
                    {{-- Per protezione dati --}}
                    @csrf
                    {{-- Per protezione dati --}}
                    @method('PUT')

                    <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-gray-900">
                        <div class="space-y-2 col-span-full lg:col-span-1">
                            <p class="font-medium ">Informazioni</p>
                            <p class="text-xs ">Modifica qui le informazioni come:</p>
                        </div>


                        {{-- <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3"> --}}

                        {{-- Name del dottore - Slug --}}

                        {{-- <div class="col-span-full sm:col-span-3">
                            <label
                            for="name" class="form-label" style="font-weight:700; font-size:20px">
                                Name
                            </label>
                            <input
                            type="text"
                            class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ old('name', $doctor->name)}}">

                            <div class="invalid-feedback">
                                @error('name') {{ $message }} @enderror
                            </div>
                        </div> --}}
                        {{-- </div> --}}

                        <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">


                            {{-- Telephone del dottore --}}

                            <div class="col-span-full sm:col-span-3">
                                <label for="telephone" class="form-label colour-text"
                                    style="font-weight:700; font-size:20px">
                                    Telefono
                                </label>
                                <input type="text"
                                    class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('telephone') is-invalid @enderror"
                                    id="telephone" name="telephone" value="{{ old('telephone', $doctor->telephone) }}">

                                <div class="invalid-feedback">
                                    @error('telephone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-full sm:col-span-3">
                                <label for="performance" class="form-label colour-text"
                                    style="font-weight:700; font-size:20px">
                                    Prestazioni
                                </label>
                                <input type="text"
                                    class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('performance') is-invalid @enderror"
                                    id="performance" name="performance"
                                    value="{{ old('performance', $doctor->performance) }}">

                                <div class="invalid-feedback">
                                    @error('performance')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            {{-- Prestastioni del dottore --}}



                        </div>
                    </fieldset>

                    <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-gray-900">
                        <div class="space-y-2 col-span-full lg:col-span-1">
                            <p class="font-medium">Altre informazioni</p>
                        </div>
                        <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                            {{-- Immagine Profilo del Dottore --}}

                            <div class="col-span-full sm:col-span-3">
                                <label for="image" class="form-label"style="font-weight:700; font-size:20px">
                                    Image
                                </label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control  @error('image') is-invalid @enderror"
                                        id="image" name="image" accept="image/*">
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </div>


                            {{-- Curriculum del Dottore --}}

                            <div class="col-span-full sm:col-span-3">
                                <label for="curriculum_vitae"
                                    class="form-label  colour-text"style="font-weight:700; font-size:20px">
                                    Curriculum vitae
                                </label>
                                <div class="input-group mb-3">
                                    <input type="file"
                                        class="form-control @error('curriculum_vitae') is-invalid @enderror"
                                        id="curriculum_vitae" name="curriculum_vitae">
                                </div>
                                <div class="invalid-feedback">
                                    @error('curriculum_vitae')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <button type="submit" class="btn-edit">Salva</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </section>
    @endsection

</x-app-layout>

<style>
    .invalid-feedback {
        color: red;
    }


    .btn-edit {
        color: white;
        align-items: center;
        justify-content: center;
        outline: none;
        cursor: pointer;
        width: 8rem;
        height: 2.7rem;
        background-color: #00bdcd;
        border-radius: 30px;
        border: 1px solid #8F9092;
        transition: all 0.1s ease;
        font-family: "Source Sans Pro", sans-serif;
        font-size: 1rem;
        font-weight: 600;
        text-shadow: 0 1px #fff;
        text-transform: uppercase;
    }

    .button:hover {
        box-shadow: 0 1px 1px 1px #009aa8, 0 1px 1px #009aa8, 0 -1px 1px #009aa8, 0 -1px 1px #009aa8, inset 0 0 1px 1px #009aa8;
    }
</style>
