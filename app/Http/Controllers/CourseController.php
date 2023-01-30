<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseClass;
use App\MCourse;
use App\MCourseType;
use App\MDifficultyType;
use App\MTutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'course_manage')) {
            return redirect('/');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!check_user_access(Session::get('user_access'), 'course_manage')) {
            return redirect('/');
        }

        return view('course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_user_access(Session::get('user_access'), 'course_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        $data['difficulty'] = MDifficultyType::all();
        $data['tutor'] = MTutor::all();
        $data['course_type'] = MCourseType::all();
        return view('course.course', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!check_user_access(Session::get('user_access'), 'course_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $course = new Course();
        $course->name = $summary->name;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = md5($summary->name . strtotime('now')) . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/course/';
            $file->move($path, $filename);
            $course->image = $filename;
        }
        
        $course->slug = $summary->slug;
        $course->description = $summary->description;
        $course->status = $summary->status;
        $course->id_m_course_type = $summary->id_m_course_type;
        $course->id_m_difficulty_type = $summary->id_m_difficulty_type;
        $course->created_id = Auth::id();
        $course->updated_id = Auth::id();


        $course->save();


        if (count($summary->tutors) > 0) {
            foreach ($summary->tutors as $tutor) {
                $course->tutors()->attach($tutor);
            }
        }


        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!check_user_access(Session::get('user_access'), 'course_read')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['course'] = Course::find($id);
        return view('course.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_user_access(Session::get('user_access'), 'course_update')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['actions'] = 'update';
        $data['course'] = Course::find($id);
        $data['difficulty'] = MDifficultyType::all();
        $data['tutor'] = MTutor::all();
        $data['course_type'] = MCourseType::all();
        return view('course.course', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!check_user_access(Session::get('user_access'), 'course_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id = base64_decode($id);

        $course = Course::find($id);
        $course->name = $summary->name;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = md5($summary->name . strtotime('now')) . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/course/';

            if (File::exists($path . $course->image) && $course->image != '') {
                unlink($path . $course->image);
            }

            $file->move($path, $filename);
            $course->image = $filename;
        }

        $course->slug = $summary->slug;
        $course->description = $summary->description;
        $course->status = $summary->status;
        $course->id_m_course_type = $summary->id_m_course_type;
        $course->id_m_difficulty_type = $summary->id_m_difficulty_type;
        $course->updated_id = Auth::id();
        $course->save();

        $course->tutors()->detach();

        if (count($summary->tutors) > 0) {
            foreach ($summary->tutors as $tutor) {
                $course->tutors()->attach($tutor);
            }
        }

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datatable(Request $request)
    {
        $search  = $_GET['search']['value'];
        $columns = $request->input('columns');

        $search_column = array(
            "id" => (isset($columns[1]['search']['value'])) ? $columns[1]['search']['value'] : "",
            "name" => (isset($columns[2]['search']['value'])) ? $columns[2]['search']['value'] : "",
            "description" => (isset($columns[3]['search']['value'])) ? $columns[3]['search']['value'] : "",
            "course_type" => (isset($columns[4]['search']['value'])) ? $columns[4]['search']['value'] : "",
            "difficulty" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
            "status" => (isset($columns[6]['search']['value'])) ? $columns[6]['search']['value'] : "",
            "created_at" => (isset($columns[7]['search']['value'])) ? $columns[7]['search']['value'] : "",
            "user_create" => (isset($columns[8]['search']['value'])) ? $columns[8]['search']['value'] : "",
            "updated_at" => (isset($columns[9]['search']['value'])) ? $columns[9]['search']['value'] : "",
            "user_update" => (isset($columns[10]['search']['value'])) ? $columns[10]['search']['value'] : "",
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order_index = $_GET['order'][0]['column'];
        if ($order_index == 1)
            $order_field = 'id';
        else if ($order_index == 2)
            $order_field = 'name';
        else if ($order_index == 3)
            $order_field = 'description';
        else if ($order_index == 4)
            $order_field = 'course_type';
        else if ($order_index == 5)
            $order_field = 'difficulty';
        else if ($order_index == 6)
            $order_field = 'status';
        else if ($order_index == 7)
            $order_field = 'created_at';
        else if ($order_index == 8)
            $order_field = 'user_create_name';
        else if ($order_index == 9)
            $order_field = 'updated_at';
        else if ($order_index == 10)
            $order_field = 'user_update_name';
        else
            $order_field = 'id';

        $order_ascdesc = $_GET['order'][0]['dir'];

        $course = new Course();

        $sql_total = $course->count();
        $sql_filter = $course->filter(
            $order_field,
            $order_ascdesc,
            $search,
            $search_column,
            $limit,
            $start
        );

        $filter_count = $sql_filter['filter_count'];
        $filter_data = $sql_filter['filter_data'];

        foreach ($filter_data as $value) {
            $row = array();

            $action = '';
            if (check_user_access(Session::get('user_access'), 'course_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('courses.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'course_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('courses.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }
            if (check_user_access(Session::get('user_access'), 'course_class_manage')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('course_classes.index', base64_encode($value->id)) . "'><i class='fa fa-fw fa-gear'></i> Manage Class</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->name;
            $row[] = $value->description;
            $row[] = $value->course_type;
            $row[] = $value->difficulty;
            $row[] = $value->status == 1 ? "<a class='ui green label' style='font-size: 10px;'>Aktif</a>" : "<a class='ui red label' style='font-size: 10px;'>Tidak Aktif</a>";
            $row[] = date('d-m-Y H:i:s', strtotime($value->created_at));
            $row[] = $value->user_create_name;
            $row[] = date('d-m-Y H:i:s', strtotime($value->updated_at));
            $row[] = $value->user_update_name;

            $data[] = $row;
        }

        if ($filter_count == 0) {
            $data = 0;
        }

        $callback = array(
            'draw' => $_GET['draw'],
            'recordsTotal' => $sql_total,
            'recordsFiltered' => $filter_count,
            'data' => $data
        );
        header('Content-Type: application/json');
        return $callback;
    }

    public function getById(Request $request)
    {
        $id_course = base64_decode($request->id_course);
        $course = Course::find($id_course);
        $course->class = CourseClass::where('id_course', $course->id)->where('status', 1)->orderBy('id', 'desc')->first();

        return $course;
    }

    function filter($keyword)
    {
        $course_class = CourseClass::where('status', 1)->distinct('id_course')->pluck('id_course');

        $course = Course::select('id', 'name as label')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->where('id_m_course_type', 1)
            ->where('status', 1)
            ->whereIn('id', $course_class)
            ->get()->toArray();
        return json_encode($course);
    }

}
