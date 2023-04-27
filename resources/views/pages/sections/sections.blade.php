@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('sections_trans.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('sections_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('sections_trans.add_section') }}</a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach($listgrades as $grades)

                                <div class="acd-group">
                                    <a href="#"  class="acd-heading">{{ $grades->name }}</a>
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
                                                                    <th>{{ trans('sections_trans.name_section') }}
                                                                    </th>
                                                                    <th>{{ trans('sections_trans.name_class') }}</th>
                                                                    <th>{{ trans('sections_trans.status') }}</th>
                                                                    <th>{{ trans('sections_trans.processes') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach($grades->sections as $list_sections)
                                                                <?php $i++; ?>
                                                                    <tr>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $list_sections->name_section }}</td>
                                                                        <td>{{ $list_sections->classrooms->name_class }}
                                                                        </td>
                                                                        <td>
                                                                            @if($list_sections->status === 'on')
                                                                                <label class="badge badge-success">
                                                                                {{ trans('sections_trans.status_section_ac') }}</label>
                                                                                @else
                                                                                <label class="badge badge-danger">
                                                                                {{ trans('sections_trans.status_section_no') }}</label>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <a href="#"
                                                                            class="btn btn-outline-info btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#edit{{ $list_sections->id }}">{{ trans('sections_trans.edit') }}</a>
                                                                            <a href="#"
                                                                            class="btn btn-outline-danger btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#delete{{ $list_sections->id }}">{{ trans('sections_trans.delete') }}</a>
                                                                        </td>
                                                                    </tr>


                                                                    <!--تعديل قسم جديد -->
                                                                        <div class="modal fade"
                                                                        id="edit{{ $list_sections->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('sections_trans.edit_section') }}
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
                                                                                        action="{{ route('sections.update', 'test') }}"
                                                                                        method="POST">
                                                                                        {{ method_field('patch') }}
                                                                                        {{ csrf_field() }}
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                    name="name_section_ar"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_sections->getTranslation('name_section', 'ar') }}">
                                                                                            </div>

                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                    name="name_section_en"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_sections->getTranslation('name_section', 'en') }}">
                                                                                                <input id="id"
                                                                                                    type="hidden"
                                                                                                    name="id"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_sections->id }}">
                                                                                            </div>

                                                                                        </div>
                                                                                        <br>


                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">{{ trans('sections_trans.name_grade') }}</label>
                                                                                            <select name="grade_id"
                                                                                                    class="custom-select"
                                                                                                    onclick="console.log($(this).val())">
                                                                                                <!--placeholder-->
                                                                                                <option
                                                                                                    value="{{ $grades->id }}">
                                                                                                    {{ $grades->name }}
                                                                                                </option>
                                                                                                @foreach ($listgrades as $list_grade)
                                                                                                    <option
                                                                                                        value="{{ $list_grade->id }}">
                                                                                                        {{ $list_grade->name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">{{ trans('sections_trans.name_class') }}</label>
                                                                                            <select name="class_id" class="custom-select">
                                                                                            <option
                                                                                                    value="{{ $list_sections->classrooms->id }}">
                                                                                                    {{ $list_sections->classrooms->name_class }}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <div class="form-check">

                                                                                                @if ($list_sections->status === 'on')
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        checked
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                @else
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                @endif
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1">{{ trans('sections_trans.status') }}</label><br>


                                                                                            </div>
                                                                                        </div>


                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">{{ trans('sections_trans.close') }}</button>
                                                                                    <button type="submit"
                                                                                            class="btn btn-danger">{{ trans('sections_trans.submit') }}</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                        id="delete{{ $list_sections->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('sections_trans.delete_section') }}
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
                                                                                        action="{{ route('sections.destroy', 'test') }}"
                                                                                        method="post">
                                                                                        {{ method_field('Delete') }}
                                                                                        @csrf
                                                                                        {{ trans('sections_trans.warning_section') }}
                                                                                        <input id="id" type="hidden"
                                                                                            name="id"
                                                                                            class="form-control"
                                                                                            value="{{ $list_sections->id }}">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">{{ trans('sections_trans.close') }}</button>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-danger">{{ trans('sections_trans.submit') }}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
                                        {{ trans('sections_trans.add_section') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{ route('sections.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="name_section_ar" class="form-control"
                                                    placeholder="{{ trans('sections_trans.section_name_ar') }}">
                                            </div>

                                            <div class="col">
                                                <input type="text" name="name_section_en" class="form-control"
                                                    placeholder="{{ trans('sections_trans.section_name_en') }}">
                                            </div>

                                        </div>
                                        <br>


                                        <div class="col">
                                            <label for="inputName"
                                                class="control-label">{{ trans('sections_trans.name_grade') }}</label>
                                            <select name="grade_id" class="custom-select"
                                                    onchange="console.log($(this).val())">
                                                <!--placeholder-->
                                                <option value="" selected
                                                        disabled>{{ trans('sections_trans.select_grade') }}
                                                </option>
                                                @foreach ($listgrades as $grade)
                                                    <option value="{{ $grade->id }}"> {{ $grade->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col">
                                            <label for="inputName"
                                                class="control-label">{{ trans('sections_trans.name_class') }}</label>
                                            <select name="class_id" class="custom-select">

                                            </select>
                                        </div><br>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('sections_trans.close') }}</button>
                                    <button type="submit"
                                            class="btn btn-danger">{{ trans('sections_trans.submit') }}</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- row closed -->
        @endsection
        @section('js')
            @toastr_js
            @toastr_render
            <script>
                $(document).ready(function () {
                    $('select[name="grade_id"]').on('change', function () {
                        var grade_id = $(this).val();
                        if (grade_id) {
                            $.ajax({
                                url: "{{ URL::to('classes') }}/" + grade_id,
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

@endsection
