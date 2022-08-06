@extends('layouts.frontend.master')
@section('content')

    <!-- Navbar Start -->
    <div class="row" style="background-color: #17A2B8;height: 40px;color: #f2f2f2">
        <div class="col" style="float: right;text-align: right;margin: 7px 39px 3px 0;
    font-size: 20px;">
            <a href="http://127.0.0.1:8000/" target="_blank" style="color: #f2f2f2">

                تسجيل الدخول
            </a>

        </div>
        <div class="col contactus" style="float: left;margin: 7px 39px 8px 24px;
    font-size: 15px;">
            <a href="https://twitter.com/moe_tif_09_0013" target="_blank" style="color: #f2f2f2">
                <i class="fa fa-twitter fa-2x"></i>
            </a>
            <a href="mailto:std.sys.2030@gmail.com" target="_top" style="color: #f2f2f2">
                <i class="fa fa-envelope-o fa-2x"></i>
            </a>
            <a href="https://wa.me/+966560286264" target="_blank" style="color: #f2f2f2">

                <i class="fa fa-whatsapp fa-2x"></i>
            </a>

        </div>
    </div>

    <div class="container-fluid bg-light position-relative shadow">

        <nav
            class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
        >
            <a
                href="{{route('home')}}"
                class="navbar-brand font-weight-bold text-secondary"
                style="font-size: 50px"
            >
                <span class="text-primary">مدرستي</span>
            </a>
            <button
                type="button"
                class="navbar-toggler"
                data-toggle="collapse"
                data-target="#navbarCollapse"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse justify-content-between"
                id="navbarCollapse"
            >
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="{{route('home')}}" class="nav-item nav-link active">الرئيسية</a>
                    <a href="#about" class="nav-item nav-link">من نحن ؟</a>
                    <a href="{{route('rules')}}" target="_blank" class="nav-item nav-link">قواعد السلوك والمواظبة</a>
                    <a href="{{route('plans')}}" target="_blank" class="nav-item nav-link">خطة التوجية والارشاد</a>
                    <a href="{{route('library')}}" class="nav-item nav-link"> مكتبة والارشاد</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <div class="details" style="overflow: hidden">


        <div class="row books_images">

                @foreach($book->images as $img)
                    <div class="col-md-4">
                        <a href="{{asset('Attachments/books/images/'.$book->name . '/'.$img->images)}}">
                            <img  class="img-fluid img-thumbnail"
                                  src="{{asset('Attachments/books/images/'.$book->name . '/'.$img->images)}}">
                        </a>

                    </div>
                @endforeach

        </div>


    </div>

    <!-- Footer Start -->
    <div
        class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">


        <p class="m-0 text-center text-white">
            &copy;
            <a class="text-primary font-weight-bold" target="_blank" href="https://taif-tech.com/"> Taif Tech</a>.
            كافة الحقوق محفوظة لمؤسسة تقني الطائف 2022م


        </p>
    </div>

    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"
    ><i class="fa fa-angle-double-up"></i
        ></a>
@endsection
@push('scripts')
    <script>
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

    @endpush
