<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseModule;
use App\CourseModuleChild;
use App\MModul;
use App\ModulTutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CourseModuleChildController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'course_module_child_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'course_module_child_manage')) {
            return redirect('/');
        }

        $data['id_course_module'] = $id;
        return view('course_module.child.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (!check_user_access(Session::get('user_access'), 'course_module_child_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        $data['id_course_module'] = $id;
        return view('course_module.child.course_module_child', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if (!check_user_access(Session::get('user_access'), 'course_module_child_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id_course_module = base64_decode($id);

        $priority = 1;
        $course_module_parent = CourseModule::find($id_course_module);
        $course_module = CourseModule::where('id_course_module_parent', $id_course_module)->orderBy('priority', 'desc')->first();
        
        if ($course_module != NULL) {
            $priority = $course_module->priority + 1;
        }

        $course_module_child = new CourseModuleChild();
        $course_module_child->name = $summary->name;
        $course_module_child->description = $summary->description;
        $course_module_child->priority = $priority;
        $course_module_child->level = 1;
        $course_module_child->status = $summary->status;
        $course_module_child->id_course = $course_module_parent->id_course;
        $course_module_child->id_course_module_parent = $id_course_module;
        $course_module_child->created_id = Auth::id();
        $course_module_child->updated_id = Auth::id();
        $course_module_child->save();

        return redirect()->route('course_module_childs.index', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $id_child)
    {
        if (!check_user_access(Session::get('user_access'), 'course_module_child_read')) {
            return redirect('/');
        }

        $id_course_module = base64_decode($id);
        $id_child = base64_decode($id_child);

        $data['course_module_child'] = CourseModuleChild::find($id_child);
        return view('course_module.child.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $id_child)
    {
        if (!check_user_access(Session::get('user_access'), 'course_module_child_update')) {
            return redirect('/');
        }

        $id_course_module = base64_decode($id);
        $id_child = base64_decode($id_child);

        $data['actions'] = 'update';
        $data['id_course_module'] = $id;
        $data['course_module'] = CourseModule::find($id_course_module);
        $data['course_module_child'] = CourseModuleChild::find($id_child);
        return view('course_module.child.course_module_child', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id_child)
    {
        if (!check_user_access(Session::get('user_access'), 'course_module_child_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id_child = base64_decode($id_child);

        $course_module_child = CourseModuleChild::find($id_child);
        $course_module_child->name = $summary->name;
        $course_module_child->description = $summary->description;
        $course_module_child->status = $summary->status;
        $course_module_child->updated_id = Auth::id();
        $course_module_child->save();


        return redirect()->route('course_module_childs.index', $id);
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

    public function datatable(Request $request, $id_course_module)
    {
        $search  = $_GET['search']['value'];
        $columns = $request->input('columns');

        $search_column = array(
            "id" => (isset($columns[1]['search']['value'])) ? $columns[1]['search']['value'] : "",
            "name" => (isset($columns[2]['search']['value'])) ? $columns[2]['search']['value'] : "",
            "status" => (isset($columns[3]['search']['value'])) ? $columns[3]['search']['value'] : "",
            "created_at" => (isset($columns[4]['search']['value'])) ? $columns[4]['search']['value'] : "",
            "user_create" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
            "updated_at" => (isset($columns[6]['search']['value'])) ? $columns[6]['search']['value'] : "",
            "user_update" => (isset($columns[7]['search']['value'])) ? $columns[7]['search']['value'] : "",
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order_index = $_GET['order'][0]['column'];
        if ($order_index == 1)
            $order_field = 'id';
        else if ($order_index == 2)
            $order_field = 'name';
        else if ($order_index == 3)
            $order_field = 'status';
        else if ($order_index == 4)
            $order_field = 'created_at';
        else if ($order_index == 5)
            $order_field = 'user_create_name';
        else if ($order_index == 6)
            $order_field = 'updated_at';
        else if ($order_index == 7)
            $order_field = 'user_update_name';
        else
            $order_field = 'id';

        $order_ascdesc = $_GET['order'][0]['dir'];

        $course_module_child = new CourseModuleChild();

        $sql_total = $course_module_child->count();
        $sql_filter = $course_module_child->filter(
            $order_field,
            $order_ascdesc,
            $search,
            $search_column,
            $limit,
            $start,
            $id_course_module
        );

        $filter_count = $sql_filter['filter_count'];
        $filter_data = $sql_filter['filter_data'];

        foreach ($filter_data as $value) {
            $row = array();

            $action = '';
            if (check_user_access(Session::get('user_access'), 'course_module_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('course_module_childs.edit', ['id' => base64_encode($id_course_module), 'id_child'=>base64_encode($value->id)]) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'course_module_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('course_module_childs.show', ['id' => base64_encode($id_course_module), 'id_child' => base64_encode($value->id)]) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->name;
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
}
