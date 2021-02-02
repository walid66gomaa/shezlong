<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Specialty;
use App\Models\Therapist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TherapistController extends Controller
{



	public function search(Request $filters)
	{

		$therapists = (new Therapist)->newQuery();

		if ($filters->has('therapistName') && !empty($filters->therapistName)) {
			//full text search
			$therapists->whereRaw(
				"MATCH(name) AGAINST(?)",
				array($filters->therapistName)
			);
		}

		if ($filters->has('specialtyName') &&  !empty($filters->specialtyName)) {

			$specialty = Specialty::select('id')->where('specialtyName', $filters->specialtyName)->first();
			if ($specialty) {
				$therapists->join('specialty_therapist', 'therapists.id', '=', 'specialty_therapist.therapist_id')
					->where('specialty_therapist.specialty_id', $specialty->id);
			}
		}

		if ($filters->has('orderBy') && !empty($filters->orderBy)) {
			// price_ASC , price_DESC , rate_DESC
			$sortArr = explode('_', $filters->orderBy);
			$therapists->orderBy($sortArr[0], $sortArr[1]);
		}

		$therapists = $therapists->get();
		$specialties = Specialty::all();

		if($filters->ajax())
		{
			
		return response()->json([
			'therapists' => $this->drawResponse($therapists),
			
		]);
	}

	
		return view('frontend.index', compact('therapists', 'specialties'));
	}

	private function drawResponse($therapists)
	{
		$output='';

		$output .=$this->recommenCard();

		foreach ($therapists as $key => $therapist) {
			$output.=
			'<div class=" col-md-4  col-sm-6 col-padding">'.

		
			'<div class="card">'.
				'<div class="img-div">'.

					'<img class="card-img-top"  src="'. asset(therapist_image_path($therapist->img)) .'" alt="Card image cap">'.
				'</div>'.
				'<div class="card-body">'.
					'<div class=" d-flex align-items-center justify-content-center">'.
						'<div class="card-doc-name ">'. $therapist->name .'</div>'.
					'</div>'.
					'<div class=" d-flex align-items-center justify-content-center">'.
						'<div class="card-doc-title ">' . $therapist->title  .'</div>'.
				'	</div>'.
					'<div class=" d-flex align-items-center justify-content-center card-doc-rates">'.
						'<div class="card-doc-stars ">';
							for ($j = 0; $j <$therapist->rate; $j++) {

								$output.='<span><i class="fa fa-star star" aria-hidden="true"></i></span>';
							}
							
							$output.=	'</div>'.
						'<div class="rate">'.
					 $therapist->rate . '('. $therapist->rates_count() . 'تقيم )'.
						'</div>'.

					'</div>'.
					'<div class=" d-flex align-items-center justify-content-center card-doc-speciality">'.
					'	<div class="">
							متخصص فى ';
						foreach ($therapist->specialties as $specialty){

							$output.= $specialty->specialtyName .','; 
						}
						
						$output.=	'</div>'.

				'	</div>

					<div class=" d-flex align-items-center justify-content-center card-doc-prices">
						<div class="card-doc-fees">
							<i class="fa fa-money" aria-hidden="true"></i>'.
							'جنيه' . $therapist->price .

						'</div>
						<div class="card-doc-sessions">
							<i class="fa fa-play" aria-hidden="true"></i>'.
							$therapist->sessions_count(). '+ جلسة'.
				'		</div>

					</div>

				</div>
				<div class="card-doc-buttons d-flex align-items-center justify-content-center">



					<a href="#" class="card-doc-book ">
						الحجز الان
					</a>

					<a href="#" class="card-doc-view-profile"> عرض الصفحه الشخصيه</a>


				</div>
			</div>
	  
		
	</div> ' ;
			
			}

			return $output;
			
	}

	private function recommenCard()
	{
		$output ='
		
		<div class=" col-md-4  col-sm-6 col-padding first-card ">

		
		<div class="card ">
			<div class="">

				<img class=""  src="https://www.shezlong.com/ar/assets/images/search/recommendation-card-bg.svg" alt="Card image cap">
				
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
		
		';

		return $output;
	}



}
