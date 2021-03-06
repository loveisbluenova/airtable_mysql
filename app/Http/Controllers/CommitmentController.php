<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Project;
use App\Models\Commitment;
use App\Models\Menutop;
use App\Models\Menumain;
use App\Models\Menuleft;
use App\Models\Comm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;


class CommitmentController extends Controller
{
    protected $comm;

    public function __construct(Comm $comm)
    {
        $this->comm = $comm;
    }

    public function commitmentview()
    {
        $comms = $this->comm->first();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->paginate(20);
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.commitments', compact('comms', 'commitments','menutops','menulefts','menumains','mainmenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datasync()
    {
        $user           = \Auth::user();
        $userRole       = $user->hasRole('user');
        $editorRole     = $user->hasRole('editor');
        $adminRole      = $user->hasRole('administrator');

        if($userRole)
        {
            $access = 'User';
        } elseif ($editorRole) {
            $access = 'Editor';
        } elseif ($adminRole) {
            $access = 'Administrator';
        }
        $agencyupdate = DB::table('agencies')->first();
        $projectupdate = DB::table('projects')->first();
        $commitmentupdate = DB::table('commitments')->first();

        return view('pages.datasync', compact('agencyupdate', 'projectupdate', 'commitmentupdate'))->withUser($user)->withAccess($access);
    }

    public function noncitycostdesc()
    {
        $comms = $this->comm->first();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->orderBy('commitments.noncitycost','desc')->paginate(20);
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.commitments', compact('comms', 'commitments','menutops','menulefts','menumains','mainmenu'));
    }

    public function noncitycostasc()
    {
        $comms = $this->comm->first();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->orderBy('commitments.noncitycost','asc')->paginate(20);
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.commitments', compact('comms', 'commitments','menutops','menulefts','menumains','mainmenu'));
    }

    public function citycostdesc()
    {   
        $comms = $this->comm->first();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->orderBy('commitments.citycost','desc')->paginate(20);
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.commitments', compact('comms', 'commitments','menutops','menulefts','menumains','mainmenu'));
    }

    public function citycostasc()
    {
        $comms = $this->comm->first();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $commitments = DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->orderBy('commitments.citycost','asc')->paginate(20);
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.commitments', compact('comms', 'commitments','menutops','menulefts','menumains','mainmenu'));
    }


    public function find(Request $request)
    {
        $comms = $this->comm->first();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $find = $request->input('find');
        $commitments = DB::table('commitments')->where('commitmentdescription',  'like', '%'.$find.'%')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->paginate(20);
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.commitments', compact('comms', 'commitments','menutops','menulefts','menumains','mainmenu'));
    }
}
