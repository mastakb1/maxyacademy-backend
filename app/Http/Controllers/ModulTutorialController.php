<?php

namespace App\Http\Controllers;

use App\MModul;
use App\ModulTutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ModulTutorialController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'modul_tutorial_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'modul_tutorial_manage')) {
            return redirect('/');
        }

        $data['id_m_modul'] = $id;
        return view('modul.tutorial.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (!check_user_access(Session::get('user_access'), 'modul_tutorial_create')) {
            return redirect('/');
        }

        $id_m_modul = base64_decode($id);

        $data['actions'] = 'store';
        $data['id_m_modul'] = $id;
        $data['modul'] = MModul::find($id_m_modul);
        return view('modul.tutorial.tutorial', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if (!check_user_access(Session::get('user_access'), 'modul_tutorial_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id_m_modul = base64_decode($id);

        $tier = 1;
        $modul_tutorial = ModulTutorial::where('id_m_modul', $id_m_modul)->orderBy('tier', 'desc')->first();
        
        if ($modul_tutorial != NULL) {
            $tier = $modul_tutorial->tier + 1;
        }

        $modul_tutorial = new ModulTutorial();
        $modul_tutorial->name = $summary->name;
        $modul_tutorial->description = $summary->description;
        $modul_tutorial->tier = $tier;
        $modul_tutorial->status = $summary->status;
        $modul_tutorial->id_m_modul = $id_m_modul;
        $modul_tutorial->created_id = Auth::id();
        $modul_tutorial->updated_id = Auth::id();
        $modul_tutorial->save();

        return redirect()->route('modul_tutorials.index', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $id_tutorial)
    {
        if (!check_user_access(Session::get('user_access'), 'modul_tutorial_read')) {
            return redirect('/');
        }

        $id_m_modul = base64_decode($id);
        $id_tutorial = base64_decode($id_tutorial);

        $data['modul_tutorial'] = ModulTutorial::find($id_tutorial);
        $data['modul'] = MModul::find($id_m_modul);
        return view('modul.tutorial.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $id_tutorial)
    {
        if (!check_user_access(Session::get('user_access'), 'modul_tutorial_update')) {
            return redirect('/');
        }

        $id_m_modul = base64_decode($id);
        $id_tutorial = base64_decode($id_tutorial);

        $data['actions'] = 'update';
        $data['id_m_modul'] = $id;
        $data['modul'] = MModul::find($id_m_modul);
        $data['modul_tutorial'] = ModulTutorial::find($id_tutorial);
        return view('modul.tutorial.tutorial', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id_tutorial)
    {
        if (!check_user_access(Session::get('user_access'), 'modul_tutorial_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id_tutorial = base64_decode($id_tutorial);

        $modul_tutorial = ModulTutorial::find($id_tutorial);
        $modul_tutorial->name = $summary->name;
        $modul_tutorial->description = $summary->description;
        $modul_tutorial->status = $summary->status;
        $modul_tutorial->updated_id = Auth::id();
        $modul_tutorial->save();

        return redirect()->route('modul_tutorials.index', $id);
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

    public function datatable(Request $request, $id_m_modul)
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

        $modul_tutorial = new ModulTutorial();

        $sql_total = $modul_tutorial->count();
        $sql_filter = $modul_tutorial->filter(
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
            if (check_user_access(Session::get('user_access'), 'modul_tutorial_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('modul_tutorials.edit', ['id' => base64_encode($id_m_modul), 'id_tutorial'=>base64_encode($value->id)]) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'modul_tutorial_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('modul_tutorials.show', ['id' => base64_encode($id_m_modul), 'id_tutorial' => base64_encode($value->id)]) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->name;
            $row[] = $value->description;
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
