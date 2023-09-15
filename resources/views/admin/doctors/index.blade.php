<x-app-layout>
    <div class="bg-container">
    @section ('contents')

        <div class="dark:text-gray-100">
        
            <div>
                <table class="w-full p-6 text-xs text-left whitespace-nowrap">
                    <colgroup>
                        <col class="w-5">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col class="w-5">
                    </colgroup>
                    <thead>
                        <tr class="dark:bg-gray-700">
                            <th class="p-2">Name</th>
                            <th class="p-2">Lastname</th>
                            <th class="p-2">Email</th>
                            <th class="p-2">Address</th>
                            <th class="p-2">Telephone Number</th>
                            <th class="p-2">Performance</th>
                            <th class="p-2">Curriculum Vitae</th>
                            <th class="p-2">Actions</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody class="border-b dark:bg-gray-900 dark:border-gray-700">
                        @foreach ($doctors as $doctor)
                            <tr>
                               
                                <td class="px-2 py-2">
                                    <p>{{ $doctor->user->name }}</p>
                                </td>
                                <td class="px-2 py-2">
                                    <span>{{ $doctor->user->lastname }}</span>
                                </td>
                                <td class="px-2 py-2">
                                    <p>{{ $doctor->user->email }}</p>
                                </td>
                                <td class="px-2 py-2">
                                    <p>{{ $doctor->user->address}}</p>
                                </td>
                                <td class="px-2 py-2">
                                    <p>{{ $doctor->telephone }}</p>
                                </td>
                                
                                <td class="px-2 py-2">
                                    <p>{{ $doctor->performance }}</p>
                                </td>
                                
                                <td class="px-2 py-2">
                                    <p><a class="text-decoration-none" href="{{ $doctor->curriculum_vitae }}">Link</a></p>
                                </td> 
                                <td class=" flex px-3 py-2">
                                    <button class="px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">
                                        <a class="button mx-1" href="{{ route('admin.doctors.show', ['doctor' => $doctor]) }}">View</a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    
    @endsection

</x-app-layout>



