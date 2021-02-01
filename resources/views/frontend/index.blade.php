@extends('frontend.layouts.app')

@section('title', config('app.name') . ' | ' . __('home'))

@section('content')

<section class=" sucsses-steps">
    <div class="container">
        <div class="row text-white">
            <div class="col-md-12 text-center steps-title">3 خطوات نحو حياة افضل </div>

            <div class="col-md-2 margin-md-16  sucsses-step active">اختار المعالج</div>
            <div class="col-md-1 seprator"></div>

            <div class="col-md-2  sucsses-step">حدد التاريخ والوقت</div>
            <div class="col-md-1 seprator"></div>

            <div class="col-md-2  sucsses-step">أكمل عملية الدفع</div>
        </div>
    </div>
</section>

{{-- start search section --}}

<section class="search-inputs">


    <div class="container">
    <form action="{{ url('/search') }}" method="get">
        <div class="row">

                <div class="col-md-3  col-padding">
                  <button  class= "btn btn-search rounded-top sm-no-border-radius d-flex btn"type="submit">بحث الان</button>
    
                </div>

            <div class="col-md-3 mr-md-250 col-padding">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="بحث باسم المعالج" name="therapistName" >

                </div>

            </div>

            <div class="col-md-3 col-padding">
                <div class="form-group">

                    <select class="depart custom-select" name="specialtyName" id="">
                        <option value=""   selected >جميع التخصصات</option>
                        @foreach ($specialties as $specialty)
                        <option value="{{$specialty->specialtyName}}">{{$specialty->specialtyName}}</option>
                            
                        @endforeach
                     
                    </select>
                </div>

            </div>
            <div class="col-md-3 col-padding">
                <div class="form-group">

                    <select class="depart custom-select" name="orderBy" id="">
                        <option   value="" selected>رتب حسب اختر</option>
                        <option value="price_ASC">السعر : من الأقل الي الاعلي</option>
                        <option value="price_DESC">السعر: من الاعلي الي الاقل</option>
                        <option value="rate_DESC">الأعلي تقيم</option>
                    </select>
                </div>

            </div>
            
            
        </div>
    </form>


    </div>


</section>

{{-- end search section --}}


