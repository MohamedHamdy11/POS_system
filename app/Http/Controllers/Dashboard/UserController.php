<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;



class UserController extends Controller
{
    public function __construct()
    {

      $this->middleware(['permission:users_read'])->only('index');

      $this->middleware(['permission:users_create'])->only('create');

      $this->middleware(['permission:users_update'])->only('edit');

      $this->middleware(['permission:users_delete'])->only('destroy');




    }//end of construct


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->search){
        //     $users = User::where('first_name' , 'like' , '%'. $request->search .'%')
        //     ->orWhere('first_name' , 'like' , '%'. $request->search .'%')
        //     ->get();
        // }
        // else{

        //     $users = User::whereRoleIs('admin')->get();

        // }
        // return view('dashboard.users.index' , compact('users'));

        $users = User::whereRoleIs('admin')->where(function($q) use ($request){

            return $q->when($request->search , function($quary) use ($request){

                return $quary->where('first_name' , 'like' , '%'. $request->search .'%')
                ->orWhere('last_name' , 'like' , '%'. $request->search .'%');
        });


        })->latest()->paginate(5);

        return view('dashboard.users.index' , compact('users'));

    }// end of index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }// end of create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'image' => 'image',
            'password' => 'required|confirmed',
            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
        $request_data['password'] = bcrypt($request->password);

        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/users_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if

        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        session()->flash('success', __('site.added_successfully'));

        return redirect(route('dashboard.users.index'));

    }//end of store

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit' , compact('user'));
    }// end of edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([

            'first_name' => 'required',

            'last_name' => 'required',

            'email' => ['required' , Rule::unique('users')->ignore($user->id),],

            'image' => 'image',

            'permissions' => 'required|min:1'

        ]);
        $request_data = $request->except(['permissions' , 'image']);

        if($request->image)
        {
            if($user->image != 'default.png')
               {
                Storage::disk('public_uploads')->delete('/users_images/'.$user->image);
               } // end if inner if

               Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/users_images/'. $request->image->hashName()));

                $request_data['image'] = $request->image->hashName();

        }//end if of external if

        $user->update($request_data);

        $user->syncPermissions($request->permissions);

        session()->flash('success', __('site.updated_successfully'));


        return redirect(route('dashboard.users.index'));


    }// end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->image != 'default.png')
        {
            Storage::disk('public_uploads')->delete('/users_images/'.$user->image);
        }// end if

        $user->delete();

        session()->flash('success', __('site.deleted_successfully'));


        return redirect(route('dashboard.users.index'));
    }// end of destroy
}// end of controller
