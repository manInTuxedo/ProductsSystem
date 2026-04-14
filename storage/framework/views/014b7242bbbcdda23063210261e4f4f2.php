
<?php $__env->startSection('content'); ?>

<h2>Add New Product</h2>
<form action='/addProduct' method='POST'>
    <?php echo csrf_field(); ?>
    <input class='form-control mb-2' type='text' name='name'placeholder='Product name'>
    <textarea class='form-control mb-2' name='description'placeholder='Description'></textarea>
    <select class='form-control mb-2' name='status'>
        <option value='available'>Available</option>
        <option value='out_of_stock'>Out of Stock</option>
    </select>
    <button class='btn btn-primary' type='submit'>Add Product</button>
</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\A2_CET232_240102988_Abdullah-Tarek\resources\views/layouts/insertProduct.blade.php ENDPATH**/ ?>