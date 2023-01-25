<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

use function Complex\ln;

class CompanyController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'company_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'company_manage')) {
            return redirect('/');
        }

        return view('company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_user_access(Session::get('user_access'), 'company_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        return view('company.company', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!check_user_access(Session::get('user_access'), 'company_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $company = new Company();
        $company->name = $summary->name;
        $company->type = $summary->type;
        $company->url = $summary->url;
        $company->description = $summary->description;
        $company->address = $summary->address;
        $company->phone = $summary->phone;
        $company->email = $summary->email;
        $company->contact_person = $summary->contact_person;
        $company->status = $summary->status;
        $company->status_highlight = $summary->status_highlight;
        $company->created_id = Auth::id();
        $company->updated_id = Auth::id();

        if($request->hasFile('logo'))
        {
            $file = $request->file('logo');
            $filename = md5($summary->name . strtotime('now')) . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/company/';
            $file->move($path, $filename);
            $company->logo = $filename;
        }

        $company->save();

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!check_user_access(Session::get('user_access'), 'company_read')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['company'] = Company::find($id);
        
        return view('company.show', compact('data')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_user_access(Session::get('user_access'), 'company_update')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['company'] = Company::find($id);
        $data['actions'] = 'update';
        
        return view('company.company', compact('data'));
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
        if (!check_user_access(Session::get('user_access'), 'company_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id = base64_decode($id);

        $company = Company::find($id);
        $type = $company->type;
        $company->name = $summary->name;
        $company->type = $summary->type;
        $company->url = $summary->url;
        $company->description = $summary->description;
        $company->address = $summary->address;
        $company->phone = $summary->phone;
        $company->email = $summary->email;
        $company->contact_person = $summary->contact_person;
        $company->status = $summary->status;
        $company->updated_id = Auth::id();
        $company->status_highlight = $summary->status_highlight;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = md5($summary->name . strtotime('now')) . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/company/';

            if(File::exists($path . $company->logo)){
                unlink($path . $company->logo);
            }
           
            $file->move($path, $filename);
            $company->logo = $filename;
        }

        $company->save();

        return redirect()->route('companies.index');
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
            "type" => (isset($columns[3]['search']['value'])) ? $columns[3]['search']['value'] : "",
            "address" => (isset($columns[4]['search']['value'])) ? $columns[4]['search']['value'] : "",
            "phone" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
            "email" => (isset($columns[6]['search']['value'])) ? $columns[6]['search']['value'] : "",
            "contact_person" => (isset($columns[7]['search']['value'])) ? $columns[7]['search']['value'] : "",
            "url" => (isset($columns[8]['search']['value'])) ? $columns[8]['search']['value'] : "",
            "description" => (isset($columns[9]['search']['value'])) ? $columns[9]['search']['value'] : "",
            "status" => (isset($columns[10]['search']['value'])) ? $columns[10]['search']['value'] : "",
            "status_highlight" => (isset($columns[11]['search']['value'])) ? $columns[11]['search']['value'] : "",
            "created_at" => (isset($columns[12]['search']['value'])) ? $columns[12]['search']['value'] : "",
            "user_create" => (isset($columns[13]['search']['value'])) ? $columns[13]['search']['value'] : "",
            "updated_at" => (isset($columns[14]['search']['value'])) ? $columns[14]['search']['value'] : "",
            "user_update" => (isset($columns[15]['search']['value'])) ? $columns[15]['search']['value'] : "",
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order_index = $_GET['order'][0]['column'];
        if ($order_index == 1)
            $order_field = 'id';
        else if ($order_index == 2)
            $order_field = 'name';
        else if ($order_index == 3)
            $order_field = 'type';
        else if ($order_index == 4)
            $order_field = 'address';
        else if ($order_index == 5)
            $order_field = 'phone';
        else if ($order_index == 6)
            $order_field = 'email';
        else if ($order_index == 7)
            $order_field = 'contact_person';
        else if ($order_index == 8)
            $order_field = 'url';
        else if ($order_index == 9)
            $order_field = 'description';
        else if ($order_index == 10)
            $order_field = 'status';
        else if ($order_index == 11)
            $order_field = 'status_highlight';
        else if ($order_index == 12)
            $order_field = 'created_at';
        else if ($order_index == 13)
            $order_field = 'user_create_name';
        else if ($order_index == 14)
            $order_field = 'updated_at';
        else if ($order_index == 15)
            $order_field = 'user_update_name';
        else
            $order_field = 'id';

        $order_ascdesc = $_GET['order'][0]['dir'];

        $company = new Company();

        $sql_total = $company->count();
        $sql_filter = $company->filter(
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
            if (check_user_access(Session::get('user_access'), 'company_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('companies.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'company_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('companies.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->name;
            $row[] = $value->type;
            $row[] = $value->address;
            $row[] = $value->phone;
            $row[] = $value->email;
            $row[] = $value->contact_person;
            $row[] = "<a target='_blank' href='$value->url'>$value->url</a>";
            $row[] = $value->description;
            $row[] = $value->status == 1 ? "<a class='ui green label' style='font-size: 10px;'>Aktif</a>" : "<a class='ui red label' style='font-size: 10px;'>Tidak Aktif</a>";
            $row[] = $value->status_highlight == 1 ? "<a class='ui green label' style='font-size: 10px;'>Aktif</a>" : "<a class='ui red label' style='font-size: 10px;'>Tidak Aktif</a>";
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
