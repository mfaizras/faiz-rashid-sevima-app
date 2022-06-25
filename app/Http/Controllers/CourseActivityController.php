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

    public function joinCourse(Course $course)
    {
        $courseCheck = CourseActivity::all()->where('course_id', $course->id)->where('user_id', auth()->user()->id);

        if (!$courseCheck || $courseCheck[0]['status'] == 'not_joined') {
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

    public function nextMateri(Course $course, CourseDetail $detail)
    {

        $checkUser = UserCourseActivity::all()->where('user_id', auth()->user()->id)->where('status', '==', 'completed');
        $courseList = CourseDetail::all();
        UserCourseActivity::create([
            'course_id' => $detail->id,
            'user_id' => auth()->user()->id,
            'status' => 'completed'
        ]);
        foreach ($courseList as $list) {
            foreach ($checkUser as $check) {
                if ($list->id != $check->course_id && $list->course_id == $course->id) {

                    return redirect('/kursus/' . $course->id . '/' . $list->course_id);
                }
            }
        }




        // dd($courseList);
        // return redirect('/kursus/' . $course->id . '/' . $courseList[0]->id);
    }
}
