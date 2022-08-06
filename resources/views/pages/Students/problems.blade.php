@extends('layouts.master')
@section('css')
    @toastr_css

@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')

@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <h3> تفاصيل الطالب :</h3>
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="details" style="overflow: hidden">
                        <div class="print">
                            <h3 style="text-align: center;margin: 20px">استمارة توثيق طالب</h3>
                            <div class="row" style="margin: 20px 0">
                                <div class="col-md-4">
                                    <h5>المملكة العربية السعودية </h5>
                                    <h5>وزارة التعليم </h5>
                                    <h5>ادارة التعليم {{$history->region}} </h5>
                                    <h5>مدرسة: {{$history->name}}  </h5>
                                    <h5> المدير :{{$history->manager_name}} </h5>
                                    <h5>التوجيه والارشاد: {{$history->direct}}</h5>
                                </div>
                                <div class="col-md-4" style="overflow: hidden">
                                    <img style="width: 100%;height: 100%" src="{{asset('assets/images/education.jpg')}}" >
                                </div>
                                <div class="col-md-4 image" style="overflow: hidden">
                                    <img style="   width: 80%;  height: 70%;" src="{{asset('assets/images/vison.png')}}" >
                                    <h5> رقم التقرير :{{request()->id}} </h5>
                                    <h5> التاريخ: {{\Illuminate\Support\Facades\Date::today()->format("Y/m/d")}}</h5>

                                </div>
                            </div>

                            <button class="btn btn-success btn-lg  btn-lg " type="reset" style="margin: 10px 0">تفاصيل
                                الطالب
                                الاضافية :
                            </button>


                            <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{trans('Students_trans.name_ar')}} : <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" value="{{$student->name}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{trans('Students_trans.Date_of_Birth')}} :</label>
                                            <input class="form-control" value="{{$student->Date_Birth}}"
                                                   type="text" name="Date_Birth" data-date-format="yyyy-mm-dd">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>العنوان :</label>
                                            <input class="form-control" type="text" value="{{$student->porn_address}}"
                                                   name="porn_address">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bg_id">الجنسية : </label>
                                            <input class="form-control" type="text" value="{{$student->nationality}}"
                                                   name="nationality">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>الهوية :</label>
                                            <input class="form-control" type="text" value="{{$student->Id_Number}}"
                                                   name="Id_Number">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>اسم الوالد :</label>
                                            <input class="form-control" type="text" value="{{$student->father}}"
                                                   name="father">
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> جوال الطالب :</label>
                                            <input class="form-control" type="text" value="{{$student->student_phone}}"
                                                   name="student_phone">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>  الفصل :</label>
                                            <input class="form-control" type="text" value="{{$student->classroom->Name_Class}}"
                                                   name="classroom">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>  المرحلة :</label>
                                            <input class="form-control" type="text" value="{{$student->grade->Name}}"
                                                   name="classroom">
                                        </div>
                                    </div>

                                <button class="btn btn-success btn-lg  btn-lg " type="reset"
                                        style="margin: 10px 10px;position: relative;right: 20px;">
                                    تفاصيل
                                    المشاكل السابقة :
                                </button>

                                <div class="col-md-12 ">

                                    <ul>
                                        @foreach($student->problems as $index=> $problem)
                                            <p class="list_problems">
                                             <span style="border: 3px solid #17a2b8;border-radius: 50%;;width: 31px;
                                               height: 30px; display: inline-block; text-align: center;">
                                                 {{$index + 1 }}
                                             </span>
                                                {{ $problem->pivot->Time . '  ==> '.  $problem->Name . '  ==> ' . $problem->pivot->Notes}}

                                            </p>

                                        @endforeach
                                    </ul>
                                </div>


                            </div>
                            <div class="float-left">
                                <button class="btn btn-success btn-lg  btn-lg " type="reset" style="margin: 10px 0">
                                    مستوي
                                    الاداء الحالي => {{ $student->levels->name ?? 'مبتدئي بدون تقييم'}} </button>

                            </div>
                        </div>
                        <button class="btn btn-success btn-lg  btn-lg btn-floating print_ptn " type="reset"
                                style="margin: 10px 0 ;float: left">
                            طباعة التفاصيل
                        </button>
                    </div>

                    <br>
                        <hr>
                    <div class="addProblem">

                        <form method="POST" action="{{ route('updateProblems',$student->id) }}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf

                            {{ method_field('POST') }}

                            <button class="btn btn-success btn-lg  btn-lg " type="reset" style="margin: 10px 0">اضافة
                                تعديل علي الاداء اوالمشاكل :
                            </button>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Grade_id">المستوي : <span class="text-danger">*</span></label>
                                        <select style="height: 50px" class="custom-select mr-sm-2 form-control"
                                                name="level">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($levels as $level)
                                                <option
                                                    value="{{ $level->id }}" {{ $student->levil_id == $level->id ? 'selected' : ''  }} >{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Classroom_id">المشاكل : <span class="text-danger">*</span></label>
                                        <select style="height: 50px" class="custom-select mr-sm-2 form-control"
                                                name="problem_id">
                                            <option selected disabled>اختر من القائمة ...</option>
                                            @foreach($problems as $problem)
                                                <option value="{{ $problem->id }}">{{ $problem->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label for="title">تاريخ الاحداث :</label>
                                    <div class='input-group'>

                                        <input id="hijri_picker" type="text" class="hijri-date-input  form-control"
                                               name="Joining_Date" required/>
                                    </div>
                                    @error('Joining_Date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="title">تفاصيل المشكلة :</label>
                                    <textarea class='form-control' rows="4" name="problem_details">

                                </textarea>

                                </div>

                                {{--                            --}}


                                {{--                        <div class="col-md-3">--}}
                                {{--                            <div class="form-group">--}}
                                {{--                                <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>--}}
                                {{--                                <select class="custom-select mr-sm-2" name="academic_year">--}}
                                {{--                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>--}}
                                {{--                                    @php--}}
                                {{--                                        $current_year = date("Y");--}}
                                {{--                                    @endphp--}}
                                {{--                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)--}}
                                {{--                                        <option value="{{ $year}}">{{ $year }}</option>--}}
                                {{--                                    @endfor--}}
                                {{--                                </select>--}}
                                {{--                            </div>--}}
                                {{--                        </div>--}}


                            </div>
                            <br>

                            <button class="btn btn-success btn-lg nextBtn btn-lg pull-right"
                                    type="submit">{{trans('Students_trans.submit')}}
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>

        $(function () {

            initDefault();

        });

        function initDefault() {
            $("#hijri_picker").hijriDatePicker({
                hijri: true,
                showSwitcher: false
            });
        }

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
                afterPrint: null  ,          // function called before iframe is removed


            });

        });
    </script>
    @toastr_js
    @toastr_render
@endsection
