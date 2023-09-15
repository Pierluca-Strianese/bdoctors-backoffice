<x-app-layout>
    @section('contents')
        <div class=" my-container flex flex-col justify-center items-center mt-2 ">
            <section>
                <div class="title">
                    <span>Ciao, {{ Auth::user()->name }}!</span>

                    <div>
                        

                        @auth
                            @unless (auth()->user()->doctor)
                                <span><a href="{{ route('admin.doctors.create') }}">Crea il tuo profilo</a></span>
                            @endunless

                            @if (auth()->user()->doctor)
                                
                            
                                
                                <!-- Verifica se l'utente è associato a un dottore -->
                                <ul>
                                    <li class="mb-5"><span class="uppercase uppercase text-2xl ">
                                        
                                        <li class="mb-1"><span class="uppercase uppercase text-2xl "> <i
                                            class="fa-solid fa-user-doctor my-icon"></i> Gestire facilmente il tuo profilo</span>
                                        </li>
                                        <a href="{{ route('admin.doctors.show', ['doctor' => auth()->user()->doctor]) }}">
                                            <span class="mt-2 mb-2 px-8">
                                                >> Il tuo profilo Dottore <<
                                            </span>
                                        </a>
                                        <a href="{{ route('admin.doctors.edit', ['doctor' => auth()->user()->doctor]) }}">
                                            <span class="mt-2 mb-4 px-8"> 
                                                >> Edita Profilo
                                                Dottore << 
                                            </span>
                                        </a>
                                        
                                    </li>
                                    <li class="mb-5">
                                        <span class="uppercase uppercase text-2xl "> 
                                            <i
                                                class="fa-solid fa-envelope-open-text   my-icon">
                                            </i> 
                                            Comunicare in maniera sicura con i tuoi pazienti
                                        </span>
                                       
                                    </li>
                                    <li class="">
                                        <span class="uppercase uppercase text-2xl"> 
                                            <i
                                                class="fa-solid fa-people-group  my-icon">
                                            </i> 
                                            Scegliere il tuo piano di
                                                sponsorizzazione 
                                        </span>
                                    </li>
                                </ul>
                                
                               

                                
                            @endif
                        @endauth

                        <div>
                            
                           
                        </div>
                    </div>
                </div>

            </section>
        </div>
    @endsection

</x-app-layout>


<style>
    .my-container {
        background: linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, #01BDD0 100%);
        height: 90vh;
    }


    a {
        color: inherit;
        text-decoration: inherit;

    }

    /* MAIN */

    ::selection {
        background-color: #f7ca18;
        color: #1b1b1b;
    }

    section {
        background-color: rgba(0, 0, 0, 0.2);
        height: 70vh;

        display: flex;

    }

    section .title {
        max-width: 60%;
        width: 100%;
        align-self: center;
        transform: translateY(-50px);
        margin: 0 auto;
    }

    section .title span {
        display: inline-block;
        font-size: 5vw;
        color: #efefef;
        width: 100%;
        text-transform: uppercase;
        transform: translateX(-100%);
        animation: byBottom 1s ease both;
        font-weight: 600;
        letter-spacing: 0.25vw;
    }

    section .title span:last-child {
        font-size: 1rem;
        animation: byBottom 1s 0.25s ease both;
    }

    section .title span a {
        font-size: 1.5rem;
        position: relative;
        display: inline-block;
        margin-left: 0.5rem;
        text-decoration: none;
        color: #f7ca18;
    }

    /* section .title span a::after {
        content: "";
        height: 2px;
        background-color: #f7ca18;
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 0;
        animation: linkAfter 0.5s 1s ease both;
    } */

    @-moz-keyframes pop {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @-webkit-keyframes pop {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @-o-keyframes pop {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @keyframes pop {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @-moz-keyframes byBottom {
        0% {
            transform: translateY(150%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @-webkit-keyframes byBottom {
        0% {
            transform: translateY(150%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @-o-keyframes byBottom {
        0% {
            transform: translateY(150%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @keyframes byBottom {
        0% {
            transform: translateY(150%);
        }

        100% {
            transform: translateY(0);
        }
    }

    @-moz-keyframes linkAfter {
        0% {
            width: 0;
        }

        100% {
            width: 30px;
        }
    }

    @-webkit-keyframes linkAfter {
        0% {
            width: 0;
        }

        100% {
            width: 30px;
        }
    }

    @-o-keyframes linkAfter {
        0% {
            width: 0;
        }

        100% {
            width: 30px;
        }
    }

    @keyframes linkAfter {
        0% {
            width: 0;
        }

        100% {
            width: 30px;
        }
    }
</style>
