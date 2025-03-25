<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

<div class="bg-gray-100 p-4">
    <h1 class="text-xl font-semibold mb-3 flex justify-center">Spatie Activity of Arnelito Sayam</h1>

    <form action="<?php echo e(route('roles.store')); ?>" method="POST" class="mb-3 flex gap-2">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="New Role" class="p-2 border rounded text-sm">
        <button type="submit" class="bg-blue-500 text-white px-3 py-2 text-sm rounded hover:bg-blue-600 w-32 flex items-center justify-center">Add Role</button>
    </form>

    <form action="<?php echo e(route('permissions.store')); ?>" method="POST" class="mb-3 flex gap-2">
        <?php echo csrf_field(); ?>
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
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border">
                        <td class="p-2"><?php echo e($role->name); ?></td>
                        <td class="p-2">
                            <form action="<?php echo e(route('permissions.assign')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="role_id" value="<?php echo e($role->id); ?>">
                                <div class="grid grid-cols-1 gap-2">
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="permissions[]" value="<?php echo e($permission->name); ?>" 
                                                <?php echo e($role->hasPermissionTo($permission->name) ? 'checked' : ''); ?> 
                                                class="h-3.5 w-3.5 text-blue-500 border-gray-300 rounded">
                                            <span class="ml-1 text-xs"><?php echo e($permission->name); ?></span>
                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                        </td>
                        <td class="p-2 text-center h-32 flex gap-2 justify-center items-center flex-col">
                            <button type="submit" class="bg-green-500 text-white px-2 py-1 text-xs rounded hover:bg-green-600">Update</button>
                            </form>
                            <form action="<?php echo e(route('roles.destroy', $role->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 text-xs rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border">
                        <td class="p-2"><?php echo e($role->name); ?></td>
                        <td class="p-2">
                            <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="inline-block bg-gray-100 text-gray-700 px-1 py-0.5 text-xs rounded mr-1"><?php echo e($permission->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border">
                        <td class="p-2">
                            <form action="<?php echo e(route('permissions.update', $permission->id)); ?>" method="POST" class="flex gap-2 items-center w-full">
                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                <input type="text" name="name" value="<?php echo e($permission->name); ?>" class="p-1 border rounded text-xs flex-1">
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 text-xs rounded hover:bg-green-600">Update</button>
                            </form>
                        </td>
                        <td class="p-2 text-center">
                            <form action="<?php echo e(route('permissions.destroy', $permission->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 text-xs rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border">
                        <td class="p-2">
                            <form action="<?php echo e(route('roles.update', $role->id)); ?>" method="POST" class="flex gap-2 items-center w-full">
                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                <input type="text" name="name" value="<?php echo e($role->name); ?>" class="p-1 border rounded text-xs flex-1">
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 text-xs rounded hover:bg-green-600">Update</button>
                            </form>
                        </td>
                        <td class="p-2 text-center">
                            <form action="<?php echo e(route('roles.destroy', $role->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 text-xs rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>


    </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\spatie\resources\views/report/index.blade.php ENDPATH**/ ?>