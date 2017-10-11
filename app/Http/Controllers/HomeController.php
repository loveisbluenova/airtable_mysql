<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Menutop;
use App\Models\Menumain;
use App\Models\Menuleft;
use App\Models\About;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	protected $about;

    public function __construct(About $about)
    {
        $this->about = $about;
    }
	/**
	 * Create a new controller instance.

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('app');
	}

	public function about()
	{
		$abouts = $this->about->first();
		$menutops = DB::table('menu_top')->get();
        $menulefts = DB::table('menu_left')->get();
        $menumains = DB::table('menu_main')->get();
        $agencys = DB::table('agencies')->get();
        $mainmenu = DB::table('menu_main')->value('menu_main_label');
		return view('frontend.about', compact('abouts', 'agencys','menus','menutops','menulefts','menumains','mainmenu'));
	}

}
