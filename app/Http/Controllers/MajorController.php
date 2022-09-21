<?php

namespace App\Http\Controllers;

use App\MMajor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MajorController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'm_major_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'm_major_manage')) {
            return redirect('/');
        }

        return view('major.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_user_access(Session::get('user_access'), 'm_major_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        return view('major.major', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!check_user_access(Session::get('user_access'), 'm_major_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $major = new MMajor();
        $major->name = $summary->name;
        $major->description = $summary->description;
        $major->status = $summary->status;
        $major->created_id = Auth::id();
        $major->updated_id = Auth::id();
        $major->save();

        return redirect()->route('majors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!check_user_access(Session::get('user_access'), 'm_major_read')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['major'] = MMajor::find($id);
        return view('major.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_user_access(Session::get('user_access'), 'm_major_update')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['actions'] = 'update';
        $data['major'] = MMajor::find($id);
        return view('major.major', compact('data'));
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
        if (!check_user_access(Session::get('user_access'), 'm_major_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id = base64_decode($id);

        $major = MMajor::find($id);
        $major->name = $summary->name;
        $major->description = $summary->description;
        $major->status = $summary->status;
        $major->updated_at = Auth::id();
        $major->save();

        return redirect()->route('majors.index');
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
            "status" => (isset($columns[4]['search']['value'])) ? $columns[4]['search']['value'] : "",
            "created_at" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
            "user_create" => (isset($columns[6]['search']['value'])) ? $columns[6]['search']['value'] : "",
            "updated_at" => (isset($columns[7]['search']['value'])) ? $columns[7]['search']['value'] : "",
            "user_update" => (isset($columns[8]['search']['value'])) ? $columns[8]['search']['value'] : "",
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
            $order_field = 'status';
        else if ($order_index == 5)
            $order_field = 'created_at';
        else if ($order_index == 6)
            $order_field = 'user_create_name';
        else if ($order_index == 7)
            $order_field = 'updated_at';
        else if ($order_index == 8)
            $order_field = 'user_update_name';
        else
            $order_field = 'id';

        $order_ascdesc = $_GET['order'][0]['dir'];

        $major = new MMajor();

        $sql_total = $major->count();
        $sql_filter = $major->filter(
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
            if (check_user_access(Session::get('user_access'), 'm_major_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('majors.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'm_major_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('majors.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->name;
            $row[] = $value->description;
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
