

<?php $__env->startSection('admin_stockroom'); ?>
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="content">
        <div class="title m-b-md">
            Stockroom List
        </div>
        
        <?php for($i = 0; $i < count($stockroom); $i++): ?>
            <p><?php echo e($stockroom[$i]['stockroom_number']); ?></p>
        <?php endfor; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\CAMILLE\WD48PCapstone\swiftware\resources\views/stockroom.blade.php ENDPATH**/ ?>