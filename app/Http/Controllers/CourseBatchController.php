<?php

namespace App\Http\Controllers;

use App\CourseBatch;
use App\MCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CourseBatchController extends Controller
{

    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'course_batch_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'course_batch_manage')) {
            return redirect('/');
        }

        $data['id_m_course'] = $id;
        return view('course.batch.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (!check_user_access(Session::get('user_access'), 'course_batch_create')) {
            return redirect('/');
        }

        $id_m_course = base64_decode($id);

        $data['actions'] = 'store';
        $data['id_m_course'] = $id;
        $data['course'] = MCourse::find($id_m_course);
        $last_batch = CourseBatch::where('id_m_course', $id_m_course)->orderBy('batch', 'desc')->first();
        $data['batch'] =  $last_batch == NULL ? 1 : $last_batch->batch + 1;
        return view('course.batch.batch', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if (!check_user_access(Session::get('user_access'), 'course_batch_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id_m_course = base64_decode($id);

        $old_batch = CourseBatch::where('id_m_course', $id_m_course)->orderBy('batch', 'desc')->first();
        $batch_no = 1;
        if($old_batch != NULL)
        {
            $old_batch->status = 0;
            $old_batch->save();

            $batch_no = $old_batch->batch + 1;
        }

        $course_batch = new CourseBatch();
        $course_batch->batch = $batch_no;
        $course_batch->start_date = date('Y-m-d', strtotime(explode(' - ', $summary->date)[0]));
        $course_batch->end_date = date('Y-m-d', strtotime(explode(' - ', $summary->date)[1]));
        $course_batch->quota = $summary->quota;
        $course_batch->status = $summary->status;
        $course_batch->created_id = Auth::id();
        $course_batch->updated_id = Auth::id();
        $course_batch->id_m_course = $id_m_course;
        $course_batch->save();

        return redirect()->route('course_batches.index', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $id_batch)
    {
        if (!check_user_access(Session::get('user_access'), 'course_batch_read')) {
            return redirect('/');
        }

        $id_m_course = base64_decode($id);
        $id_batch = base64_decode($id_batch);

        $data['course_batch'] = CourseBatch::find($id_batch);
        $data['course'] = MCourse::find($id_m_course);
        return view('course.batch.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $id_batch)
    {
        if (!check_user_access(Session::get('user_access'), 'course_batch_update')) {
            return redirect('/');
        }

        $id_m_course = base64_decode($id);
        $id_batch = base64_decode($id_batch);

        $data['actions'] = 'update';
        $data['id_m_course'] = $id;
        $data['course'] = MCourse::find($id_m_course);
        $data['course_batch'] = CourseBatch::find($id_batch);
        $data['batch'] =  $data['course_batch']->batch;
        return view('course.batch.batch', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id_batch)
    {
        if (!check_user_access(Session::get('user_access'), 'course_batch_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id_batch = base64_decode($id_batch);

        $course_batch = CourseBatch::find($id_batch);
        $course_batch->start_date = date('Y-m-d', strtotime(explode(' - ', $summary->date)[0]));
        $course_batch->end_date = date('Y-m-d', strtotime(explode(' - ', $summary->date)[1]));
        $course_batch->quota = $summary->quota;
        $course_batch->status = $summary->status;
        $course_batch->updated_id = Auth::id();
        $course_batch->save();

        return redirect()->route('course_batches.index', $id);
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

    public function datatable(Request $request, $id_m_course)
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

        $course_batch = new CourseBatch();

        $sql_total = $course_batch->count();
        $sql_filter = $course_batch->filter(
            $order_field,
            $order_ascdesc,
            $search,
            $search_column,
            $limit,
            $start,
            $id_m_course
        );

        $filter_count = $sql_filter['filter_count'];
        $filter_data = $sql_filter['filter_data'];

        foreach ($filter_data as $value) {
            $row = array();

            $action = '';
            if (check_user_access(Session::get('user_access'), 'course_batch_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('course_batches.edit', ['id' => base64_encode($id_m_course), 'id_batch' => base64_encode($value->id)] ) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'course_batch_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('course_batches.show', ['id'=> base64_encode($id_m_course), 'id_batch' => base64_encode($value->id)] ) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = 'Batch ' . $value->batch;
            $row[] = date('d F Y', strtotime($value->start_date));
            $row[] = date('d F Y', strtotime($value->end_date));
            $row[] = $value->quota == 0 ? 'Unlimited' : $value->quota;
            $row[] = $value->status == 1 ? "<a class='ui green label' style='font-size: 10px;'>Aktif</a>" : "<a class='ui red label' style='font-size: 13px;'>Tidak Aktif</a>";
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
