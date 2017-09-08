<?php

namespace App\Http\Controllers;

use Sentinel;
use App\Vacancy;
use App\Resume;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function resumes()
    {
        $resumes = Resume::paginate(5);

        return view('resumes')->with([
            'resumes' => $resumes,
            'title' => 'Resumes',
            'user' => Sentinel::getUser(),
        ]);
    }

    public function vacancies()
    {
        $vacancies = Vacancy::paginate(5);

        return view('vacancies')->with([
            'vacancies' => $vacancies,
            'title' => 'Vacancies',
            'user' => Sentinel::getUser(),
        ]);
    }

    public function vacancySearch(Request $request)
    {
        $query = Vacancy::query();

        $query = $query->where('active', true);

        if (!empty($request->city)) {
            $query = $query->where('city_id', $request->city);
        }

        if (!empty($request->keyword)) {
            $query = $query->where('title', 'like', "%{$request->keyword}%");
        }

        $vacancies = $query->paginate(5);

        return view('vacancies')
            ->with([
                'title' => 'My vacancies',
                'vacancies' => $vacancies,
                'user' => Sentinel::getUser(),
            ]);
    }
}
