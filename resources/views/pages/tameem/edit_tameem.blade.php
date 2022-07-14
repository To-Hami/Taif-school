@extends('layouts.master')
@section('css')
    @toastr_css

@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    تعديل التعمييم
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <h3> تعديل الملاحظة :</h3>
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
                                تعديل التعمييم  :
                            </button>
                            <form method="post" action="{{ route('tameem.update',$tameem->id) }}"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('put')}}

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label> تعديل الملاحظة : <span
                                                    class="text-danger">*</span></label>

                                            <input type="text" value="{{$tameem->title}}" name="title"
                                                   class="form-control">
                                            <input type="hidden" value="{{$tameem->id}}" name="id"
                                                   class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <label for="title"> تفاصيل التعمييم :</label>
                                        <textarea class=" form-control" name="details" rows="5">
                                                 {{$tameem->details}}

                                        </textarea>
                                        @error('details')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
