@extends('frontend.layouts.app')

@section('title', config('app.name') . ' | ' . __('home'))
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

@section('content')
@endsection