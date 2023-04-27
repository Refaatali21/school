<?php $__env->startSection('css'); ?>

<?php $__env->startSection('title'); ?>
<?php echo e(trans('classes_trans.title_page')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"><?php echo e(trans('classes_trans.title_page')); ?></h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"><?php echo e(trans('classes_trans.home')); ?></a></li>
                <li class="breadcrumb-item active"><?php echo e(trans('classes_trans.title_page')); ?></li>
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
                <?php echo e(trans('classes_trans.add_class')); ?>

            </button>

                <button type="button" class="button x-small" id="btn_delete_all">
                    <?php echo e(trans('classes_trans.delete_checkbox')); ?>

                </button>
            <br><br>

            <form action="<?php echo e(route('filter_classes')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <select class="selectpicker" data-style="btn-info" name="grade_id" required
                            onchange="this.form.submit()">
                        <option value="" selected disabled><?php echo e(trans('classes_trans.search_by_grade')); ?></option>
                        <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </form>


    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
        <div class="card-body">
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th><?php echo e(trans('classes_trans.id')); ?></th>
                    <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                    <th><?php echo e(trans('classes_trans.name_class')); ?></th>
                    <th><?php echo e(trans('classes_trans.name_grade')); ?></th>
                    <th><?php echo e(trans('classes_trans.processes')); ?></th>
                </tr>
            </thead>
            <tbody>


            <?php if(isset($details)): ?>

                        <?php $lists = $details??$classrooms;?>
                    <?php else: ?>

                        <?php $lists = $classrooms; ?>
                    <?php endif; ?>

                <?php $i = 0 ?>
                <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>
                <tr>
                    <td><?php echo e($i); ?></td>
                    <td><input type="checkbox"  value="<?php echo e($classroom->id); ?>" class="box1" ></td>
                    <td><?php echo e($classroom->name_class); ?></td>
                    <td><?php echo e($classroom->grade->name); ?></td>
                    <td>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#edit<?php echo e($classroom->id); ?>"
                    title="<?php echo e(trans('classes_trans.edit')); ?>"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#delete<?php echo e($classroom->id); ?>"
                    title="<?php echo e(trans('classes_trans.delete')); ?>"><i
                    class="fa fa-trash"></i></button>
                    </td>
                </tr>

                <!-- edit_modal_Grade -->
                <div class="modal fade" id="edit<?php echo e($classroom->id); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                <?php echo e(trans('classes_trans.edit_class')); ?>

                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="<?php echo e(route('classrooms.update', 'test')); ?>" method="post">
                                                <?php echo e(method_field('patch')); ?>

                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                            class="mr-sm-2"><?php echo e(trans('classes_trans.name_class')); ?>

                                                            :</label>
                                                        <input id="Name" type="text" name="name"
                                                            class="form-control"
                                                            value="<?php echo e($classroom->getTranslation('name_class', 'ar')); ?>"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="<?php echo e($classroom->id); ?>">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                            class="mr-sm-2"><?php echo e(trans('classes_trans.name_class_en')); ?>

                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="<?php echo e($classroom->getTranslation('name_class', 'en')); ?>"
                                                            name="name_en" required>
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1"><?php echo e(trans('classes_trans.name_grade')); ?>

                                                        :</label>
                                                    <select class="form-control form-control-lg"
                                                            id="exampleFormControlSelect1" name="grade_id">
                                                        <option value="<?php echo e($classroom->grade->id); ?>">
                                                            <?php echo e($classroom->grade->name); ?>

                                                        </option>
                                                        <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($grade->id); ?>">
                                                                <?php echo e($grade->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

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
                            <div class="modal fade" id="delete<?php echo e($classroom->id); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                <?php echo e(trans('classes_trans.delete_class')); ?>

                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo e(route('classrooms.destroy', 'test')); ?>"
                                                method="post">
                                                <?php echo e(method_field('Delete')); ?>

                                                <?php echo csrf_field(); ?>
                                                <?php echo e(trans('classes_trans.warning_grade')); ?>

                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="<?php echo e($classroom->id); ?>">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal"><?php echo e(trans('classes_trans.close')); ?></button>
                                                    <button type="submit"
                                                        class="btn btn-danger"><?php echo e(trans('classes_trans.submit')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>


<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    <?php echo e(trans('classes_trans.add_class')); ?>

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="<?php echo e(route('classrooms.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2"><?php echo e(trans('classes_trans.name_class')); ?>

                                                :</label>
                                            <input class="form-control" type="text" name="name" />
                                        </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2"><?php echo e(trans('classes_trans.name_class_en')); ?>

                                                :</label>
                                            <input class="form-control" type="text" name="name_class" />
                                        </div>


                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2"><?php echo e(trans('classes_trans.name_grade')); ?>

                                                :</label>

                                            <div class="box">
                                                <select class="fancyselect" name="grade_id">
                                                    <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2"><?php echo e(trans('classes_trans.processes')); ?>

                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="<?php echo e(trans('classes_trans.delete_row')); ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="<?php echo e(trans('classes_trans.add_row')); ?>"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(trans('grades_trans.close')); ?></button>
                                <button type="submit"
                                    class="btn btn-success"><?php echo e(trans('grades_trans.submit')); ?></button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>


<!-- حذف مجموعة صفوف -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    <?php echo e(trans('classes_trans.delete_class')); ?>

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo e(route('delete_all')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <?php echo e(trans('classes_trans.warning_grade')); ?>

                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?php echo e(trans('classes_trans.close')); ?></button>
                    <button type="submit" class="btn btn-danger"><?php echo e(trans('classes_trans.submit')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- row closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
@toastr_js
@toastr_render

<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\School\resources\views/pages/myclasses/myclasses.blade.php ENDPATH**/ ?>