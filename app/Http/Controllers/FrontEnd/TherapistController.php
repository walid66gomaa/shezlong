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

		$validated = $filters->validate([
			'therapistName' => 'string',
			'orderBy' => 'string',
			'specialtyName' => 'string',

		]);

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



		return view('frontend.index', compact('therapists', 'specialties'));
	}
}
