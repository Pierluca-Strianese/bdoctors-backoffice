<x-app-layout>
    
    @section('title', "Sponsorizzazioni")

    @section('contents')
    
        <div class="view">
            <div class="container ">
                @if (session('message'))
                    <div class="alert alert-{{ session('alert-type') }}">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-12 p-5">
                        <div class="card p-5 text-start bg-spons">
                            <div class="card-title text-light d-flex row align-items-center">
                                <div class="col-6">
                                    <h1 class="text-capitalize">
                                        {{ $promotion->specifics }}
                                    </h1>
                                    <h5 class="mb-4">
                                        Prezzo: {{ $promotion->price }} &euro;
                                    </h5>
                                    <p>
                                        Una sponsorizzazione che dura {{ $promotion->duration }} ore per rimanere in homepage!
                                    </p>
                                </div>
                            </div>
                            <script src="https://js.braintreegateway.com/web/dropin/1.36.0/js/dropin.js"></script>
                            
                            <div id="dropin-container"></div>
                            {{-- <form method="POST" action="{{ route('sponsor_user') }}">
                                @csrf
                                <input type="hidden" name="sponsorship_id" value="{{ $promotion->id }}">
                                <a href="{{route('admin.promotions.index')}}" class="btn btn-dark me-2 py-2"><i class="fa-solid fa-arrow-left"></i> Torna indietro</a>
                                <button type="submit" id="submit-button" class="button btn py-2 px-3 button--small button--green">Acquista</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    
    
</x-app-layout>