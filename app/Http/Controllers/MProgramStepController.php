<?php

namespace App\Http\Controllers;

use App\MButtonStep;
use App\MProgramStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MProgramStepController extends Controller
{
    public function __construct()
    {
        if(!check_user_access(Session::get('user_access'), 'm_program_step_manage')){
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
        if(!check_user_access(Session::get('user_access'), 'm_program_step_manage')){
            return redirect('/');
        }

        return view('program_step.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check_user_access(Session::get('user_access'), 'm_program_step_create')){
            return redirect('/');
        }

        $data['actions'] = 'store';
        return view('program_step.program_step', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!check_user_access(Session::get('user_access'), 'm_program_step_create')){
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $program_step = new MProgramStep();

        $program_step->name = $summary->name; 
        $program_step->style = $summary->style;  
        $program_step->description = $summary->description; 
        $program_step->status = $summary->status; 
        $program_step->created_id = Auth::id(); 
        $program_step->updated_id = Auth::id(); 
        $program_step->save();

        if(count($summary->buttons) > 0){
            foreach ($summary->buttons as $button) {
                $m_button_step = new MButtonStep();
                $m_button_step->id_program_step = $program_step->id;
                $m_button_step->name = $button->button_name;
                $m_button_step->icon = $button->button_icon;
                $m_button_step->style = $button->button_style;
                $m_button_step->url = $button->button_url;
                $m_button_step->description = $button->button_description;
                $m_button_step->status = $button->buttonIsChecked;
                $m_button_step->created_id = Auth::id();
                $m_button_step->updated_id = Auth::id();
                $m_button_step->save();
            }
        }

        return redirect()->route('program_steps.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MContentCarousel  $mContentCarousel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!check_user_access(Session::get('user_access'), 'm_program_step_read')){
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['program_step'] = MProgramStep::find($id);
        $data['button'] = MButtonStep::where('id_program_step',$id)->get();
        
        return view('program_step.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MContentCarousel  $mContentCarousel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!check_user_access(Session::get('user_access'), 'm_program_step_update')){
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['actions'] = 'update';
        $data['program_step'] = MProgramStep::find($id);

        return view('program_step.program_step', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MContentCarousel  $mContentCarousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!check_user_access(Session::get('user_access'), 'm_program_step_update')){
            return redirect('/');
        }

        $summary = json_decode($request->summary);
        $id = base64_decode($id);

        $program_step = MProgramStep::find($id);
        $program_step->name = $summary->name; 
        $program_step->style = $summary->style; 
        $program_step->description = $summary->description; 
        $program_step->status = $summary->status; 
        $program_step->updated_id = Auth::id();
        $program_step->save();

        $delete_old_button = MButtonStep::where('id_program_step', $id)->delete();

        if(count($summary->buttons) > 0){
            foreach ($summary->buttons as $button) {
                $m_button_step = new MButtonStep();
                $m_button_step->id_program_step = $program_step->id;
                $m_button_step->name = $button->button_name;
                $m_button_step->icon = $button->button_icon;
                $m_button_step->style = $button->button_style;
                $m_button_step->url = $button->button_url;
                $m_button_step->description = $button->button_description;
                $m_button_step->status = $button->buttonIsChecked;
                $m_button_step->created_id = Auth::id();
                $m_button_step->updated_id = Auth::id();
                $m_button_step->save();
            }
        }

        return redirect()->route('program_steps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MContentCarousel  $mContentCarousel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datatable(Request $request)
    {
        $search = $_GET['search']['value'];
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

        $program_step = new MProgramStep();

        $sql_total = $program_step->count();
        $sql_filter = $program_step->filter(
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
            if (check_user_access(Session::get('user_access'), 'm_program_step_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('program_steps.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'm_program_step_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('program_steps.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->name;
            $row[] = $value->style;
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
