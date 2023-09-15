<x-app-layout>

    @section('contents')
    
        <div class="container">
            @include('admin.promotions.partials.create_edit', [
            'method' => 'PUT',
            'route' => 'admin.promotions.update',
            ])
        </div>

    @endsection
    
</x-app-layout>