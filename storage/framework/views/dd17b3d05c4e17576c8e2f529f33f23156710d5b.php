

<?php $__env->startSection('admin_stockrooms'); ?>
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="content">
        <div class="title m-b-md">
            Stockroom List
        </div>
        <div class="row">
        <!-- <?php for($i = 0; $i < count($stockrooms); $i++): ?>
            <p><?php echo e($stockrooms[$i]['stockroom_number']); ?></p>
        <?php endfor; ?> -->

        <?php $__currentLoopData = $stockrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stockroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <div class="card z-depth-0">
                    <div class="card-content center">
                       <?php echo e($stockroom->name); ?>

                       <p><?php echo e($stockroom->is_active); ?></p>
                    </div>
                </div>
                <div class="cardaction right-align">
                    <a class="brand-text" href="#">more info</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
</div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\CAMILLE\WD48PCapstone\swiftware\resources\views/stockrooms.blade.php ENDPATH**/ ?>