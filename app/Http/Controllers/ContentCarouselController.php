<?php

namespace App\Http\Controllers;

use App\MContentCarousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ContentCarouselController extends Controller
{
    public function __construct()
    {
        if(!check_user_access(Session::get('user_access'), 'm_content_carousel_manage')){
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
        if(!check_user_access(Session::get('user_access'), 'm_content_carousel_manage')){
            return redirect('/');
        }

        return view('content_carousel.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check_user_access(Session::get('user_access'), 'm_content_carousel_create')){
            return redirect('/');
        }

        $data['actions'] = 'store';
        return view('content_carousel.content_carousel', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!check_user_access(Session::get('user_access'), 'm_content_carousel_create')){
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $content_carousel = new MContentCarousel();

        $content_carousel->name = $summary->name; 
        $content_carousel->content = $summary->content; 
        $content_carousel->description = $summary->description; 
        $content_carousel->status = $summary->status; 
        $content_carousel->status_button = $summary->status_button; 
        $content_carousel->url = $summary->url_button; 
        $content_carousel->created_id = Auth::id(); 
        $content_carousel->updated_id = Auth::id(); 

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = md5($summary->name . strtotime('now')) . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/carousel/';
            $file->move($path, $filename);
            $content_carousel->image = $filename;
        }

        $content_carousel->save();

        return redirect()->route('content_carousels.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MContentCarousel  $mContentCarousel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!check_user_access(Session::get('user_access'), 'm_content_carousel_read')){
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['content_carousel'] = MContentCarousel::find($id);
        
        return view('content_carousel.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MContentCarousel  $mContentCarousel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!check_user_access(Session::get('user_access'), 'm_content_carousel_update')){
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['actions'] = 'update';
        $data['content_carousel'] = MContentCarousel::find($id);

        return view('content_carousel.content_carousel', compact('data'));
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
        if(!check_user_access(Session::get('user_access'), 'm_content_carousel_update')){
            return redirect('/');
        }

        $summary = json_decode($request->summary);
        $id = base64_decode($id);

        $content_carousel = MContentCarousel::find($id);
        $content_carousel->name = $summary->name;
        $content_carousel->content = $summary->content;
        $content_carousel->description = $summary->description;
        $content_carousel->status = $summary->status;
        $content_carousel->status_button = $summary->status_button;
        $content_carousel->updated_id = Auth::id();
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = md5($summary->name . strtotime('now')) . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/carousel/';

            if(File::exists($path . $content_carousel->image) && $content_carousel->image != ''){
                unlink($path . $content_carousel->image);
            }
           
            $file->move($path, $filename);
            $content_carousel->image = $filename;
        }
        $content_carousel->save();

        return redirect()->route('content_carousels.index');
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
            "url" => (isset($columns[4]['search']['value'])) ? $columns[4]['search']['value'] : "",
            "status" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
            "status_button" => (isset($columns[6]['search']['value'])) ? $columns[6]['search']['value'] : "",
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
            $order_field = 'url';
        else if ($order_index == 5)
            $order_field = 'status';
        else if ($order_index == 6)
            $order_field = 'status_button';
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

        $content_carousel = new MContentCarousel();

        $sql_total = $content_carousel->count();
        $sql_filter = $content_carousel->filter(
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
            if (check_user_access(Session::get('user_access'), 'm_content_carousel_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('content_carousels.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'm_content_carousel_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('content_carousels.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->name;
            $row[] = $value->description;
            $row[] = "<a href='$value->url'>$value->url</a>";
            $row[] = $value->status == 1 ? "<a class='ui green label' style='font-size: 10px;'>Aktif</a>" : "<a class='ui red label' style='font-size: 10px;'>Tidak Aktif</a>";
            $row[] = $value->status_button == 1 ? "<a class='ui green label' style='font-size: 10px;'>Aktif</a>" : "<a class='ui red label' style='font-size: 10px;'>Tidak Aktif</a>";
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
