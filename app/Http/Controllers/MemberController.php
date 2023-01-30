<?php

namespace App\Http\Controllers;

use App\City;
use App\Point;
use App\Member;
use App\Province;
use App\MemberSkill;
use App\MemberParent;
use App\MemberEducation;
use App\MemberPortfolio;
use App\MemberExperience;
use App\MemberTranscript;
use App\CourseClassMember;
use App\MemberOrganization;
use App\MemberCertification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if(count($summary->transcripts) > 0){
            foreach ($summary->transcripts as $transcript) {
                $member_transcript = new MemberTranscript();
                $member_transcript->id_member = $member->id;
                $member_transcript->name = $transcript->course_name;
                $member_transcript->score = $transcript->score;
                $member_transcript->description = $transcript->description;
                $member_transcript->status = $transcript->transcriptIsChecked;
                $member_transcript->created_id = Auth::id();
                $member_transcript->updated_id = Auth::id();
                $member_transcript->save();
            }
        }

        foreach ($summary->parents as $parent) {
            $member_parent = new MemberParent();
            $member_parent->id_member = $member->id;
            $member_parent->name = $parent->parent_name;
            $member_parent->phone = $parent->parent_phone;
            $member_parent->job = $parent->parent_job;
            $member_parent->address = $parent->parent_address;
            $member_parent->status = 1;
            $member_parent->created_id = Auth::id();
            $member_parent->updated_id = Auth::id();
            $member_parent->save();
        }

        if(count($summary->skills) > 0){
            foreach ($summary->skills as $skill) {
                $member_skill = new MemberSkill();
                $member_skill->id_member = $member->id;
                $member_skill->name = $skill->skill_name;
                $member_skill->description = $skill->skill_description;
                $member_skill->status = $skill->skillIsChecked;
                $member_skill->created_id = Auth::id();
                $member_skill->updated_id = Auth::id();
                $member_skill->save();
            }
        }

        if(count($summary->educations) > 0){
            foreach ($summary->educations as $education) {
                $member_education = new MemberEducation();
                $member_education->id_member = $member->id;
                $member_education->name = $education->education_name;
                $member_education->degree = $education->education_degree;
                $member_education->fields_of_study = $education->education_field_of_study;
                $member_education->score = $education->education_score;
                $member_education->start_date = '2023-01-25';
                $member_education->end_date = '2023-01-25';
                $member_education->description = $education->education_description;
                $member_education->status = 1;
                $member_education->created_id = Auth::id();
                $member_education->updated_id = Auth::id();
                $member_education->save();
            }
        }

        if(count($summary->experiences) > 0){
            foreach ($summary->experiences as $experience) {
                $member_experience = new MemberExperience();
                $member_experience->id_member = $member->id;
                $member_experience->name = $experience->experience_name;
                $member_experience->job_type = $experience->experience_job_type;
                $member_experience->company = $experience->experience_company;
                $member_experience->industry = $experience->experience_industry;
                $member_experience->location = $experience->experience_location;
                $member_experience->start_date = '2023-01-25';
                $member_experience->end_date = '2023-01-25';
                $member_experience->description = $experience->experience_description;
                $member_experience->status = 1;
                $member_experience->created_id = Auth::id();
                $member_experience->updated_id = Auth::id();
                $member_experience->save();
            }
        }

        if(count($summary->organizations) > 0){
            foreach ($summary->organizations as $organization) {
                $member_organization = new MemberOrganization();
                $member_organization->id_member = $member->id;
                $member_organization->name = $organization->organization_name;
                $member_organization->position = $organization->organization_position;
                $member_organization->start_date = '2023-01-25';
                $member_organization->end_date = '2023-01-25';
                $member_organization->description = $organization->organization_description;
                $member_organization->status = 1;
                $member_organization->created_id = Auth::id();
                $member_organization->updated_id = Auth::id();
                $member_organization->save();
            }
        }
        
        if(count($summary->certifications) > 0){
            foreach ($summary->certifications as $certification) {
                $member_certification = new MemberCertification();
                $member_certification->id_member = $member->id;
                $member_certification->name = $certification->certification_name;
                $member_certification->company = $certification->certification_company;
                $member_certification->id_credential = $certification->certification_id_credential;
                $member_certification->url_credential = $certification->certification_url_credential;
                $member_certification->start_date = '2023-01-25';
                $member_certification->end_date = '2023-01-25';
                $member_certification->description = $certification->certification_description;
                $member_certification->status = 1;
                $member_certification->created_id = Auth::id();
                $member_certification->updated_id = Auth::id();
                $member_certification->save();
            }
        }

        if(count($summary->portfolios) > 0){
            foreach ($summary->portfolios as $portfolio) {
                $member_portfolio = new MemberPortfolio();
                $member_portfolio->id_member = $member->id;
                $member_portfolio->name = $portfolio->portfolio_name;
                $member_portfolio->url_portfolio = $portfolio->portfolio_url_portfolio;
                $member_portfolio->start_date = '2023-01-25';
                $member_portfolio->end_date = '2023-01-25';
                $member_portfolio->description = $portfolio->portfolio_description;
                $member_portfolio->status = 1;
                $member_portfolio->created_id = Auth::id();
                $member_portfolio->updated_id = Auth::id();
                $member_portfolio->save();
            }
        }

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

        $data['courses'] = CourseClassMember::selectRaw('course.id as id_course, course_class_member.id_course_class as id_class, CONCAT(course.name, " Bootcamp Batch ", course_class.batch) as name')
            ->join('course_class', 'course_class.id', 'course_class_member.id_course_class')
            ->join('course', 'course.id', 'course_class.id_course')
            ->where('course_class_member.id_member', $id)
            ->get();
        
        $data['transcript'] = MemberTranscript::where('id_member', $id)->get();
        $data['skill'] = MemberSkill::where('id_member', $id)->get();
        $data['education'] = MemberEducation::where('id_member', $id)->get();

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

        $delete_old_transcript = MemberTranscript::where('id_member', $id)->delete();
        
        if(count($summary->transcripts) > 0){
            foreach ($summary->transcripts as $transcript) {
                $member_transcript = new MemberTranscript();
                $member_transcript->id_member = $id;
                $member_transcript->name = $transcript->course_name;
                $member_transcript->score = $transcript->score;
                $member_transcript->description = $transcript->description;
                $member_transcript->status = $transcript->transcriptIsChecked;
                $member_transcript->created_id = Auth::id();
                $member_transcript->updated_id = Auth::id();
                $member_transcript->save();
            }
        }
        
        $delete_old_parent = MemberParent::where('id_member', $id)->delete();
        
        foreach ($summary->parents as $parent) {
            $member_parent = new MemberParent();
            $member_parent->id_member = $member->id;
            $member_parent->name = $parent->parent_name;
            $member_parent->phone = $parent->parent_phone;
            $member_parent->job = $parent->parent_job;
            $member_parent->address = $parent->parent_address;
            $member_parent->status = 1;
            $member_parent->created_id = Auth::id();
            $member_parent->updated_id = Auth::id();
            $member_parent->save();
        }

        $delete_old_skill = MemberSkill::where('id_member', $id)->delete();
        
        if(count($summary->skills) > 0){
            foreach ($summary->skills as $skill) {
                $member_skill = new MemberSkill();
                $member_skill->id_member = $member->id;
                $member_skill->name = $skill->skill_name;
                $member_skill->description = $skill->skill_description;
                $member_skill->status = $skill->skillIsChecked;
                $member_skill->created_id = Auth::id();
                $member_skill->updated_id = Auth::id();
                $member_skill->save();
            }
        }
        
        $delete_old_education = MemberEducation::where('id_member', $id)->delete();
        
        if(count($summary->educations) > 0){
            foreach ($summary->educations as $education) {
                $member_education = new MemberEducation();
                $member_education->id_member = $member->id;
                $member_education->name = $education->education_name;
                $member_education->degree = $education->education_degree;
                $member_education->fields_of_study = $education->education_field_of_study;
                $member_education->score = $education->education_score;
                $member_education->start_date = '2023-01-25';
                $member_education->end_date = '2023-01-25';
                // $member_education->end_date = $education->education_end_date;
                $member_education->description = $education->education_description;
                $member_education->status = 1;
                $member_education->created_id = Auth::id();
                $member_education->updated_id = Auth::id();
                $member_education->save();
            }
        }
        
        $delete_old_experience = MemberExperience::where('id_member', $id)->delete();
        
        if(count($summary->experiences) > 0){
            foreach ($summary->experiences as $experience) {
                $member_experience = new MemberExperience();
                $member_experience->id_member = $member->id;
                $member_experience->name = $experience->experience_name;
                $member_experience->job_type = $experience->experience_job_type;
                $member_experience->company = $experience->experience_company;
                $member_experience->industry = $experience->experience_industry;
                $member_experience->location = $experience->experience_location;
                $member_experience->start_date = '2023-01-25';
                $member_experience->end_date = '2023-01-25';
                $member_experience->description = $experience->experience_description;
                $member_experience->status = 1;
                $member_experience->created_id = Auth::id();
                $member_experience->updated_id = Auth::id();
                $member_experience->save();
            }
        }

        $delete_old_organization = MemberOrganization::where('id_member', $id)->delete();

        if(count($summary->organizations) > 0){
            foreach ($summary->organizations as $organization) {
                $member_organization = new MemberOrganization();
                $member_organization->id_member = $member->id;
                $member_organization->name = $organization->organization_name;
                $member_organization->position = $organization->organization_position;
                $member_organization->start_date = '2023-01-25';
                $member_organization->end_date = '2023-01-25';
                $member_organization->description = $organization->organization_description;
                $member_organization->status = 1;
                $member_organization->created_id = Auth::id();
                $member_organization->updated_id = Auth::id();
                $member_organization->save();
            }
        }
        
        $delete_old_certification = MemberCertification::where('id_member', $id)->delete();
        
        if(count($summary->certifications) > 0){
            foreach ($summary->certifications as $certification) {
                $member_certification = new MemberCertification();
                $member_certification->id_member = $member->id;
                $member_certification->name = $certification->certification_name;
                $member_certification->company = $certification->certification_company;
                $member_certification->id_credential = $certification->certification_id_credential;
                $member_certification->url_credential = $certification->certification_url_credential;
                $member_certification->start_date = '2023-01-25';
                $member_certification->end_date = '2023-01-25';
                $member_certification->description = $certification->certification_description;
                $member_certification->status = 1;
                $member_certification->created_id = Auth::id();
                $member_certification->updated_id = Auth::id();
                $member_certification->save();
            }
        }

        $delete_old_portfolio = MemberPortfolio::where('id_member', $id)->delete();

        if(count($summary->portfolios) > 0){
            foreach ($summary->portfolios as $portfolio) {
                $member_portfolio = new MemberPortfolio();
                $member_portfolio->id_member = $member->id;
                $member_portfolio->name = $portfolio->portfolio_name;
                $member_portfolio->url_portfolio = $portfolio->portfolio_url_portfolio;
                $member_portfolio->start_date = '2023-01-25';
                $member_portfolio->end_date = '2023-01-25';
                $member_portfolio->description = $portfolio->portfolio_description;
                $member_portfolio->status = 1;
                $member_portfolio->created_id = Auth::id();
                $member_portfolio->updated_id = Auth::id();
                $member_portfolio->save();
            }
        }


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
            $row[] = $value->status == 1 ? "<a class='ui green label' style='font-size: 10px;'>Aktif</a>" : "<a class='ui red label' style='font-size: 10px;'>Tidak Aktif</a>";
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
        $member = Member::select('id', 'name as label')
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
