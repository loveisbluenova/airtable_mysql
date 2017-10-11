<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Menutop;
use App\Models\Menumain;
use App\Models\Menuleft;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;


class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function agencyview()
    {
        $posts = $this->post->first();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('posts', 'agencys','menus','menutops','menulefts','menumains','mainmenu'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function totalcostdesc()
    {
        $posts = $this->post->first();
        $agencys = DB::table('agencies')->orderBy('agencies.total_project_cost','desc')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('posts', 'agencys','menutops','menulefts','menumains','mainmenu'));
    }


    public function totalcostasc()
    {
        $posts = $this->post->first();
        $agencys = DB::table('agencies')->orderBy('agencies.total_project_cost','asc')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('posts', 'agencys','menutops','menulefts','menumains','mainmenu'));
    }

    public function projectsdesc()
    {
        $posts = $this->post->first();
        $agencys = DB::table('agencies')->orderBy('agencies.projects','desc')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('posts', 'agencys','menutops','menulefts','menumains','mainmenu'));
    }

    public function projectsasc()
    {
        $posts = $this->post->first();
        $agencys = DB::table('agencies')->orderBy('agencies.projects','asc')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('posts', 'agencys','menutops','menulefts','menumains','mainmenu'));
    }

    public function commitmentsdesc()
    {
        $posts = $this->post->first();
        $agencys = DB::table('agencies')->orderBy('agencies.commitments','desc')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('posts', 'agencys','menutops','menulefts','menumains','mainmenu'));
    }

    public function commitmentsasc()
    {
        $posts = $this->post->first();
        $agencys = DB::table('agencies')->orderBy('agencies.commitments','asc')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('posts', 'agencys','menutops','menulefts','menumains','mainmenu'));
    }
    public function find(Request $request)
    {
        $posts = $this->post->first();
        $find = $request->input('find');
        $agencys = DB::table('agencies')->where('magencyname',  'like', '%'.$find.'%')->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('posts', 'agencys','menutops','menulefts','menumains','mainmenu'));
    }
    public function commitmentlink($id)
    {
        $posts = $this->post->first();
        $agencys = DB::table('agencies')->where('magency', $id)->get();
        $menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
        return view('frontend.agencies', compact('posts', 'agencys','menutops','menulefts','menumains','mainmenu'));
    }
}
