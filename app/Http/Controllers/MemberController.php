<?php

namespace App\Http\Controllers;

use App\City;
use App\Member;
use App\Point;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'member_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'member_manage')) {
            return redirect('/');
        }

        return view('member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_user_access(Session::get('user_access'), 'member_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        return view('member.member', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!check_user_access(Session::get('user_access'), 'member_create')){
            return redirect('/');
        }

        $summary = json_decode($request->summary);
        

        $member = new Member();
        $member->name = $summary->name;
        $member->email = $summary->email;
        $member->password = Hash::make($summary->password);
        $member->phone = $summary->phone;
        $member->address = $summary->address;
        $member->status = $summary->status;

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = md5($summary->name . strtotime('now')) . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/member/';
            $file->move($path, $filename);
            $member->profile_picture = $filename;
        }

        $member->save();

        return redirect()->route('members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!check_user_access(Session::get('user_access'), 'member_read')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['member'] = Member::find($id);
        return view('member.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_user_access(Session::get('user_access'), 'member_update')) {
            return redirect('/');
        }

        $id = base64_decode($id);

        $data['actions'] = 'update';
        $data['member'] = Member::find($id);
        return view('member.member', compact('data'));
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
        if (!check_user_access(Session::get('user_access'), 'member_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);
        $id = base64_decode($id);

        $member = Member::find($id);
        $member->name = $summary->name;
        $member->email = $summary->email;
        
        if($summary->password != '' && $summary->password != NULL )
        {
            $member->password = Hash::make($summary->password);
        }

        $member->phone = $summary->phone;
        $member->address = $summary->address;
        $member->status = $summary->status;

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = md5($summary->name . strtotime('now')) . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/member/';

            if (File::exists($path . $member->image)) {
                unlink($path . $member->image);
            }

            $file->move($path, $filename);
            $member->profile_picture = $filename;
        }

        $member->save();

        return redirect()->route('members.index');
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
            "nama" => (isset($columns[2]['search']['value'])) ? $columns[2]['search']['value'] : "",
            "email" => (isset($columns[3]['search']['value'])) ? $columns[3]['search']['value'] : "",
            "status" => (isset($columns[4]['search']['value'])) ? $columns[4]['search']['value'] : "",
            "created_at" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
            "updated_at" => (isset($columns[6]['search']['value'])) ? $columns[6]['search']['value'] : "",
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order_index = $_GET['order'][0]['column'];
        if ($order_index == 1)
            $order_field = 'id';
        else if ($order_index == 2)
            $order_field = 'nama';
        else if ($order_index == 3)
            $order_field = 'email';
        else if ($order_index == 4)
            $order_field = 'status';
        else if ($order_index == 5)
            $order_field = 'creaated_at';
        else if ($order_index == 6)
            $order_field = 'updated_at';
        else
            $order_field = 'id';

        $order_ascdesc = $_GET['order'][0]['dir'];

        $member = new Member();

        $sql_total = $member->count();
        $sql_filter = $member->filter(
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
            if (check_user_access(Session::get('user_access'), 'member_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('members.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'member_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('members.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->nama;
            $row[] = $value->email;
            $row[] = $value->status == 1 ? "<a class='ui green label' style='font-size: 10px;'>Aktif</a>" : "<a class='ui red label' style='font-size: 13px;'>Tidak Aktif</a>";
            $row[] = date('d-m-Y H:i:s', strtotime($value->created_at));
            $row[] = date('d-m-Y H:i:s', strtotime($value->updated_at));

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
        $member = Member::select('id as value', 'name as label')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->where('status', 1)
            ->get()->toArray();
        return json_encode($member);    
    }

    public function getById(Request $request)
    {
        $id_member = base64_decode($request->id_member);

        $member = Member::find($id_member);
        return $member;
    }
}
