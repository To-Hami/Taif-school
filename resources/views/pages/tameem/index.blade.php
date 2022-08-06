@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    الملاحظات
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    الملاحظات
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <h3>التعامييم :</h3>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">


                                <a href="{{route('tameem.create')}}" class="btn btn-success btn-lg" role="button"
                                   aria-pressed="true">اضافة تعميم جديد : </a><br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان التعمييم</th>
                                            <th> التفاصيل</th>


                                            <th>المزيد</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tameems as $index=>$tameem)
                                            <tr>
                                                <td>{{$index+1 }}</td>
                                                <td>{{$tameem->title}}</td>
                                                <td>{{$tameem->details}}</td>


                                                <td>
                                                    <div class="dropdown show">

                                                            <a class="btn btn-outline-success btn-sm"
                                                               href="{{route('tameem.show',$tameem->id)}}"
                                                               role="button"><i class="fa fa-eye"></i>&nbsp;
                                                                عرض</a>
                                                        <a class="btn btn-outline-success btn-sm"
                                                               href="{{route('tameem.edit',$tameem->id)}}"
                                                               role="button"><i class="fa fa-edit"></i>&nbsp;
                                                                تعديل</a>



                                                        <a data-target="#Delete_Student{{ $tameem->id }}"
                                                           class="btn btn-outline-danger btn-sm"
                                                           data-toggle="modal"
                                                           href="#Delete_Student{{ $tameem->id }}"
                                                               role="button"><i
                                                                    class="fa fa-trash"></i>&nbsp;
                                                                حزف</a>

                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Deleted inFormation Student -->
                                            <div class="modal fade" id="Delete_Student{{$tameem->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title" id="exampleModalLabel">هل انت متأكد
                                                                من رغبتك بالحزف ؟ </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('tameem.destroy',$tameem->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                <input type="hidden" name="id" value="{{$tameem->id}}">


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                                                                    <button
                                                                        class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <!-- row closed -->
@endsection
@section('js')

@endsection
