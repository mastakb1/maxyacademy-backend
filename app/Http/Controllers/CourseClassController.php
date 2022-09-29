<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseClass;
use App\CourseClassMember;
use App\CourseClassModule;
use App\CourseModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CourseClassController extends Controller
{

    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'course_class_manage')) {
            return redirect('/');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (!check_user_access(Session::get('user_access'), 'course_class_manage')) {
            return redirect('/');
        }

        $data['id_course'] = $id;
        return view('course.class.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (!check_user_access(Session::get('user_access'), 'course_class_create')) {
            return redirect('/');
        }

        $id_course = base64_decode($id);

        $data['actions'] = 'store';
        $data['id_course'] = $id;
        $data['course'] = Course::find($id_course);
        $last_class = CourseClass::where('id_course', $id_course)->orderBy('batch', 'desc')->first();
        $data['batch'] =  $last_class == NULL ? 1 : $last_class->batch + 1;
        return view('course.class.class', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if (!check_user_access(Session::get('user_access'), 'course_class_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id_course = base64_decode($id);

        $old_class = CourseClass::where('id_course', $id_course)->orderBy('batch', 'desc')->first();
        $batch_no = 1;
        if($old_class != NULL)
        {
            $old_class->status = 0;
            $old_class->save();

            $batch_no = $old_class->batch + 1;
        }

        $course_class = new CourseClass();
        $course_class->batch = $batch_no;
        $course_class->start_date = date('Y-m-d', strtotime(explode(' - ', $summary->date)[0]));
        $course_class->end_date = date('Y-m-d', strtotime(explode(' - ', $summary->date)[1]));
        $course_class->quota = $summary->quota;
        $course_class->status = $summary->status;
        $course_class->created_id = Auth::id();
        $course_class->updated_id = Auth::id();
        $course_class->id_course = $id_course;
        $course_class->save();

        return redirect()->route('course_classes.index', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $id_course_class)
    {
        if (!check_user_access(Session::get('user_access'), 'course_class_read')) {
            return redirect('/');
        }

        $id_course = base64_decode($id);
        $id_course_class = base64_decode($id_course_class);

        $data['course_class'] = CourseClass::find($id_course_class);
        $data['course'] = Course::find($id_course);
        $data['course_class_member'] = CourseClassMember::select('course_class_member.*', 'member.name as member')->join('member', 'member.id', 'course_class_member.id_member')->where('id_course_class', $id_course_class)->get();
        return view('course.class.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $id_course_class)
    {
        if (!check_user_access(Session::get('user_access'), 'course_class_update')) {
            return redirect('/');
        }

        $id_course = base64_decode($id);
        $id_course_class = base64_decode($id_course_class);

        $data['actions'] = 'update';
        $data['id_course'] = $id;
        $data['course'] = Course::find($id_course);
        $data['course_class'] = CourseClass::find($id_course_class);
        $data['batch'] =  $data['course_class']->batch;
        return view('course.class.class', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id_course_class)
    {
        if (!check_user_access(Session::get('user_access'), 'course_class_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id_course_class = base64_decode($id_course_class);

        $course_class = CourseClass::find($id_course_class);
        $course_class->start_date = date('Y-m-d', strtotime(explode(' - ', $summary->date)[0]));
        $course_class->end_date = date('Y-m-d', strtotime(explode(' - ', $summary->date)[1]));
        $course_class->quota = $summary->quota;
        $course_class->status = $summary->status;
        $course_class->updated_id = Auth::id();
        $course_class->save();

        return redirect()->route('course_classes.index', $id);
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

    public function datatable(Request $request, $id_course)
    {
        $search  = $_GET['search']['value'];
        $columns = $request->input('columns');

        $search_column = array(
            "id" => (isset($columns[1]['search']['value'])) ? $columns[1]['search']['value'] : "",
            "batch" => (isset($columns[2]['search']['value'])) ? $columns[2]['search']['value'] : "",
            "start_date" => (isset($columns[3]['search']['value'])) ? $columns[3]['search']['value'] : "",
            "end_date" => (isset($columns[4]['search']['value'])) ? $columns[4]['search']['value'] : "",
            "quota" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
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
            $order_field = 'batch';
        else if ($order_index == 3)
            $order_field = 'start_date';
        else if ($order_index == 4)
            $order_field = 'end_date';
        else if ($order_index == 5)
            $order_field = 'quota';
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

        $course_class = new CourseClass();

        $sql_total = $course_class->count();
        $sql_filter = $course_class->filter(
            $order_field,
            $order_ascdesc,
            $search,
            $search_column,
            $limit,
            $start,
            $id_course
        );

        $filter_count = $sql_filter['filter_count'];
        $filter_data = $sql_filter['filter_data'];

        foreach ($filter_data as $value) {
            $row = array();

            $action = '';
            if (check_user_access(Session::get('user_access'), 'course_class_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('course_classes.edit', ['id' => base64_encode($id_course), 'id_course_class' => base64_encode($value->id)] ) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'course_class_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('course_classes.show', ['id'=> base64_encode($id_course), 'id_course_class' => base64_encode($value->id)] ) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }
            if (check_user_access(Session::get('user_access'), 'course_class_module_manage')){
                $action .= "<a class='btn btn-info btn-xl' href='" . route('course_classes.manage_module', ['id' => base64_encode($id_course), 'id_course_class' => base64_encode($value->id)] ) . "'><i class='fa fa-fw fa-gear'></i> Manage Module</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = 'Batch ' . $value->batch;
            $row[] = date('d F Y', strtotime($value->start_date));
            $row[] = date('d F Y', strtotime($value->end_date));
            $row[] = $value->quota == 0 ? 'Unlimited' : $value->quota;
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

    function filter($keyword)
    {
        $course = Course::selectRaw('course_class.id, CONCAT(course.name, " Bootcamp Batch ", course_class.batch) as label')
            ->join('course_class', 'course_class.id_course', 'course.id')
            ->where('course.name', 'LIKE', '%' . $keyword . '%')
            ->where('course.id_m_course_type', 1)
            ->get()->toArray();
        return json_encode($course);
    }

    public function manage_module($id, $id_course_class)
    {
        $id_course = base64_decode($id);
        $id_course_class = base64_decode($id_course_class);

        $data['id_course'] = $id;
        $data['course_class'] = CourseClass::find($id_course_class);
        $data['course_class_module'] = CourseClassModule::where('id_course_class', $id_course_class)->get();
        $data['course_module'] = CourseModule::where('id_course', $id_course)->whereNull('id_course_module_parent')->get();
        return view('course.class.module.module', compact('data'));
    }

    public function store_module(Request $request,$id, $id_course_class)
    {
        $summary = json_decode($request->summary);
        $id_course_class = base64_decode($id_course_class);

        $delete_old_course_class_module = CourseClassModule::where('id_course_class', $id_course_class)->delete();

        $priority = 1;
        foreach ($summary->modules as $module) {
            if ($module->isActive) {
                $course_class_module = new CourseClassModule();
                $course_class_module->id_course_class = $id_course_class;
                $course_class_module->id_course_module = $module->id;
                $course_class_module->priority = $priority;
                $course_class_module->save();
                $priority++;
            }
        }

        return redirect()->route('course_classes.index', $id);
    }
}
