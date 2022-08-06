@extends('layouts.frontend.master')
@section('content')

    <!-- Navbar Start -->
    <div class="row" style="background-color: #17A2B8;height: 40px;color: #f2f2f2">
        <div class="col" style="float: right;text-align: right;margin: 7px 39px 3px 0;
    font-size: 20px;">
            <a href="{{route('frontend')}}" target="_blank" style="color: #f2f2f2">

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
                href=""
                class="navbar-brand font-weight-bold text-secondary"
                style="font-size: 50px"
            >
                <span class="text-primary">{{$detail->name}}</span>
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
                    <a href="{{route('slook')}}" target="_blank" class="nav-item nav-link">قواعد السلوك والمواظبة</a>
                    <a href="{{route('ershad')}}" target="_blank" class="nav-item nav-link">خطة التوجية والارشاد</a>
                    <a href="{{route('library')}}" class="nav-item nav-link"> مكتبة والارشاد</a>
                </div>
                <a href="{{$detail->location}}" class="btn btn-primary px-4" target="_blank">موقعنا </a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid px-0 px-md-5 mb-5" style="height: 500px  ;
        background-image: url('{{asset('assets/images/slider.jpg')}}');
        background-position: center;
        background-size: contain;
        background-repeat:no-repeat;
        text-align: center;


        ">

    </div>
    <!-- Header End -->
    <!-- Facilities Start -->
    <div id="about" class=" container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">من نحن؟</h3>
            <div class=" text-white">
                <h5 style="margin: 20px 0px !important;text-align: center;"
                    class="m-0 font-weight-bold text-white text-center">نظام الارشاد المدرسي لادراة ومتابعة الطلاب
                    والبرامج التوعوية</h5>
                <p style="    width: 70%;
    text-align: center;
    position: relative;
    right: 14%;">نهدف إلى مساعدة الطالب, لكي يفهم شخصيته ويعرف قدراته, ويحل مشكلاته في إطار التعاليم الإسلامية,ليصل إلى
                    تحقيق التوافق النفسي والتربوي والمهني والاجتماعي وبالتالي يصل إلى تحقيق أهدافه في إطار الأهداف
                    العامة للتعليم في المملكة العربية السعودية. </p>
            </div>
        </div>
    </div>
    <!-- Facilities Start -->


    <!-- Class Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">

                <h1 class="mb-4">رؤيتنا </h1>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="img/class-1.jpg" alt=""/>
                        <div class="card-body text-center">
                            <p class="card-text">
                                نهدف إلى إعداد جيل واثق بقدراته متطلع للأفضل يواكب رؤية المملكة العربية السعودية 2030.
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="img/class-2.jpg" alt=""/>
                        <div class="card-body text-center">
                            <p class="card-text">
                                أن يصبح الجيل قادر علي تحقيق أهدافه وصاحب شخصية و صحة نفسية قوية يتخذ قرارته بقدر
                                امكانياته وحكمته .
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="img/class-3.jpg" alt=""/>
                        <div class="card-body text-center">
                            <p class="card-text">
                                الكشف عن مواهب وقدرات الطلاب وميولهم والمساهمة في تطويرها وتوجيه استثمار تلك المواهب
                                والقدرات . </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Class End -->
    <div class="container-fluid pt-5">
        <div class="container">
            <img style="width: 100%;height: 400px" class="img-thumbnail"
                 src="{{asset('Attachments/setting/adds/'.$detail->adds)}}">
        </div>
    </div>

    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2"> المعرض </span>
                </p>
                <h1 class="mb-4">معرض نشاطات الطلاب </h1>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        <li class="btn btn-outline-primary m-1 active" data-filter="*">
                            الكل
                        </li>
                        <li class="btn btn-outline-primary m-1" data-filter=".first">
                            قراءة
                        </li>
                        <li class="btn btn-outline-primary m-1" data-filter=".second">
                            ابتكار
                        </li>
                        <li class="btn btn-outline-primary m-1 " data-filter=".third">
                            مرح
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container" style="position: relative; height: 294.484px;">
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first"
                     style="position: absolute; left: 0px; top: 0px;">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid w-100" src="{{asset('assets/frontend/img/read1.jpg')}}" style="height: 100%;    height: 200px !important;
" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="{{asset('assets/frontend/img/read1.jpg')}}" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second"
                     style="position: absolute; left: 0px; top: 0px; ">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid w-100" src="{{asset('assets/frontend/img/ebtecar1.jpg')}}"
                             style="width: 100%;    height: 200px !important;" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="{{asset('assets/frontend/img/ebtecar1.jpg')}}" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item third"
                     style="position: absolute; left: 0px; top: 0px;">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid w-100" src="{{asset('assets/frontend/img/fun1.jpg')}}"
                             style="height: 200px !important;" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="{{asset('assets/frontend/img/fun1.jpg')}}" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first"
                     style="position: absolute; left: 379px; top: 0px; ">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid w-100" src="{{asset('assets/frontend/img/read2.jpg')}}"
                             style="width: 100%; height: 100%" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="{{asset('assets/frontend/img/read2.jpg')}}" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second"
                     style="position: absolute; left: 379px; top: 0px;">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid w-100" src="{{asset('assets/frontend/img/ebtecar2.jpg')}}" style="width: 100%;    height: 200px !important;
 ; height: 100%" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="{{asset('assets/frontend/img/ebtecar2.jpg')}}" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item third"
                     style="position: absolute; right: 379px; top: 0px;">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid w-100" src="{{asset('assets/frontend/img/fun2.jpg')}}"
                             style="height: 200px !important;" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="{{asset('assets/frontend/img/fun2.jpg')}}" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 60px"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
