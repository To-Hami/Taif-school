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
                href="{{route('home')}}"
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
                    <a href="{{route('rules')}}" target="_blank" class="nav-item nav-link">قواعد السلوك والمواظبة</a>
                    <a href="{{route('plans')}}" target="_blank" class="nav-item nav-link">خطة التوجية والارشاد</a>
                    <a href="{{route('library')}}" class="nav-item nav-link"> مكتبة والارشاد</a>
                </div>
                <a href="{{$detail->location}}" class="btn btn-primary px-4" target="_blank">موقعنا </a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Facilities Start -->
    <div class=" container bg-primary  m-10" style="margin-top: 50px;color: #f2f2f2">
        <table class="table table-striped" style="color: #f2f2f2 !important;">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان المرجع</th>
                <th scope="col">التفاصيل</th>
                <th scope="col">المزيد</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <th>{{$book->id}}</th>
                    <td>{{$book->name}}</td>
                    <td> {{$book->details}}</td>
                    <td>
                        <a class="btn btn-outline-info btn-sm" style="color: white;"
                           href="{{route('image',$book->id)}}"
                           target="_blank"
                           role="button"><i class="fa fa-eye"></i>&nbsp;
                            عرض الصورة </a>
                        <a class="btn btn-outline-info btn-sm" style="color: white;"
                           href="{{route('books.view',$book->id)}}"
                           target="_blank"
                           role="button"><i class="fa fa-file-pdf"></i>&nbsp;
                            عرض pdf </a>

                        <a class="btn btn-outline-info btn-sm" style="color: white;"
                           href="{{route('books.download',$book->id)}}"
                           role="button"><i
                                class="fa fa-download"></i>&nbsp;
                            تحميل</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- Facilities Start -->


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
