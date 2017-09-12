<?php

namespace App\Http\Controllers;

use Sentinel;
use App\Resume;
use App\Vacancy;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function addVacancy($id)
    {
        $user = Sentinel::getUser();
        $vacancy = Vacancy::find($id);

        $user->favoriteVacancies()->attach($vacancy);

        return back();
    }

    public function removeVacancy($id)
    {
        $user = Sentinel::getUser();
        $vacancy = Vacancy::find($id);

        $user->favoriteVacancies()->detach($vacancy);

        return back();
    }

    public function favoriteResume($id)
    {
        $user = Sentinel::getUser();
        $resume = Resume::find($id);
        $added = true;

        if ($user->favoriteResumes()->where('resume_id', $id)->first()) {
            $user->favoriteResumes()->detach($resume);
            $added = false;
        } else {
            $user->favoriteResumes()->attach($resume);
        }

        return response()->json(['added' => $added]);
    }

    public function favoriteVacancies()
    {
        $user = Sentinel::getUser();
        $vacancies = $user->favoriteVacancies()->paginate(20);

        return view('client.favorites')
            ->with([
                'title' => 'Favorites',
                'vacancies' => $vacancies
            ]);
    }

    public function favoriteResumes()
    {
        $user = Sentinel::getUser();
        $resumes = $user->favoriteResumes()->paginate(20);

        return view('employer.favorites')
            ->with([
                'title' => 'Favorites',
                'resumes' => $resumes
            ]);
    }
}
