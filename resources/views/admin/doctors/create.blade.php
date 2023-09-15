<x-app-layout>
    @section('contents')
        <section class="py-6 px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8"
                style="background-color:  rgba(242, 249, 247, 0.8);;">
                <h1 style="font-weight:700; font-size:20px">Crea nuovo profilo</h1>







                <form method="post" action="{{ route('admin.doctors.store') }}" enctype="multipart/form-data" novalidate
                    class="container flex flex-col mx-auto space-y-12">
                    {{-- Per protezione dati --}}
                    @csrf
                    {{-- Per protezione dati --}}
                    <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-gray-900">


                        <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                            {{-- Name del dottore - Slug --}}

                            <div class="col-span-full sm:col-span-3">
                                {{-- NOME --}}
                                <div class="float-label">
                                    <label for="name" class="form-label" style="font-weight:700; font-size:20px">
                                        Nome
                                    </label>
                                    <input type="text"
                                        class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" placeholder="...">

                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                            <div class="col-span-full sm:col-span-3 float-label">
                                <label for="telephone" class="form-label" style="font-weight:700; font-size:20px">
                                    Telefono
                                </label>
                                <input type="text"
                                    class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('telephone') is-invalid @enderror"
                                    id="telephone" name="telephone" value="{{ old('telephone') }}" placeholder="+39...">

                                <div class="invalid-feedback">
                                    @error('telephone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            {{-- Telephone del dottore --}}


                            {{-- Prestastioni del dottore --}}

                            <div class="col-span-full sm:col-span-3 float-label">
                                <label for="performance" class="form-label" style="font-weight:700; font-size:20px">
                                    Performance
                                </label>
                                <input type="text"
                                    class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('performance') is-invalid @enderror"
                                    id="performance" name="performance" value="{{ old('performance') }}">

                                <div class="invalid-feedback">
                                    @error('performance')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>


                        </div>

                    </fieldset>

                    <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-gray-900">

                        <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                            {{-- Immagine Profilo del Dottore --}}

                            <div class="col-span-full sm:col-span-3">
                                <label for="image" class="form-label margin"style="font-weight:700; font-size:20px">
                                    Inserisci foto profilo
                                </label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image" accept="image/*">
                                </div>
                                <div class="invalid-feedback">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            {{-- Curriculum del Dottore --}}

                            <div class="col-span-full sm:col-span-3">
                                <label for="curriculum_vitae"
                                    class="form-label margin"style="font-weight:700; font-size:20px">
                                    Inserisci Curriculum Vitae
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
                            </div>

                        </div>

                        <div class="mb-4">
                            <button type="submit" class=" py-2 text-white bg-green-700 rounded my-btn">Invia</button>
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


    /* .margin {
        margin-bottom: 3rem;
    } */

    /*========================================================
          Sitewide Styles
==========================================================*/
    /*multiple selector*/
    * {
        padding: 0;
    }

    body {
        margin: 0 auto;
        background: linear-gradient(to bottom, #edf1f2 0%, #d5e2f2 100%);
        background-repeat: no-repeat;
        font-family: 'Helvetica', Arial, sans-serif;
        color: black;
        text-align: center;
        align-items: center;
        height: 100%;
        min-height: 800px;
        overflow: hidden;
        font-family: 'Lato', sans-serif;
    }

    /*========================================================
          Format Section
========================================================*/
    .box-main {
        margin: 0 auto;
        width: 80%;
        margin-top: 40px;
        margin-bottom: 40px;
        background: white;
        box-shadow: 0 15px 20px -15px rgba(0, 0, 0, 0.3), 0 55px 50px -35px rgba(0, 0, 0, 0.3), 0 85px 60px -25px rgba(0, 0, 0, 0.1);
    }

    /*========================================================
          Form Section
========================================================*/
    form {
        margin: 0 auto;
        width: 50%;
        border-bottom-right-radius: 6px;
        border-bottom-left-radius: 6px;
        padding-bottom: 10px;
    }

    /*changing title style*/
    h1 {
        padding-top: 30px;
        text-align: center;
        color: #5bb6ca;
        font-size: 26px;
    }

    /*Camera image to upload image*/
    .fa-camera-retro {
        color: #a7a7a7;
        width: 100px;
        height: 100px;
        margin-top: 20px;
        line-height: 100px;
        border: 2px solid #a7a7a7;
        cursor: pointer;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        -webkit-transition: background-color 0.3s ease;
        transition: background-color 0.3s ease;
        box-shadow: 0 15px 20px -10px rgba(0, 0, 0, 0.3);
    }

    .fa-camera-retro:hover {
        border-color: #6f6f6f;
        box-shadow: 0 3px 5px -5px rgba(0, 0, 0, 0.3);
        transform: translateY(-1px);
        color: #6f6f6f;
    }



    /*========================================================
          input Section
========================================================*/

    /*Float Label main style*/
    .float-label input,
    .float-label select {
        -webkit-appearance: none;
        outline: none;
        border: none;
        margin: 0 auto;
        width: 100%;
        display: block;
        -moz-border-radius: 0;
        border-radius: 0;
        font-family: 'Lato', sans-serif;
        font-size: 18px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.7);
        background: transparent;
        color: #757575;
        padding: 5px 15px 7px 10px;
    }

    .title {
        font-family: 'Lato', sans-serif;
        font-size: 18px;
        background: transparent;
        color: #757575;
        font-weight: normal;
        margin-left: 7px;
    }

    .gender,
    .birthday {
        text-align: left;
        padding-left: 16px;
        margin-top: -10px;
    }

    .gender div,
    .birthday div {
        display: inline-block;
        padding-left: 0;
    }

    /*add style to radio options*/
    .option-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        position: relative;
        top: 13.33333px;
        right: 0;
        bottom: 0;
        left: 0;
        height: 15px;
        width: 15px;
        transition: all 0.15s ease-out 0s;
        background: #cbd1d8;
        border: none;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        margin-right: 0.5rem;
        outline: none;
        position: relative;
        z-index: 1000;
    }

    .option-input:hover {
        background: #9faab7;
    }

    .option-input:checked {
        background: #77cee2;
    }

    .option-input:checked::before {
        height: 15px;
        width: 15px;
        position: absolute;
        content: '✔';
        display: inline-block;
        font-size: 12px;
        text-align: center;
        line-height: 15px;
    }

    .option-input:checked::after {
        -webkit-animation: click-wave 0.65s;
        -moz-animation: click-wave 0.65s;
        animation: click-wave 0.65s;
        background: #77cee2;
        content: '';
        display: block;
        position: relative;
        z-index: 100;
    }

    .option-input {
        border-radius: 50%;
    }

    .option-input::after {
        border-radius: 50%;
    }

    .radio-inline input[type=radio] {
        position: static;
        margin-left: 0;
        padding-left: 0;
    }

    .radio-inline {
        vertical-align: baseline;
    }

    .radio-inline span {
        line-height: 4;
        font-size: 16px;
        padding-left: 4px;
    }

    /*Style birthday select */
    .float-label select {
        display: inline-block;
        width: 24%;
        margin-left: 20px;
        font-size: 16px;
        color: black;
    }

    .float-label select:first-child {
        width: 30%;
    }

    .birthday .select {
        width: 82%;
    }

    .float-label>select option:first-child {
        color: #77cee2;
    }



    /*========================================================
          Button Section
========================================================*/
    /*changing button box style*/
    #sendData,
    #sendData2 {
        width: 150px;
        margin-top: 50px;
        margin-bottom: 10px;
        text-transform: uppercase;
        outline: 0;
        border-style: none;
        background: #FF7052;
        padding: 10px 15px;
        color: white;
        font-weight: 200;
        font-size: 18px;
        box-shadow: rgba(0, 0, 0, 0.8);
    }

    .failure {
        color: #FF7052;
    }

    /*change message*/
    #login,
    #create,
    #signOut {
        text-decoration: none;
        color: #FF7052;
        background: transparent;
        border: none;
    }

    .message a:hover {
        color: black;
    }

    /*========================================================
      Profile Section
========================================================*/
    /*Add margin to profile*/
    #updateProfile {
        padding: 20px 60px;
    }

    .user-left {
        padding-top: 40px;
    }

    /*create a round container to hide overflow image*/
    .user-left span {
        display: inline-block;
        width: 250px;
        height: 250px;
        overflow: hidden;
        text-align: center;
        border-radius: 100%;
        /*add shadow and border*/
        border: 2px solid #a9a9a9;
        cursor: pointer;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        -webkit-transition: background-color 0.3s ease;
        transition: background-color 0.3s ease;
        box-shadow: 0px 20px 25px -10px rgba(0, 0, 0, 0.3);
    }

    /*change image effect when hover*/
    .user-left span:hover {
        border-color: #b3b3b3;
        box-shadow: 0 3px 5px -5px rgba(0, 0, 0, 0.3);
        transform: translateY(-1px);
    }

    /*change font margin and padding*/
    .user-left h1 {
        padding-top: 0;
    }

    /*center image and make it round*/
    .user-image {
        left: 50%;
        margin-left: -100%;
        position: relative;
        width: auto !important;
        height: 250px !important;
    }

    /*change image opacity*/
    .user-image:hover {
        opacity: 0.5;
        filter: alpha(opacity=50);
    }

    .user-right {
        padding: 20px 20px 40px;
        min-height: 200px;
        /*margin-left: 80px;*/
    }

    /*Change profile title*/
    .user-right h2 {
        text-align: left;
        font-family: 'Roboto', Arial, sans-serif;
        font-weight: 400;
        font-size: 3em;
    }

    .user-right span {
        color: #d2d2d2;
    }

    .user-info {
        padding: 18px;
        width: 100%;
        min-height: 200px;
        border-radius: 3px;
        box-shadow: 0 0 0 0 transparent;
        box-shadow: 0 15px 20px -15px rgba(0, 0, 0, 0.3), 0 55px 50px -35px rgba(210, 214, 213, 0.5);
        background-color: transparent;

        box-shadow: 0px 2px 2px 2px rgba(210, 214, 213, 0.4);
    }


    td p {
        font-size: 20px;
        padding: 10px 15px 10px 10px;
        text-align: left;
    }

    #signOut {
        float: right;
    }
</style>
