<?php $__env->startSection('css'); ?>

<?php $__env->startSection('title'); ?>
<?php echo e(trans('grades_trans.title_page')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"><?php echo e(trans('grades_trans.title_page')); ?></h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('grades_trans.home')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('grades_trans.title_page')); ?></li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- row -->
<div class="row">

<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                <?php echo e(trans('grades_trans.add_Grade')); ?>

            </button>
            <br><br>

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
        <div class="card-body">
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th><?php echo e(trans('grades_trans.id')); ?></th>
                    <th><?php echo e(trans('grades_trans.name')); ?></th>
                    <th><?php echo e(trans('grades_trans.notes')); ?></th>
                    <th><?php echo e(trans('grades_trans.processes')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0 ?>
                <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
                <tr>
                    <td><?php echo e($i); ?></td>
                    <td><?php echo e($grade -> name); ?></td>
                    <td><?php echo e($grade -> notes); ?></td>
                    <td>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#edit<?php echo e($grade->id); ?>"
                    title="<?php echo e(trans('grades_trans.edit')); ?>"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#delete<?php echo e($grade->id); ?>"
                    title="<?php echo e(trans('grades_trans.delete')); ?>"><i
                    class="fa fa-trash"></i></button>
                    </td>
                </tr>

                            <!-- edit_modal_Grade -->
                            <!-- edit_modal_grade -->
                            <div class="modal fade" id="edit<?php echo e($grade->id); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                <?php echo e(trans('grades_trans.edit_Grade')); ?>

                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="<?php echo e(route('grades.update', 'test')); ?>" method="post">
                                                <?php echo e(method_field('patch')); ?>

                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name"
                                                            class="mr-sm-2"><?php echo e(trans('grades_trans.stage_name_ar')); ?>

                                                            :</label>
                                                        <input id="name" type="text" name="name"
                                                            class="form-control"
                                                            value="<?php echo e($grade->getTranslation('name', 'ar')); ?>"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="<?php echo e($grade->id); ?>">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_en"
                                                            class="mr-sm-2"><?php echo e(trans('grades_trans.stage_name_en')); ?>

                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="<?php echo e($grade->getTranslation('name', 'en')); ?>"
                                                            name="name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1"><?php echo e(trans('grades_trans.notes')); ?>

                                                        :</label>
                                                    <textarea class="form-control" name="notes"
                                                        id="exampleFormControlTextarea1"
                                                        rows="3"><?php echo e($grade->notes); ?></textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal"><?php echo e(trans('grades_trans.close')); ?></button>
                                                    <button type="submit"
                                                        class="btn btn-success"><?php echo e(trans('grades_trans.submit')); ?></button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete<?php echo e($grade->id); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                <?php echo e(trans('grades_trans.delete_Grade')); ?>

                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo e(route('grades.destroy' , 'test')); ?>" method="post">
                                                <?php echo e(method_field('Delete')); ?>

                                                <?php echo csrf_field(); ?>
                                                <?php echo e(trans('grades_trans.Warning_Grade')); ?>

                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="<?php echo e($grade->id); ?>">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal"><?php echo e(trans('grades_trans.close')); ?></button>
                                                    <button type="submit"
                                                        class="btn btn-danger"><?php echo e(trans('grades_trans.delete')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    <?php echo e(trans('grades_trans.add_Grade')); ?>

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="<?php echo e(route('grades.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2"><?php echo e(trans('grades_trans.stage_name_ar')); ?>

                                :</label>
                            <input id="Name" type="text" value="<?php echo e(old('name')); ?>" name="name" class="form-control" >
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2"><?php echo e(trans('grades_trans.stage_name_en')); ?>

                                :</label>
                            <input type="text" class="form-control" value="<?php echo e(old('name_en')); ?>" name="name_en" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><?php echo e(trans('grades_trans.notes')); ?>

                            :</label>
                        <textarea class="form-control" name="notes" value="<?php echo e(old('notes')); ?>" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal"><?php echo e(trans('grades_trans.close')); ?></button>
                <button type="submit" class="btn btn-success"><?php echo e(trans('grades_trans.submit')); ?></button>
            </div>
            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- row closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
@toastr_js
@toastr_render
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\School\resources\views/pages/grades/grades.blade.php ENDPATH**/ ?>