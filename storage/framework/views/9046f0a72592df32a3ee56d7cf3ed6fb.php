
<?php $__env->startSection('content'); ?>

<h2>Add New Product</h2>

<?php if($errors->any()): ?>
    <div class='alert alert-danger'><?php echo e($errors->first()); ?></div>
<?php endif; ?>

<form action='/addProduct' method='POST'>
    <?php echo csrf_field(); ?>
    <input class='form-control mb-2' type='text' name='name' value='<?php echo e(old('name')); ?>' placeholder='Product name'>
    <textarea class='form-control mb-2' name='description' placeholder='Description'><?php echo e(old('description')); ?></textarea>
    <select class='form-control mb-2' name='category_id'>
        <option value=''>Select Category</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </select>
    <select class='form-control mb-2' name='status'>
        <option value='available' <?php echo e(old('status') === 'available' ? 'selected' : ''); ?>>Available</option>
        <option value='out_of_stock' <?php echo e(old('status') === 'out_of_stock' ? 'selected' : ''); ?>>Out of Stock</option>
    </select>
    <button class='btn btn-primary' type='submit'>Add Product</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment 2\resources\views/layouts/insertProduct.blade.php ENDPATH**/ ?>