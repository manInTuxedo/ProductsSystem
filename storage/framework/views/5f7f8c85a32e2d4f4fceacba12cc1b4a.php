
<?php $__env->startSection('content'); ?>
<h2>Products List</h2>

<?php if(session('success')): ?>
    <div class='alert alert-success'><?php echo e(session('success')); ?></div>
<?php endif; ?>

<div class='mb-3'>
    <a class='btn btn-primary' href='/viewForm'>Add New Product</a>
</div>

<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class='card mb-3'>
        <div class='card-body'>
            <h5><?php echo e($product->name); ?></h5>
            <p><?php echo e($product->description); ?></p>
            <p><strong>Category:</strong> <?php echo e($product->category ? $product->category->name : 'No Category'); ?></p>
            <span class='badge bg-success'><?php echo e(ucfirst(str_replace('_', ' ', $product->status))); ?></span>
            <div class='mt-3'>
                <a class='btn btn-sm btn-secondary me-2' href='/editProduct/<?php echo e($product->id); ?>'>Edit</a>
                <form action='/deleteProduct/<?php echo e($product->id); ?>' method='POST' class='d-inline'>
                    <?php echo csrf_field(); ?>
                    <button type='submit' class='btn btn-sm btn-danger' onclick="return confirm('Delete this product?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class='alert alert-info'>No products found. Add one now.</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment 2\resources\views/layouts/products.blade.php ENDPATH**/ ?>