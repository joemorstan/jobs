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

    public function addResume($id)
    {
        $user = Sentinel::getUser();
        $resume = Resume::find($id);

        $user->favoriteResumes()->attach($resume);

        return back();
    }

    public function removeResume($id)
    {
        $user = Sentinel::getUser();
        $resume = Resume::find($id);

        $user->favoriteResumes()->detach($resume);

        return back();
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
