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
    <div class="row ">

        <div class="col-md-12 mb-30 print ">

            <h3 style="background-color: #84ba3f; padding:20px;text-align: center;margin: 20px;color: #f2f2f2">استمارة توثيق برنامج</h3>
            <div class="row" style="margin: 20px 0">
                <div class="col-md-4" style="border: 2px solid #84ba3f ;color: #ada9ae !important; ">
                    <h5 style="color: #544949;margin-bottom: 15px">المملكة العربية السعودية </h5>
                    <h5 style="color: #544949;margin-bottom: 15px">وزارة التعليم </h5>
                    <h5 style="color: #544949;margin-bottom: 15px">ادارة التعليم {{$history->region}} </h5>
                    <h5 style="color: #544949;margin-bottom: 15px">مدرسة: {{$history->name}}  </h5>
                    <h5 style="color: #544949;margin-bottom: 15px"> المدير :{{$history->manager_name}} </h5>
                    <h5 style="color: #544949;margin-bottom: 15px">التوجيه والارشاد: {{$history->direct}}</h5>
                </div>
                <div class="col-md-4" style="border: 2px solid #84ba3f;overflow: hidden">
                    <img style="width: 100%;height: 100%" src="{{asset('assets/images/education.jpg')}}" >
                </div>
                <div class="col-md-4 image" style="border: 2px solid #84ba3f;overflow: hidden">
                    <img style="margin-bottom: 20px;   width: 80%;  height: 70%;" src="{{asset('assets/images/vison.png')}}" >
                    <h5 style="color: #ada9ae"> رقم التقرير :{{request()->id}} </h5>
                    <h5 style="color: #ada9ae"> التاريخ: {{\Illuminate\Support\Facades\Date::today()->format("Y/m/d")}}</h5>

                </div>
            </div>
            <div class="row " style="text-align: center;border: 2px solid #84ba3f ">


                <div class="col-md-2"
                     style="background-color: #84ba3f;color: #ffffff;padding: 20px 10px ;margin-bottom: 5px">عنوان
                    البرنامج
                </div>
                <div class="col-md-4"
                     style="padding: 20px 10px  ;margin-bottom: 5px;border: 2px solid #84ba3f ">{{$programs->name}}</div>
                <div class="col-md-2"
                     style="background-color: #84ba3f;color: #ffffff;padding: 20px 10px;margin-bottom: 5px">مسؤول
                    التنفيذ
                </div>


                <div class="col-md-4"
                     style="padding: 20px 10px;margin-bottom: 5px;border: 2px solid #84ba3f ">{{$programs->manager}}</div>


                <div class="col-md-2"
                     style="background-color: #84ba3f;color: #ffffff;padding: 20px 10px;margin-bottom: 5px">تاريخ
                    البرنامج
                </div>
                <div class="col-md-4"
                     style="padding: 20px 10px;margin-bottom: 5px;border: 2px solid #84ba3f ">{{$programs->date}}</div>
                <div class="col-md-2"
                     style="background-color: #84ba3f;color: #ffffff;padding: 20px 10px;margin-bottom: 5px">المستهدفون
                </div>
                <div class="col-md-4"
                     style="padding: 20px 10px;margin-bottom: 5px;border: 2px solid #84ba3f ">{{$programs->targets}}</div>


                <div class="col-md-2"
                     style=" height:200px ;background-color: #84ba3f;color: #ffffff;padding: 20px 10px;margin-bottom: 5px">تفاصيل
                    البرنامج
                </div>
                <div class="col-md-10"
                     style="padding: 20px 10px;margin-bottom: 5px;border: 2px solid #84ba3f ">{{$programs->details}}</div>


                <div class="col-md-2"
                     style="background-color: #84ba3f;color: #ffffff;padding: 20px 10px;margin-bottom: 5px">رابط الفيديو
                </div>
                <div class="col-md-10" style="padding: 20px 10px;margin-bottom: 5px;border: 2px solid #84ba3f ">
                            <span style="color: #1B1C1D">

                                <a href="{{$programs->video}}">{{$programs->video}}</a>

                            </span>
                </div>
                <div class="col-md-12 row  program_images">
                    @foreach($programs->images as $img)
                        <div class="col-md-4">
                            <a href="{{asset('Attachments/programs/'.$programs->id . '/'.$img->images)}}">
                                <img style="width: 400px;height: 400px"  class="img-fluid my-2 img-thumbnail"
                                     src="{{asset('Attachments/programs/'.$programs->id . '/'.$img->images)}}">
                            </a>
{{--                            <img style="width: 400px;height: 400px" class="img-thumbnail"--}}
{{--                                 src="{{asset('Attachments/programs/'.$programs->name . '/'.$img->images)}}">--}}
                        </div>
                    @endforeach
                </div>


            </div>



        </div>
        <button class="btn btn-success btn-lg  btn-lg btn-floating print_ptn " type="reset"
                style="margin: 10px 0 ;float: left ;background-color: #84ba3f  !important;border: 5px solid #84ba3f;border-radius: 5px">
            طباعة التفاصيل
        </button>
    </div>

@endsection
@section('js')
    <script>

        $(function () {

            initDefault();

        });
        $(function(){
            $('.program_images').each(function() { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled:true
                    }
                });
            });
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
