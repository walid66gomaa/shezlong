@extends('frontend.layouts.app')

@section('title', config('app.name') . ' | ' . __('home'))
@section('content')
<section   class=" sucsses-steps">
    <div   class="container">
        <div   class="row text-white">
            <div   class="col-md-12 text-center steps-title">3 خطوات نحو حياة افضل </div>

            <div   class="col-md-2 margin-md-16  sucsses-step active">اختار المعالج</div>
            <div   class="col-md-1 seprator"></div>

            <div   class="col-md-2  sucsses-step">حدد التاريخ والوقت</div>
            <div   class="col-md-1 seprator"></div>
            
            <div   class="col-md-2  sucsses-step">أكمل عملية الدفع</div>
        </div>
    </div>
</section>

<section class="">

    <div class="container">
        <div class="row">
           
            {{-- start section search result --}}
            <div class="col-md-9 search-result">
                <div class="row">
                    @for ($i = 0; $i < 6; $i++) <div class="col-md-4 col-padding">

                        {{-- doctor card --}}
                        <div class="card">
                            <div class="img-div">

                                <img class="card-img-top"
                                    src="https://scontent.shezlong.com/therapist_profile_pictures/652606c1683b0de24ac2ea25ed62aa1c.png"
                                    alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <div class=" d-flex align-items-center justify-content-center">
                                    <div class="card-doc-name "> شريف احمد عبد اللطيف</div>
                                </div>
                                <div class=" d-flex align-items-center justify-content-center">
                                    <div class="card-doc-title "> دكتوراه الصحة النفسية والعلاج النفسي </div>
                                </div>
                                <div class=" d-flex align-items-center justify-content-center card-doc-rates">
                                    <div class="card-doc-stars ">
                                        @for ($j = 0; $j <5; $j++) <span><i class="fa fa-star star"
                                                aria-hidden="true"></i></span>
                                            @endfor
                                    </div>
                                    <div class="rate">
                                        4.25 (306 تقيم )
                                    </div>

                                </div>
                                <div class=" d-flex align-items-center justify-content-center card-doc-speciality">
                                    <div class="">
                                        متخصص فى اضطراب قلق الفراق، القلق العام، الرهاب الاجتماعي , العلاقات
                                    </div>

                                </div>

                                <div class=" d-flex align-items-center justify-content-center card-doc-prices">
                                    <div class="card-doc-fees">
                                        <i class="fa fa-money" aria-hidden="true"></i>
                                        جنيه 260

                                    </div>
                                    <div class="card-doc-sessions">
                                        <i class="fa fa-play" aria-hidden="true"></i>
                                        1000+ جلسة
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
                @endfor

            </div>
            {{-- end search result section --}}
        </div>

    </div>

    </div>


</section


@endsection