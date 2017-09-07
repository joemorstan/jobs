<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\City;
use App\Http\Requests\StoreNewVacancy;
use Sentinel;
use App\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        $user = Sentinel::getUser();
        $vacancies = $user->vacancies()->get();

        return view('employer.vacancies')->with(['title' => 'My vacancies', 'vacancies' => $vacancies]);
    }

    public function create()
    {
        $cities = City::all()->sortBy('name');
        return view('employer.build-vacancy')->with(['title' => 'Vacancy builder', 'cities' => $cities]);
    }

    public function store(StoreNewVacancy $request)
    {
        $user = Sentinel::getUser();

        $vacancy = new Vacancy($request->all());

        if ($request->active) {
            $vacancy->active = true;
        } else {
            $vacancy->active = false;
        }

        $user->vacancies()->save($vacancy);

        return redirect()->to('/dashboard/vacancies');
    }

    public function edit($id)
    {
        $vacancy = Vacancy::find($id);
        $cities = City::all();

        return view('employer.edit-vacancy')->with([
            'cities' => $cities,
            'vacancy' => $vacancy,
            'title' => 'Vacancy editor'
        ]);
    }

    public function update(Request $request, $id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->fill($request->all());

        if ($request->active) {
            $vacancy->active = true;
        } else {
            $vacancy->active = false;
        }

        $vacancy->save();

        return back()->with('success', 'Your vacancy was successfully updated!');
    }

    public function updateDate($id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->updated_at = Carbon::now();
        $vacancy->save();

        return back();
    }

    public function destroy($id)
    {
        $vacancy = Vacancy::find($id);

        $vacancy->delete();

        return back();
    }

    public function show($id)
    {
        $vacancy = Vacancy::find($id);

        return view('vacancy')->with(['vacancy' => $vacancy, 'title' => $vacancy->title]);
    }
}