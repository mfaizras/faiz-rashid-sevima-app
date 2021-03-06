<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseDetail;
use App\Models\CourseActivity;
use App\Models\UserCourseActivity;

class CourseActivityController extends Controller
{
    public function index()
    {
        return view('kursus.index', [
            'datas' => Course::all()
        ]);
    }

    public function detail(Course $course)
    {
        $courseDetail = CourseDetail::all()->where('course_id', $course->id);
        $courseCheck = CourseActivity::where('course_id', $course->id)->where('user_id', auth()->user()->id)->get();


        return view('kursus.detail', [
            'datas' => $course,
            'details' => $courseDetail
        ]);
    }

    public function joinCourse(Course $course)
    {
        $courseCheck = CourseActivity::where('course_id', $course->id)->where('user_id', auth()->user()->id)->get();

        if (!isset($courseCheck['status']) || $courseCheck['status'] == 'not_joined') {
            CourseActivity::create([
                'user_id' => auth()->user()->id,
                'course_id' => $course->id,
                'status' => 'joined'
            ]);

            return redirect('/kursus/' . $course->id);
        } else {
            return redirect('/kursus/detail/' . $course->id);
        }
    }

    public function courseMateri(Course $course)
    {
        $courseDetail = CourseDetail::all()->where('course_id', $course->id);
        $courseCheck = CourseActivity::all()->where('course_id', $course->id)->where('user_id', auth()->user()->id);
        return view('kursus.materi', [
            'datas' => $course,
            'details' => $courseDetail
        ]);
    }
    public function courseMateriDetail(Course $course, CourseDetail $detail)
    {
        $courseList = CourseDetail::all()->where('course_id', $course->id);
        if ($detail->course_id != $course->id) {
            return redirect('/kursus/' . $course->id);
        } else {
            return view('kursus.materidetail', [
                'datas' => $course,
                'details' => $detail,
                'lists' => $courseList->all()
            ]);
        }
    }

    public function create()
    {
        return view('kursus.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_name' => 'required',
            'course_description' => 'required'
        ]);
        $validatedData['creator'] = auth()->user()->id;
        $validatedData['visibility'] = $request['visibility'];

        Course::create($validatedData);

        return redirect('/mycourse');
    }

    public function courselist()
    {
        return view('kursus.list', [
            'datas' => Course::where('creator', auth()->user()->id)->get()

        ]);
    }

    public function courses()
    {
        return view('kursus.edit');
    }
}
