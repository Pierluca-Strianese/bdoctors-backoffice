<x-app-layout>
    @section('contents')
        <section class="py-6 px-4 sm:px-6 lg:px-8">
            <div  class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8" style="background-color:  rgba(242, 249, 247, 0.8);;">
                @if (session('transition_success'))
                    @php
                        $transition = session('transition_success')
                    @endphp
                    <div class="bg-green-500 text-white p-4">
                        Your transition success!!! (ID: {{$transition->transaction->id}})
                    </div>
                @endif
        
                @if (session('transition_error'))
                    @php
                        $transition = session('transition_error')
                    @endphp
                    <div class="bg-red-500 text-white p-4">
                        Your transition failed!!! ({{$transition}})
                    </div>    
                @endif
        
        
                {{-- <p>Card number to use: 4111111111111111</p> --}}
                <form action="{{ route('admin.doctors.checkout', ['doctor' => $doctor]) }}" method="post" id="braintree-form">
                    @csrf
                    @method("POST")
                    {{-- @dd($token) --}}
                    
                    
                    @foreach ($promotions as $item)
                        @if ($loop->first)
                            <span class="my-2">Questa promozione dura <span class="font-extrabold">{{$item->duration}} ore</span></span>
                            
                            <div class="flex items-center mb-4">
                                <input id="default-radio-{{$item->id}}" type="radio" value="{{$item->id}}" name="promotion-plan" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked> 
                                <label for="default-radio-{{$item->id}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$item->type}} ({{$item->price}}$)</label>
                            </div>
                            
                        @else
                            <span class="my-2">Questa promozione dura <span class="font-extrabold">{{$item->duration}} ore</span></span>   
                        
                            <div class="flex items-center mb-4">
                                <input id="default-radio-{{$item->id}}" type="radio" value="{{$item->id}}" name="promotion-plan" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" > 
                                <label for="default-radio-{{$item->id}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$item->type}} ({{$item->price}}$)</label>
                            </div>
                          
                        @endif
                    @endforeach
                    <div id="dropin-container"></div>
                    <input type="button" id="submit-button" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" value="Buy">
                    <input type="hidden" id="payload-nonce" name="payment_method_nonce">
                </form>
                <script>
                    // var dropin = require('braintree-web-drop-in');
                    const button = document.querySelector('#submit-button');
                    const input = document.querySelector('#payload-nonce'); 
                    const form = document.querySelector('#braintree-form'); 
        
                    const auth_token = "{{ $token }}";
        
                    braintree.dropin.create({
                        authorization: auth_token,
                        container: '#dropin-container'
                    }, function (createErr, instance) {
                    button.addEventListener('click', function () {
                        // console.log('qui')
                        instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
                            // Submit payload.nonce to your server
                            //console.log(payload.nonce)
                            input.value = payload.nonce;
                            form.submit();
                        });
                    });
                    });
                </script>
            </div>
        </section>
    @endsection
    
</x-app-layout>