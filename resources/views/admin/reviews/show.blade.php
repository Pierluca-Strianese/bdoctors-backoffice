
<x-app-layout>
    @section('contents')
    
        <h1>{{ $review->name }}</h1>
        <h2>{{ $review->valutation }}</h2>
        <p>{{ $review->review}}</p>
        
        <ul>
            @foreach ($review->doctors as $doctor)
                <li><a href="{{ route('admin.reviews.show', ['doctor' => $doctor]) }}">{{ $doctor->name }}</a></li>
            @endforeach
        </ul>

    @endsection
</x-app-layout>