<section class="">

    <div class="container">
        <div class="row">
            {{-- start filter --}}
            <div class="col-md-3 col-padding ">
                <div class="filters">


                    <div class="filters-title rounded-top sm-no-border-radius d-flex">
                        <span class="">التصنيف</span>
                        <span class="clear-filter">مسح التصنيف</span>
                    </div>
                    {{-- filters body --}}
                    <div class="filters-body">
                        <div class=" times-text d-flex align-items-center">
                            <span class=""><i class="fa fa-clock-o" aria-hidden="true"></i> المواعيد المحدده والمده
                            </span>
                        </div>
                        <div class="filter-check-box d-flex">
                            <div class="form-check ">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">اليوم</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">هذا الاسبوع</label>
                            </div>
                        </div>

                        <div class="filter-date">
                            <span>متاح من : اختر ميعاد</span>
                            <input class=" form-control " placeholder="اختر تاريخ">
                        </div>
                        <div class="filter-date">
                            <span>متاح إلى: اختر ميعاد</span>
                            <input class=" form-control " placeholder="اختر تاريخ" disabled>
                        </div>
                        {{-- duration --}}
                        <span class="duration">المده : </span>
                        <div class="filter-check-box d-flex">
                            <div class="form-check ">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">30 دقيقه</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">60 دقيقه</label>
                            </div>
                        </div>
                        {{-- duration --}}
                        {{-- gender --}}
                        <div class="gender">
                            <div class=" times-text d-flex align-items-center">
                                <span class=""><i class="fa fa-venus-mars"></i> الجنس
                                </span>
                            </div>
                            <div class="filter-check-box d-flex">
                                <div class="form-check ">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">30 دقيقه</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">60 دقيقه</label>
                                </div>
                            </div>
                        </div>
                        {{-- end gender --}}
                        {{-- gender --}}
                        <div class="filter-rate">
                            <div class=" times-text d-flex align-items-center">
                                <span class=""><i class="fa fa-star" aria-hidden="true"></i> التقيم
                                </span>
                            </div>
                            <div class="d-flex">
                                <div class="filter-rate-stars ">
                                    @for ($j = 0; $j <5; $j++) <i class="fa fa-star" aria-hidden="true"></i>

                                        @endfor
                                        <span class="">
                                            وما فوق
                                        </span>
                                </div>

                            </div>
                        </div>
                        {{-- end gender --}}

                        {{-- global --}}

                        <div class="global">
                            <div class=" times-text d-flex align-items-center">
                                <span class=""><i class="fa fa-globe" aria-hidden="true"></i> اللغه والبلد
                                </span>
                            </div>


                            <select class="form-control" name="" id="">
                                <option>اختر اللغه</option>
                                <option></option>
                                <option></option>
                            </select>

                            <select class="form-control" name="" id="">
                                <option>اختر البلد</option>
                                <option></option>
                                <option></option>
                            </select>


                        </div>

                        {{--end global --}}

                        {{-- filter price --}}

                        <div class="filter-prices">
                            <div class=" times-text d-flex align-items-center">
                                <span class=""><i class="fa fa-money" aria-hidden="true"></i> تكلفة الجلسة (جنيه)
                                </span>
                            </div>

                            <div class="filter-price">
                                <span>اقل من 150 </span>
                                <span>اقل من من 15 الي 200 </span>
                                <span>من 200 الي 300 </span>
                                <span>من 300 الي 500 </span>
                                <span>اكثر من 500</span>

                            </div>
                        </div>
                        {{-- end filter price --}}


                    </div>
                    {{-- filters body --}}
                </div>

            </div>
            {{-- end filter --}}
            {{-- start section search result --}}
            <div class="col-md-9 search-result">
                <div class="row">
                    <div class=" col-md-4  col-sm-6 col-padding first-card ">

                        {{-- doctor card --}}
                        <div class="card ">
                            <div class="">

                                <img class=""  src="https://www.shezlong.com/ar/assets/images/search/recommendation-card-bg.svg" alt="Card image cap">
                                {{-- <img class="card-img-top"  src="{{ asset('images/therapist_profile/'.$therapist->img ) }}" alt="Card image cap"> --}}
                            </div>
                            <div class="card-body">
                                <div class="text-white choise-doc">
                                    <span>لا أعرف كيفية </span>
                                    <span>اختيار المعالج المناسب؟</span>
                                </div>
                                <div class="d-flex justify-content-center btn-recomend">
                                    <button class="btn text-center btn-orange text-white  " type="submit">ترشيحات شيزلونج</button>
                                </div>
                            </div>
                        </div>
                    </div>


                   @foreach ($therapists as $therapist)
                       
                 
                    <div class=" col-md-4  col-sm-6 col-padding">

                        {{-- doctor card --}}
                        <div class="card">
                            <div class="img-div">

                                <img class="card-img-top"  src="{{ asset(therapist_image_path($therapist->img)) }}" alt="Card image cap">
                                {{-- <img class="card-img-top"  src="{{ asset('images/therapist_profile/'.$therapist->img ) }}" alt="Card image cap"> --}}
                            </div>
                            <div class="card-body">
                                <div class=" d-flex align-items-center justify-content-center">
                                    <div class="card-doc-name ">{{ $therapist->name }}</div>
                                </div>
                                <div class=" d-flex align-items-center justify-content-center">
                                    <div class="card-doc-title "> {{ $therapist->title }} </div>
                                </div>
                                <div class=" d-flex align-items-center justify-content-center card-doc-rates">
                                    <div class="card-doc-stars ">
                                        @for ($j = 0; $j <$therapist->rate; $j++) <span><i class="fa fa-star star"
                                                aria-hidden="true"></i></span>
                                            @endfor
                                    </div>
                                    <div class="rate">
                                        {{ $therapist->rate }} ({{ $therapist->rates_count()}} تقيم )
                                    </div>

                                </div>
                                <div class=" d-flex align-items-center justify-content-center card-doc-speciality">
                                    <div class="">
                                        متخصص فى 
                                    @foreach ($therapist->specialties as $specialty)
                                        {{ $specialty->specialtyName}} , 
                                    @endforeach
                                    </div>

                                </div>

                                <div class=" d-flex align-items-center justify-content-center card-doc-prices">
                                    <div class="card-doc-fees">
                                        <i class="fa fa-money" aria-hidden="true"></i>
                                        جنيه {{ $therapist->price }}

                                    </div>
                                    <div class="card-doc-sessions">
                                        <i class="fa fa-play" aria-hidden="true"></i>
                                        {{$therapist->sessions_count()  }}+ جلسة
                                    </div>

                                </div>

                            </div>
                            <div class="card-doc-buttons d-flex align-items-center justify-content-center">



                                <a href="#" class="card-doc-book ">
                                    الحجز الان
                                </a>

                                <a href="#" class="card-doc-view-profile"> عرض الصفحه الشخصيه</a>


                            </div>
                        </div>
                  
                        {{--end doctor card --}}
                </div> 
                 @endforeach
               

            </div>
            {{-- end search result section --}}
        </div>

    </div>

    </div>


</section>



@endsection