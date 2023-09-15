<x-app-layout>
    @section('contents')
        <div class="container">
            @include('admin.promotions.partials.create_edit', [
                'method' => 'POST',
                'route' => 'admin.promotions.store',
            ])
        </div>
    @endsection
</x-app-layout>