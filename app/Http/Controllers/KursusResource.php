<?php

namespace App\Http\Controllers;

use App\Models\CourseDetail;
use Illuminate\Http\Request;

use App\Models\Course;
use Illuminate\Contracts\Support\ValidatedData;

class KursusResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $courseid)
    {
        return view('kursus.create.index', [
            'datas' => CourseDetail::where('course_id', $courseid->id)->get(),
            'course' => $courseid
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $courseid)
    {
        return view('kursus.create.create', [
            'course' => $courseid
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $courseid)
    {
        $validatedData = $request->validate([
            'course_title' => 'required',
            'course_content' => 'required'
        ]);
        $validatedData['course_id'] = $courseid->id;
        CourseDetail::create($validatedData);
        return redirect('/mycourse/' . $courseid->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseDetail  $courseDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CourseDetail $courseDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseDetail  $courseDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $courseid, CourseDetail $courseDetail)
    {
        return view('kursus.create.edit', [
            'datas' => $courseDetail,
            'course' => $courseid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseDetail  $courseDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $courseid, CourseDetail $courseDetail)
    {
        $validatedData = $request->validate([
            'course_title' => 'required',
            'course_content' => 'required'
        ]);
        CourseDetail::where('id', $courseDetail->id)->update($validatedData);

        return redirect('/mycourse/' . $courseid->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseDetail  $courseDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $courseid, CourseDetail $courseDetail)
    {
        $id = $courseDetail->id;
        CourseDetail::destroy($courseDetail->id);
        return redirect('/mycourse/' . $id);
    }
}
