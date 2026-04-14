
<?php $__env->startSection('content'); ?>

<h2>Categories</h2>

<?php if(session('success')): ?>
    <div class='alert alert-success'><?php echo e(session('success')); ?></div>
<?php endif; ?>

<a href='/viewCategoryForm' class='btn btn-primary mb-3'>Add New Category</a>

<table class='table'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($category->id); ?></td>
            <td><?php echo e($category->name); ?></td>
            <td>
                <a href='/editCategory/<?php echo e($category->id); ?>' class='btn btn-warning'>Edit</a>
                <form action='/deleteCategory/<?php echo e($category->id); ?>' method='POST' style='display:inline;'>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type='submit' class='btn btn-danger' onclick='return confirm("Are you sure?")'>Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment 2\resources\views/layouts/categories.blade.php ENDPATH**/ ?>