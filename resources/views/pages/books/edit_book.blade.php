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
        <h3> المكتبة :</h3>
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
                        <button class="btn btn-success btn-lg  btn-lg " type="reset" style="margin: 10px 0">
                            تعديل المرجع :
                        </button>
                        <form method="post" action="{{ route('books.update',$book->id) }}"
                              enctype="multipart/form-data">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>اسم المرجع : <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name"
                                               value="{{ $book->name }}">
                                        <input class="form-control" type="hidden" name="id"
                                               value="{{ $book->id }}">
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label> تفاصيل المرجع : <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="details"
                                               value="{{ $book->details }}">
                                        <input class="form-control" type="hidden" name="id"
                                               value="{{ $book->id }}">
                                    </div>

                                </div>



                            </div>
                            <div class="col-md-12 row">
                                @foreach($book->images as $img)
                                    <div class="col-md-4">
                                        <img style="width: 400px;height: 400px" class="img-thumbnail"
                                             src="{{asset('Attachments/books/images/'.$book->id. '/'.$img->images)}}">

                                    </div>
                                @endforeach
                            </div>
                            <button style="margin-top: 100px"
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
