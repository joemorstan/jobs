<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use Carbon\Carbon;
use Sentinel;
use App\Resume;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResumeRequest;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Sentinel::getUser();
        $resumes = $user->resumes()->get();

        return view('client.resumes')->with(['resumes'=> $resumes, 'title' => 'My resumes']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::select('id', 'name')->get();

        return view('client.build-resume')->with(['title' => 'Resume builder', 'cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResumeRequest $request)
    {
        $user = Sentinel::getUser();

        $resume = new Resume($request->all());

        if ($request->active) {
            $resume->active = true;
        } else {
            $resume->active = false;
        }

        $user->resumes()->save($resume);

        return redirect()->route('myResumes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resume = Resume::find($id);

        return view('resume')->with([
            'resume' => $resume,
            'title' => $resume->title,
            'user' => Sentinel::getUser(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resume = Resume::find($id);
        $cities = City::select('id', 'name')->get();

        return view('client.edit-resume')->with([
            'resume' => $resume,
            'title' => 'Resume editor',
            'cities' => $cities,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreResumeRequest $request, $id)
    {
        $resume = Resume::find($id);
        $resume->fill($request->all());

        if ($request->active) {
            $resume->active = true;
        } else {
            $resume->active = false;
        }

        $resume->save();

        return back()->with('success', 'Your resume was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resume = Resume::find($id);

        $resume->delete();

        return back();
    }

    public function updateDate($id)
    {
        $resume = Resume::find($id);
        $resume->updated_at = Carbon::now();
        $resume->save();

        return back();
    }
}
