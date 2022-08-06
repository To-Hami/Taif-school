@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.add_student')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.add_student')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <h3>   اضافة ملف  ايكسل :</h3>
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

                <form method="post"  action="{{ route('classrooms.import.file',[$grade_id,$class_id]) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue"></h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> ملف الاكسيل يجب ان يكون من موقع نور من ايقونة التقارير تقارير الطلاب كشف الطلاب  : <span class="text-danger">*</span></label>
                                    <div style="width: 500px;height: 40px;background-color: #f2f2f2;color: #0b0b0b;
                                        border: 1px solid #17a2b8;position: relative;z-index: 1;border-radius: 20px ">
                                        <span style="position:absolute;display: block;margin: 5px 10px 0 0 ">
                                            أضغط لرفع ملف الطلاب
                                            <i class="fa fa-file-archive-o"></i>
                                        </span>
                                        <input style="width: 100%;height: 100%;opacity: 0"
                                               type="file" name="file"  class="form-control">
                                    </div>

                                    <input  type="hidden" name="id" value="{{$grade_id}}" class="form-control">
                                    <input  type="hidden" name="id" value="{{$class_id}}" class="form-control">
                                </div>
                            </div>
                        </div>




                    <button class="btn btn-success btn-lg nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                </form>

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
        $(function () {

            initDefault();

        });

        function initDefault() {
            $("#hijri-picker").hijriDatePicker({
                hijri:true,
                showSwitcher:false
            });
        }
    </script>

@endsection
