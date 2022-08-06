@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.list_students')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_students')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <h3>الطلاب :</h3>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                            <div class="card-body">
                                @if (auth()->user()->hasPermission('edit_grades'))

                                    <a href="{{route('Students.create')}}" class="btn btn-success btn-lg my-2"
                                       role="button"
                                       aria-pressed="true">{{trans('main_trans.add_student')}}
                                    </a>
                                @endif

                                {{--                                    <form action="{{route('filter.classes')}}" method="POST" style="position: relative;left: 20px;float: left;margin-bottom: 10px">--}}
                                {{--                                        {{csrf_field()}}--}}
                                {{--                                        {{method_field('post')}}--}}
                                {{--                                        <select class="selectpicker" data-style="btn-info" name="classroom_id" required="" onchange="this.form.submit()">--}}
                                {{--                                            <option value="" selected="" disabled="">بحث باسم الصف</option>--}}
                                {{--                                            <option value="1">الصف الاول</option>--}}
                                {{--                                            <option value="2">الصف الثاني</option>--}}
                                {{--                                            <option value="3">الصف الثالث</option>--}}
                                {{--                                            <option value="4">الصف الرابع</option>--}}
                                {{--                                            <option value="5">الصف الخامس</option>--}}
                                {{--                                            <option value="6">الصف السادس</option>--}}
                                {{--                                        </select>--}}
                                {{--                                    </form>--}}


                                {{--                                <a href="{{route('Students.import')}}" class="btn btn-success btn-lg" role="button"--}}
                                {{--                                   aria-pressed="true">رفع ملف ايكسل</a>--}}
                                {{--                                <br><br>--}}


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Students_trans.name')}}</th>
                                            <th>الهوية</th>
                                            <th>{{trans('Students_trans.address')}}</th>
                                            <th>رقم الجوال</th>
                                            <th>{{trans('Students_trans.Grade')}}</th>
                                            <th>{{trans('Students_trans.classrooms')}}</th>
                                            <th>{{trans('Students_trans.section')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->Id_Number}}</td>
                                                <td>{{$student->porn_address}}</td>
                                                <td>{{$student->student_phone}}</td>
                                                <td>{{ $student->grade->Name ?? '---'  }}</td>
                                                <td>{{$student->classroom->Name_Class ?? '---' }}</td>
                                                <td>{{$student->sub_classroom_id ?? '---' }}</td>
                                                <td>

                                                    <div class="dropdown show">


                                                        <a class="btn btn-outline-info btn-sm"
                                                           href="{{route('Students.problems',$student->id)}}"
                                                           role="button"><i
                                                                class="fa fa-eye">
                                                            </i>&nbsp;
                                                        </a>
                                                        @if (auth()->user()->hasPermission('edit_grades'))

                                                            <a class="btn btn-outline-success btn-sm"
                                                               href="{{route('Students.edit',$student->id)}}"
                                                               role="button">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-outline-danger btn-sm"
                                                               data-target="#Delete_Student{{ $student->id }}"
                                                               data-toggle="modal"
                                                               href="##Delete_Student{{ $student->id }}"><i
                                                                    class="fa fa-trash"></i>
                                                            </a>
                                                        @endif

                                                    </div>

                                                </td>
                                            </tr>
                                        @include('pages.Students.Delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

    <script>
        $(document).ready(function() {
            $('#datatable_filter input').attr("placeholder", "......search........");


            //datatable_filter
            // datatable_wrapper
            //dataTable

            $('#datatable_filter').dataTable( {
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search ......",
                    sSearchPlaceholder: "Search ......",
                    placeholder: "Search ......",
                }



        } );

        } );
    </script>
@endsection
