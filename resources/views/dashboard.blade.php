@extends('layouts.master')


@section('title')
    {{ trans('Grades_trans.title_page') }}
@stop


@section('PageTitle')
    {{ trans('main_trans.Grades') }}
@stop
@section('content')

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                                    <span class="text-primary">
                                        <i class="fa fa-graduation-cap highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-left text-left">
                            <h3 class="card-text text-dark"><a href="{{route('Students.index')}}">الطلاب</a></h3>
                            <h4>{{$studants->count()}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                                    <span class="text-info">
                                        <i class="fa fa fa-pencil-square highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-left text-left">
                            <h3 class="card-text text-dark"><a href="{{route('manger.index')}}">المشرفين</a></h3>
                            <h4>{{$manger->count()}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                                    <span class="text-success">
                                        <i class="fa fa-file-pdf-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-left text-left">
                            <h3 class="card-text text-dark"><a href="{{route('books.index')}}">المكتبة</a></h3>
                            <h4>{{$Books->count()}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                                    <span class="text-danger">
                                        <i class="fa fa-heart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-left text-left">
                            <h3 class="card-text text-dark"><a href="{{route('programs.index')}}">البرامج</a></h3>
                            <h4>{{$programs->count()}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>
    @if (auth()->user()->hasPermission('edit_school'))

        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                                    <span class="text-primary">
                                        <i class="fa fa-life-saver highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-left text-left">
                            <h3 class="card-text text-dark"><a href=#>مدارس المشرف : </a></h3>
                            <h4>{{$studants->count()}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endif
    <div class="row container">
        <br>
        <h3>اجراءات الطلاب :</h3>
        <br>
        <div class="table-responsive ">
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0 print"
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
                    <th>{{trans('Students_trans.Processes')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($student_problems as $student)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->Id_Number}}</td>
                        <td>{{$student->porn_address}}</td>
                        <td>{{$student->student_phone}}</td>
                        <td>{{ $student->grade->Name ?? '---'  }}</td>
                        <td>{{$student->classroom->Name_Class ?? '---' }}</td>
                        <td>

                            <div class="dropdown show">


                                <a class="btn btn-outline-info btn-sm"
                                   href="{{route('Students.problems',$student->id)}}"
                                   role="button"><i
                                        class="fa fa-eye">
                                    </i>&nbsp;
                                </a>
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

                            </div>

                        </td>
                    </tr>
                @include('pages.Students.Delete')
                @endforeach
            </table>
        </div>
        <button class="btn btn-info print_ptn">طباعة</button>
    </div>
@endsection
@section('js')

    @toastr_js
    @toastr_render
    <script>
        $(document).on('click', '.print_ptn', function () {

            $('.print').printThis({

                debug: true,               // show the iframe for debugging
                importCSS: true,            // import parent page css
                importStyle: true,         // import style tags
                printContainer: true,       // print outer container/$.selector
                loadCSS: "{{asset('assets/css/print.css')}}",                // path to additional css file - use an array [] for multiple
                pageTitle: "",              // add title to print page
                removeInline: false,        // remove inline styles from print elements
                removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
                printDelay: 333,            // variable print delay
                footer: null,               // postfix to html
                base: false,                // preserve the BASE tag or accept a string for the URL
                formValues: false,           // preserve input/form values
                canvas: false,              // copy canvas content
                doctypeString: '...',       // enter a different doctype for older markup
                removeScripts: false,       // remove script tags from print content
                copyTagClasses: false,      // copy classes from the html & body tag
                beforePrintEvent: null,     // function for printEvent in iframe
                beforePrint: null,          // function called before iframe is filled
                afterPrint: null,          // function called before iframe is removed
                header: ` <div class="row" style="margin: 20px 0">
                <div class="col-md-4">
                    <h5>المملكة العربية السعودية </h5>
                    <h5>وزارة التعليم </h5>
                    <h5>ادرة التعليم بالطائف </h5>

                    <h5>التوجيه والارشاد</h5>
                </div>
                <div class="col-md-4" style="overflow: hidden">
                    <img style="width: 100%;height: 100%" src="{{asset('assets/images/education.jpg')}}">
                </div>
                <div class="col-md-4" style="overflow: hidden">
                    <img src="{{asset('assets/images/vison.png')}}" style="width: 100%;height: 100%">

                </div>
                <p class="onwaan">استمارة اجراءات الطلاب</p>
            </div>`


            });

        });
    </script>
@endsection
