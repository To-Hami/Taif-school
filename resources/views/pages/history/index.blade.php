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

                            <form method="post" action="{{ route('history.update',$history->id) }}"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('patch')}}

                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>اسم المدرسة : <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{$history->name   ?? '---'}}">
                                            <input type="hidden" name="id" class="form-control"
                                                   value="{{$history->id   ?? ''}}">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="col-md-4">
                                        <label for="title"> المرحلة الدراسية :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control"
                                                   value="{{$history->grade   ?? ''}}"
                                                   name="grade" required/>
                                        </div>
                                        @error('grade')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="title"> اسم مدير المدرسة :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control"
                                                   name="manager_name" value="{{$history->manager_name   ?? ''}}"
                                                   required/>
                                        </div>
                                        @error('manager_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label for="title"> البريد الالكتروني :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control"
                                                   name="manager_email" required
                                                   value="{{$history->manager_email   ?? ''}}"/>
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

                                            <input type="number" value="{{$history->number   ?? ''}}"
                                                   class=" form-control"
                                                   name="number" required/>
                                        </div>
                                        @error('number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label for="title">  منطقة المدرسة :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control"
                                                   name="region" required
                                                   placeholder="شمال الطائف مثلا "
                                                   value="{{$history->region }}"/>
                                        </div>
                                        @error('region')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6" style="margin-top: 10px">
                                        <label for="title">   اسم الموجه الطلابي :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control"
                                                   name="direct" required

                                                   value="{{$history->direct   ?? ''}}"/>
                                        </div>
                                        @error('direct')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6" style="margin-top: 10px">
                                        <label for="title"> موقع المدرسة : حدد الموقع من الخريطة <a target="_blank"
                                                                      style="color: #17a2b8;cursor: pointer;border: 2px solid #17a2b8;border-radius: 5px;"
                                         href="https://www.google.com/maps/@31.224111,29.954886,11z?hl=ar">هنا</a>

                                        </label>
                                        <div class='input-group'>

                                            <input type="text" class="form-control"
                                                   value="{{$history->location  ?? ''}}   " name="address">
                                        </div>
                                        @error('text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="attachment"><h5>أضف مرجع قواعد السلوك والمواظبة :</h5></label>
                                            <div style="height: 50px;background-color: #f2f2f2;color: #0b0b0b;
                                              border: 2px solid #17a2b8;position: relative;z-index: 1;border-radius: 20px ">
                                        <span style="position:absolute;display: block;margin: 10px 20px 0 0 ">
                                            أضغط لرفع  المرجع
                                            <i class="fa fa-file-pdf"></i>
                                        </span>
                                                <input style="width: 100%;height: 100%;opacity: 0"
                                                       type="file" name="attachment_slook"  class="form-control"
                                                       accept=".pdf,.jpg, .png, image/jpeg, image/png">
                                            </div>
                                            {{--                                            <input type="file" name="attachment" class="form-control"--}}
                                            {{--                                                   accept=".pdf,.jpg, .png, image/jpeg, image/png">--}}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="attachment"><h5>أضف خطة التوجية والارشااد :</h5></label>
                                            <div style=";height: 50px;background-color: #f2f2f2;color: #0b0b0b;
                                              border: 2px solid #17a2b8;position: relative;z-index: 1;border-radius: 20px ">
                                        <span style="position:absolute;display: block;margin: 10px 20px 0 0 ">
                                            أضغط لرفع  المرجع
                                            <i class="fa fa-file-pdf"></i>
                                        </span>
                                                <input style="width: 100%;height: 100%;opacity: 0"
                                                       type="file" name="attachment_ershad"  class="form-control"
                                                       accept=".pdf,.jpg, .png, image/jpeg, image/png">
                                            </div>
                                            {{--                                            <input type="file" name="attachment" class="form-control"--}}
                                            {{--                                                   accept=".pdf,.jpg, .png, image/jpeg, image/png">--}}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="photos"><h5>أضف صوره الاعلان :</h5></label>
                                            <div style="width: 500px;height: 50px;background-color: #f2f2f2;color: #0b0b0b;
                                        border: 2px solid #17a2b8;position: relative;z-index: 1;border-radius: 20px ">
                                        <span style="position:absolute;display: block;margin: 10px 20px 0 0 ">
                                            أضغط لرفع  الصوره
                                            <i class="fa fa-image"></i>
                                        </span>
                                                <input style="width: 100%;height: 100%;opacity: 0"
                                                       type="file" name="adds" multiple class="form-control">
                                            </div>
                                        </div>
                                    </div>


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
