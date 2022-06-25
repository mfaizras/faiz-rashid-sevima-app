<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseDetail;
use App\Models\CourseActivity;

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
        $courseDetail = CourseDetail::all();
        $courseCheck = CourseActivity::all()->where('course_id', $course->id)->where('user_id', auth()->user()->id);

        if (!$courseCheck || $courseCheck[0]['status'] == 'not_joined') {
            return view('kursus.detail', [
                'datas' => $course,
                'details' => $courseDetail
            ]);
        } else {
            if ($courseCheck[0]['status'] == 'joined') {
                return redirect('/kursus/' . $course);
            } else {
                return redirect('/kursus');
            }
        }
    }
}
