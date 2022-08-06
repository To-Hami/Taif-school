@extends('layouts.master')
@section('css')
    @toastr_css

@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
اضافة تعمييم
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <h3>اضافة تعميم جديد :</h3>
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
                            <button class="btn btn-success btn-lg  btn-lg " type="reset" style="margin: 10px 0">
                                اضافة تعمييم جديد :
                            </button>
                            <form method="post" action="{{ route('tameem.store') }}"  enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('post')}}

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>عنوان التعمييم : <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <label for="title">  تفاصيل التعمييم :</label>
                                        <textarea class=" form-control"  name="details" rows="5">


                                        </textarea>
                                        @error('details')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="attachment"><h5>أضف مرفق :</h5></label>

                                            <div style="width: 500px;height: 50px;background-color: #f2f2f2;color: #0b0b0b;
                                              border: 2px solid #17a2b8;position: relative;z-index: 1;border-radius: 20px ">
                                        <span style="position:absolute;display: block;margin: 10px 20px 0 0 ">
                                            أضغط لرفع  التعميم
                                            <i class="fa fa-file-pdf"></i>
                                        </span>
                                                <input style="width: 100%;height: 100%;opacity: 0"
                                                       type="file" name="file"  class="form-control"
                                                       accept=".pdf,.jpg, .png, image/jpeg, image/png">
                                            </div>
{{--                                            <input type="file" name="file"  class="form-control" accept=".pdf,.jpg, .png, image/jpeg, image/png">--}}
                                        </div>
                                    </div>


                                </div>

                                <button style="margin-top: 50px"
                                        class="btn btn-success btn-lg nextBtn btn-lg pull-right"
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

                    $('.print').printThis();

                });
            </script>
            @toastr_js
            @toastr_render
@endsection
