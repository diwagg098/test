

<?php $__env->startSection('title','Apartement'); ?>
<?php $__env->startSection('content'); ?>
    <div id="page-content-wrapper">
    <div class="container-fluid">
        <h2>Apartement</h2><br>
        <br>
        <div class="row">
            <a href="<?php echo e(url('apartement/book')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Book Now</a> | <button class="btn btn-info" onclick="downloadexcel('table')"><i class="fa fa-download"></i> Download Report</button>
        </div>
        <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table" id="">
                    <thead >
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Apartement Name</th>
                        <th class="text-center">dateFrom</th>
                        <th class="text-center">dateTo</th>
                        <th class="text-center">Duration Book</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td class="text-center"><?php echo e($row->name); ?></td>
                            <td class="text-center"><?php echo e($row->apartement_name); ?></td>
                            <td class="text-center"><?php echo e($row->dateFrom); ?></td>
                            <td class="text-center"><?php echo e($row->dateTo); ?></td>
                            <td class="text-center">
                                <?php 
                                    $from = date_create($row->dateFrom);
                                    $to = date_create($row->dateTo);
                                    $diff = date_diff($from, $to);
                                ?>

                                <?php echo e($diff->d . ' Hari'); ?>

                            </td>
                            <td class="text-center">
                                <form action="<?php echo e(url('apartement/delete/' . $row->uniq_id)); ?>" onsubmit="return confirm('Hapus data ?')" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field("delete"); ?>
                                    <a href="<?php echo e(url('apartement/edit/' . $row->uniq_id)); ?>" class="btn btn-success">Edit</a> | <button class="btn btn-danger" type="submit">Hapus</button></td>
                                </form>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
  <table class="table" id="table" style="display: none;">
    <thead >
        <th class="text-center">No</th>
        <th class="text-center">Name</th>
        <th class="text-center">Apartement Name</th>
        <th class="text-center">dateFrom</th>
        <th class="text-center">dateTo</th>
        <th class="text-center">Duration Book</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="text-center"><?php echo e($loop->iteration); ?></td>
            <td class="text-center"><?php echo e($row->name); ?></td>
            <td class="text-center"><?php echo e($row->apartement_name); ?></td>
            <td class="text-center"><?php echo e($row->dateFrom); ?></td>
            <td class="text-center"><?php echo e($row->dateTo); ?></td>
            <td class="text-center">
                <?php 
                    $from = date_create($row->dateFrom);
                    $to = date_create($row->dateTo);
                    $diff = date_diff($from, $to);
                ?>

                <?php echo e($diff->d . ' Hari'); ?>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<script>
  function downloadexcel(tableID) {
    var table = document.getElementById(tableID);
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent(table.outerHTML));
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout._app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\test2\resources\views/apartement/index.blade.php ENDPATH**/ ?>