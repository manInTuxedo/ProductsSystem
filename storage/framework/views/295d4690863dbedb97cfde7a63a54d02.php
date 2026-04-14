
<?php $__env->startSection('content'); ?>

<h2>Edit Product</h2>

<?php if($errors->any()): ?>
    <div class='alert alert-danger'><?php echo e($errors->first()); ?></div>
<?php endif; ?>

<form action='/updateProduct/<?php echo e($product->id); ?>' method='POST'>
    <?php echo csrf_field(); ?>
    <input class='form-control mb-2' type='text' name='name' value='<?php echo e(old('name', $product->name)); ?>' placeholder='Product name'>
    <textarea class='form-control mb-2' name='description' placeholder='Description'><?php echo e(old('description', $product->description)); ?></textarea>
    <select class='form-control mb-2' name='status'>
        <option value='available' <?php echo e(old('status', $product->status) === 'available' ? 'selected' : ''); ?>>Available</option>
        <option value='out_of_stock' <?php echo e(old('status', $product->status) === 'out_of_stock' ? 'selected' : ''); ?>>Out of Stock</option>
    </select>
    <button class='btn btn-primary' type='submit'>Update Product</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment 2\resources\views/layouts/editProduct.blade.php ENDPATH**/ ?>