<?php $__env->startSection('css'); ?>
    @toastr_css
<?php $__env->startSection('title'); ?>
    <?php echo e(trans('sections_trans.title_page')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
<?php $__env->startSection('PageTitle'); ?>
    <?php echo e(trans('sections_trans.title_page')); ?>

<?php $__env->stopSection(); ?>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        <?php echo e(trans('sections_trans.add_section')); ?></a>
                </div>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            <?php $__currentLoopData = $listgrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grades): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="acd-group">
                                    <a href="#"  class="acd-heading"><?php echo e($grades->name); ?></a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>ID</th>
                                                                    <th><?php echo e(trans('sections_trans.name_section')); ?>

                                                                    </th>
                                                                    <th><?php echo e(trans('sections_trans.name_class')); ?></th>
                                                                    <th><?php echo e(trans('sections_trans.status')); ?></th>
                                                                    <th><?php echo e(trans('sections_trans.processes')); ?></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 0; ?>
                                                                <?php $__currentLoopData = $grades->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_sections): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php $i++; ?>
                                                                    <tr>
                                                                        <td><?php echo e($i); ?></td>
                                                                        <td><?php echo e($list_sections->name_section); ?></td>
                                                                        <td><?php echo e($list_sections->classrooms->name_class); ?>

                                                                        </td>
                                                                        <td>
                                                                            <?php if($list_sections->status === 'on'): ?>
                                                                                <label class="badge badge-success">
                                                                                <?php echo e(trans('sections_trans.status_section_ac')); ?></label>
                                                                                <?php else: ?>
                                                                                <label class="badge badge-danger">
                                                                                <?php echo e(trans('sections_trans.status_section_no')); ?></label>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="#"
                                                                            class="btn btn-outline-info btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#edit<?php echo e($list_sections->id); ?>"><?php echo e(trans('sections_trans.edit')); ?></a>
                                                                            <a href="#"
                                                                            class="btn btn-outline-danger btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#delete<?php echo e($list_sections->id); ?>"><?php echo e(trans('sections_trans.delete')); ?></a>
                                                                        </td>
                                                                    </tr>


                                                                    <!--تعديل قسم جديد -->
                                                                        <div class="modal fade"
                                                                        id="edit<?php echo e($list_sections->id); ?>"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        <?php echo e(trans('sections_trans.edit_section')); ?>

                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                        action="<?php echo e(route('sections.update', 'test')); ?>"
                                                                                        method="POST">
                                                                                        <?php echo e(method_field('patch')); ?>

                                                                                        <?php echo e(csrf_field()); ?>

                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                    name="name_section_ar"
                                                                                                    class="form-control"
                                                                                                    value="<?php echo e($list_sections->getTranslation('name_section', 'ar')); ?>">
                                                                                            </div>

                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                    name="name_section_en"
                                                                                                    class="form-control"
                                                                                                    value="<?php echo e($list_sections->getTranslation('name_section', 'en')); ?>">
                                                                                                <input id="id"
                                                                                                    type="hidden"
                                                                                                    name="id"
                                                                                                    class="form-control"
                                                                                                    value="<?php echo e($list_sections->id); ?>">
                                                                                            </div>

                                                                                        </div>
                                                                                        <br>


                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label"><?php echo e(trans('sections_trans.name_grade')); ?></label>
                                                                                            <select name="grade_id"
                                                                                                    class="custom-select"
                                                                                                    onclick="console.log($(this).val())">
                                                                                                <!--placeholder-->
                                                                                                <option
                                                                                                    value="<?php echo e($grades->id); ?>">
                                                                                                    <?php echo e($grades->name); ?>

                                                                                                </option>
                                                                                                <?php $__currentLoopData = $listgrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <option
                                                                                                        value="<?php echo e($list_grade->id); ?>">
                                                                                                        <?php echo e($list_grade->name); ?>

                                                                                                    </option>
                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label"><?php echo e(trans('sections_trans.name_class')); ?></label>
                                                                                            <select name="class_id" class="custom-select">
                                                                                            <option
                                                                                                    value="<?php echo e($list_sections->classrooms->id); ?>">
                                                                                                    <?php echo e($list_sections->classrooms->name_class); ?>

                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <div class="form-check">

                                                                                                <?php if($list_sections->status === 'on'): ?>
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        checked
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                <?php else: ?>
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                <?php endif; ?>
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1"><?php echo e(trans('sections_trans.status')); ?></label><br>


                                                                                            </div>
                                                                                        </div>


                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal"><?php echo e(trans('sections_trans.close')); ?></button>
                                                                                    <button type="submit"
                                                                                            class="btn btn-danger"><?php echo e(trans('sections_trans.submit')); ?></button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                        id="delete<?php echo e($list_sections->id); ?>"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        <?php echo e(trans('sections_trans.delete_section')); ?>

                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action="<?php echo e(route('sections.destroy', 'test')); ?>"
                                                                                        method="post">
                                                                                        <?php echo e(method_field('Delete')); ?>

                                                                                        <?php echo csrf_field(); ?>
                                                                                        <?php echo e(trans('sections_trans.warning_section')); ?>

                                                                                        <input id="id" type="hidden"
                                                                                            name="id"
                                                                                            class="form-control"
                                                                                            value="<?php echo e($list_sections->id); ?>">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal"><?php echo e(trans('sections_trans.close')); ?></button>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-danger"><?php echo e(trans('sections_trans.submit')); ?></button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                        </div>
                    </div>

                        <!--اضافة قسم جديد -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                        id="exampleModalLabel">
                                        <?php echo e(trans('sections_trans.add_section')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="<?php echo e(route('sections.store')); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="name_section_ar" class="form-control"
                                                    placeholder="<?php echo e(trans('sections_trans.section_name_ar')); ?>">
                                            </div>

                                            <div class="col">
                                                <input type="text" name="name_section_en" class="form-control"
                                                    placeholder="<?php echo e(trans('sections_trans.section_name_en')); ?>">
                                            </div>

                                        </div>
                                        <br>


                                        <div class="col">
                                            <label for="inputName"
                                                class="control-label"><?php echo e(trans('sections_trans.name_grade')); ?></label>
                                            <select name="grade_id" class="custom-select"
                                                    onchange="console.log($(this).val())">
                                                <!--placeholder-->
                                                <option value="" selected
                                                        disabled><?php echo e(trans('sections_trans.select_grade')); ?>

                                                </option>
                                                <?php $__currentLoopData = $listgrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($grade->id); ?>"> <?php echo e($grade->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col">
                                            <label for="inputName"
                                                class="control-label"><?php echo e(trans('sections_trans.name_class')); ?></label>
                                            <select name="class_id" class="custom-select">

                                            </select>
                                        </div><br>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal"><?php echo e(trans('sections_trans.close')); ?></button>
                                    <button type="submit"
                                            class="btn btn-danger"><?php echo e(trans('sections_trans.submit')); ?></button>
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
            <script>
                $(document).ready(function () {
                    $('select[name="grade_id"]').on('change', function () {
                        var grade_id = $(this).val();
                        if (grade_id) {
                            $.ajax({
                                url: "<?php echo e(URL::to('classes')); ?>/" + grade_id,
                                type: "GET",
                                dataType: "json",
                                success: function (data) {
                                    $('select[name="class_id"]').empty();
                                    $.each(data, function (key, value) {
                                        $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                },
                            });
                        } else {
                            console.log('AJAX load did not work');
                        }
                    });
                });

            </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\School\resources\views/pages/sections/sections.blade.php ENDPATH**/ ?>