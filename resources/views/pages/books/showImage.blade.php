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


                        <div class="row">
                            <div class="col-md-12 row books_images">
                                @foreach($book->images as $img)
                                    <div class="col-md-4" style="width: 250px;height: 250px">
                                        <a href="{{asset('Attachments/books/images/'.$book->id. '/'.$img->images)}}">
                                            <img  class="img-fluid img-thumbnail" style="width: 100%;height: 100%"
                                                  src="{{asset('Attachments/books/images/'.$book->id. '/'.$img->images)}}">
                                        </a>


                                    </div>
                                @endforeach
                            </div>
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

        $(function(){
            $('.books_images').each(function() { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled:true
                    }
                });
            });
        });
    </script>
    @toastr_js
    @toastr_render
@endsection
