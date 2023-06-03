

<?php $__env->startSection('content'); ?>
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
    <div class="content">
        <div class="title m-b-md">
            Customer List
        </div>
        <div>
            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><a href="customers/enroll">Enroll New Customer</a></button>
        </div>
        <br>
        <div class="row">
           
            <table class="border-collapse border border-slate-400 ...">
                <thead>
                    <tr>
                    <th class="border border-slate-300 ...">Customer Name</th>
                    <th class="border border-slate-300 ...">Stockroom</th>
                    <th class="border border-slate-300 ...">Status</th>
                    <th class="border border-slate-300 ...">Contract Ends By</th>
                    <th class="border border-slate-300 ...">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="border border-slate-300 ..."><?php echo e($customer['name']); ?></td>
                        <td class="border border-slate-300 ..."><?php echo e($customer['stockroom']); ?></td>
                        <td class="border border-slate-300 ..."><?php echo e($customer['status']); ?></td>
                        <td class="border border-slate-300 ..."><?php echo e($customer['exp_date']); ?></td>
                        <td class="border border-slate-300 ...">
                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">More info</a>
                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Update</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                </tbody>
                </table>
  
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\CAMILLE\WD48PCapstone\swiftware\resources\views/customer/customers.blade.php ENDPATH**/ ?>