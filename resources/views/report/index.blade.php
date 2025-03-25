@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="bg-gray-100 p-4">
    <h1 class="text-xl font-semibold mb-3 flex justify-center">Spatie Activity of Arnelito Sayam</h1>

    <form action="{{ route('roles.store') }}" method="POST" class="mb-3 flex gap-2">
        @csrf
        <input type="text" name="name" placeholder="New Role" class="p-2 border rounded text-sm">
        <button type="submit" class="bg-blue-500 text-white px-3 py-2 text-sm rounded hover:bg-blue-600 w-32 flex items-center justify-center">Add Role</button>
    </form>

    <form action="{{ route('permissions.store') }}" method="POST" class="mb-3 flex gap-2">
        @csrf
        <input type="text" name="name" placeholder="New Permission" class="p-2 border rounded text-sm">
        <button type="submit" class="bg-blue-500 text-white px-3 py-2 text-sm rounded hover:bg-blue-600 w-32 flex items-center justify-center">Add Permission</button>
    </form>

    <div class="overflow-x-auto">
        <table class="w-full border text-sm">
            <thead>
                <tr>
                    <th class="p-2 text-left">Role</th>
                    <th class="p-2 text-left">Permissions</th>
                    <th class="p-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="border">
                        <td class="p-2">{{ $role->name }}</td>
                        <td class="p-2">
                            <form action="{{ route('permissions.assign') }}" method="POST">
                                @csrf
                                <input type="hidden" name="role_id" value="{{ $role->id }}">
                                <div class="grid grid-cols-1 gap-2">
                                    @foreach ($permissions as $permission)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" 
                                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} 
                                                class="h-3.5 w-3.5 text-blue-500 border-gray-300 rounded">
                                            <span class="ml-1 text-xs">{{ $permission->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                        </td>
                        <td class="p-2 text-center h-32 flex gap-2 justify-center items-center flex-col">
                            <button type="submit" class="bg-green-500 text-white px-2 py-1 text-xs rounded hover:bg-green-600">Update</button>
                            </form>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 text-xs rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="w-full mt-2 text-sm">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 text-left">Role</th>
                    <th class="p-2 text-left">Permissions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="border">
                        <td class="p-2">{{ $role->name }}</td>
                        <td class="p-2">
                            @foreach ($role->permissions as $permission)
                                <span class="inline-block bg-gray-100 text-gray-700 px-1 py-0.5 text-xs rounded mr-1">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
   
    <div class="flex gap-4 w-full">
    <div class="w-full">
        <table class="w-full border bg-white rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 text-left">Permission Name</th>
                    <th class="p-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr class="border">
                        <td class="p-2">
                            <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="flex gap-2 items-center w-full">
                                @csrf @method('PUT')
                                <input type="text" name="name" value="{{ $permission->name }}" class="p-1 border rounded text-xs flex-1">
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 text-xs rounded hover:bg-green-600">Update</button>
                            </form>
                        </td>
                        <td class="p-2 text-center">
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 text-xs rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
    </div>

    
    <div class="w-full">
        <table class="w-full border bg-white  rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 text-left">Role Name</th>
                    <th class="p-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="border">
                        <td class="p-2">
                            <form action="{{ route('roles.update', $role->id) }}" method="POST" class="flex gap-2 items-center w-full">
                                @csrf @method('PUT')
                                <input type="text" name="name" value="{{ $role->name }}" class="p-1 border rounded text-xs flex-1">
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 text-xs rounded hover:bg-green-600">Update</button>
                            </form>
                        </td>
                        <td class="p-2 text-center">
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 text-xs rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


    </div>
    </div>
</div>
