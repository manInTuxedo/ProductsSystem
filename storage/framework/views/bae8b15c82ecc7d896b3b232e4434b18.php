
<?php $__env->startSection('content'); ?>

<h2>Add New Category</h2>

<?php if($errors->any()): ?>
    <div class='alert alert-danger'><?php echo e($errors->first()); ?></div>
<?php endif; ?>

<form action='/addCategory' method='POST'>
    <?php echo csrf_field(); ?>
    <input class='form-control mb-2' type='text' name='name' value='<?php echo e(old('name')); ?>' placeholder='Category name'>
    <button class='btn btn-primary' type='submit'>Add Category</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment 2\resources\views/layouts/insertCategory.blade.php ENDPATH**/ ?>