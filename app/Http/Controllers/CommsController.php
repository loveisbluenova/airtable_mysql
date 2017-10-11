<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Logic\User\UserRepository;
use App\Models\Comm;
use Validator;
use Input;
use Response;

class CommsController extends Controller
{
    /**
     * Post Repository
     *
     * @var Post
     */
    protected $comm;

    public function __construct(Comm $comm)
    {
        $this->comm = $comm;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $comm = $this->comm->first();
        $user                   = \Auth::user();
        $users              = \DB::table('users')->get();
        $total_users        = \DB::table('users')->count();
        $userRole           = $user->hasRole('user');
        $editorRole         = $user->hasRole('editor');
        $adminRole          = $user->hasRole('administrator');

        $userRole               = $user->hasRole('user');
        $editorRole             = $user->hasRole('editor');
        $adminRole              = $user->hasRole('administrator');

        if($userRole)
        {
            $access = 'User';
        } elseif ($editorRole) {
            $access = 'Editor';
        } elseif ($adminRole) {
            $access = 'Administrator';
        }

             return view('admin.pages.edit-comm', [
            'users'             => $users,
            'total_users'       => $total_users,
            'user'              => $user,
            'access'            => $access,
            'success' => '', 
            'errors' => '', 
            'message' => '',], compact('comm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $comm = $this->comm->first();
        $user               = \Auth::user();
        $users              = \DB::table('users')->get();
        $total_users        = \DB::table('users')->count();
        $userRole           = $user->hasRole('user');
        $editorRole         = $user->hasRole('editor');
        $adminRole          = $user->hasRole('administrator');

        $userRole               = $user->hasRole('user');
        $editorRole             = $user->hasRole('editor');
        $adminRole              = $user->hasRole('administrator');

        if($userRole)
        {
            $access = 'User';
        } elseif ($editorRole) {
            $access = 'Editor';
        } elseif ($adminRole) {
            $access = 'Administrator';
        }

        $input = Input::all();
        $validation = Validator::make($input, Comm::$rules);

        if ($validation->passes())
        {   
            $comm = $this->comm->first();
            $comm->update($input);
            //$this->post->create($input);

            return view('admin.pages.edit-comm', [
                'users'             => $users,
                'total_users'       => $total_users,
                'user'              => $user,
                'access'            => $access,
                'success'           => 'true', 
                'errors'            => '', 
                'message'           => 'Post created successfully.',], compact('comm'));
        }

        return view('admin.pages.edit-comm', [
                'users'             => $users,
                'total_users'       => $total_users,
                'user'              => $user,
                'access'            => $access,
                'success' => 'false', 
                'errors' => $validation, 
                'message' => 'All fields are required.',], compact('comm'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = $this->post->findOrFail($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->post->find($id);

        if (is_null($post))
        {
            return Redirect::route('posts.index');
        }

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $id = 1;
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Comm::$rules);

        if ($validation->passes())
        {
            $comm = Comm::find($id);
            $comm->update($input);

            return Response::json(array('success' => true, 'errors' => '', 'message' => 'Post updated successfully.'));
        }

        return Response::json(array('success' => false, 'errors' => $validation, 'message' => 'All fields are required.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->post->find($id)->delete();

        return Redirect::route('admin.posts.index');
    }

    public function upload()
    {
        $file = Input::file('file');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = Validator::make($input, $rules);
        if ( $validator->fails()) {
            return Response::json(array('success' => false, 'errors' => $validator->getMessageBag()->toArray()));
        }

        $fileName = time() . '-' . $file->getClientOriginalName();
        $destination = public_path() . '/uploads/';
        $file->move($destination, $fileName);

        echo url('/uploads/'. $fileName);
    }
}
