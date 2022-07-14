@extends('layouts.master')
@section('css')
    @toastr_css

@endsection
@section('page-header')
    <!-- breadcrumb -->

@section('title')
    تفاصيل المدرسة
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <h3 style="margin: 10px"> تفاصيل المدرسة :</h3>
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

                            <form method="post" action="{{ route('history.store') }}"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('post')}}

                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>اسم المدرسة : <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="col-md-4 ">
                                        <label for="title"> المرحلة الدراسية :</label>
                                        <select class="form-control" >
                                            @foreach($grades as $grade)
                                                <option value="$grade->id">
                                                    {{$grade->Name}}
                                                    </option>
                                                @endforeach
                                        </select>




                                        @error('grade')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="title"> اسم مدير المدرسة :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control"
                                                   name="manager_name" />
                                        </div>
                                        @error('manager_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label for="title"> البريد الالكتروني :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control"
                                                   name="manager_email" />
                                        </div>
                                        @error('manager_email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{--                                    <div class="col-md-4">--}}
                                    {{--                                        <label for="title"> الجوال :</label>--}}
                                    {{--                                        <div class='input-group'>--}}

                                    {{--                                            <input type="number" value="{{$history->manager_phone}}"--}}
                                    {{--                                                   class="  form-control"--}}
                                    {{--                                                   name="manager_phone" required/>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        @error('manager_phone')--}}
                                    {{--                                        <div class="alert alert-danger">{{ $message }}</div>--}}
                                    {{--                                        @enderror--}}
                                    {{--                                    </div>--}}


                                    <div class="col-md-4">
                                        <label for="title"> الرقم الوزاري :</label>
                                        <div class='input-group'>

                                            <input type="number"  class=" form-control"
                                                   name="number" />
                                        </div>
                                        @error('number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-md-4" >
                                        <label for="title"> موقع المدرسة : حدد الموقع من الخريطة   <a target="_blank" style="color: #17a2b8;cursor: pointer;border: 2px solid #17a2b8;border-radius: 10px;" href="https://www.google.com/maps/@31.224111,29.954886,11z?hl=ar">هنا</a>

                                        </label>
                                        <div class='input-group'>

                                            <input type="text" class="form-control"
                                                   id="location" placeholder="  " name="address">
                                        </div>
                                        @error('text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

we

                                    @if (auth()->user()->hasPermission('edit_history'))
                                        <div class="col-md-10" style="margin-top: 20px">
                                            <button
                                                class="btn btn-success btn-lg nextBtn btn-lg pull-right"
                                                type="submit">{{trans('Students_trans.submit')}}
                                            </button>
                                        </div>
                                    @endif
                                </div>

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

                    $('.print').printThis();

                });
            </script>


            @toastr_js
            @toastr_render
@endsection
