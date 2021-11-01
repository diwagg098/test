
<?php $__env->startSection('title', 'Book Apartement'); ?>

<?php $__env->startSection('content'); ?>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <h2>Form Book Apartement</h2>
                        <form action="<?php echo e(url('/apartement/book')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3 form-col">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="mb-3 form-col">
                                <label for="" class="form-label">Apartement Name</label>
                                <select name="apartement_name" class="form-control">
                                    <option value="">-- Choose Apartement --</option>
                                    <option value="Royal King Regency">Royal King Regency</option>
                                    <option value="Sultan Regency">Sultan Regency</option>
                                </select>
                            </div>
                            <div class="mb-4 form-col">
                                <label class="form-label">Date From</label>
                                <input type="date" class="form-control" name="dateFrom" value="<?php echo e(old('dateFrom')); ?>" min="<?php echo e(date('Y-m-d')); ?>">
                            </div>
                            <div class="mb-4 form-col">
                                <label class="form-label">Date To</label>
                                <input type="date" class="form-control" value="<?php echo e(old('dateTo')); ?>" name="dateTo" min="<?php echo e(date('Y-m-d')); ?>">
                            </div>
                            <button type="submit" class="btn btn-primary mt-5" style="margin-top: 20px;">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout._app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\test2\resources\views/apartement/create.blade.php ENDPATH**/ ?>