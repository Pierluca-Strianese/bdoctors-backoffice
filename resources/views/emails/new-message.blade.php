<x-app-layout>
        @section('contents')
            @foreach ($apartment->message()->get() as $message)
              <h1>Nuovo messaggio di posta da: {{ $message->email }}</h1>
              <h3>Intestato a: {{ $message->text }}</h3>
              <h3>In merito a: {{ $doctor->name }}</h3>
          
              <p>{{ $message->message }}</p>
          
          @endforeach
        @endsection
</x-app-layout>