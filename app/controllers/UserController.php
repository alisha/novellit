<?php

use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserController extends BaseController implements RemindableInterface {

    use RemindableTrait;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return Redirect::to('/');
    }

    /**
     * Show the form for creating a new resource.
     * Only let the user create an assessment if they have at least one course
     *
     * @return Response
     */
    public function create() {
        if (!Auth::check()) {
            return View::make('users.create');
        } else {
            return Redirect::to('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //Validation
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/users/create')
                ->withInput()
                ->withErrors($validator);
        }

        //Save the input
        $user = new User;
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();

        Auth::login($user);

        return Redirect::to('/')
            ->with('flash_message', 'Your account has been successfully created.')
            ->with('alert_class', 'alert-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $user = User::find($id);
        
        //If the specified user doesn't exist
        if (!is_object($user)) {
            return Redirect::to('/')
                ->with('flash_message', 'That user doesn\'t exist.')
                ->with('alert_class', 'alert-danger');
        } 
        
        if ($user != Auth::user()) {
            return View::make('users.show')
                ->with('user', $user);
        } else {
            return View::make('users.showSelf');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $user = User::find($id)->first();
        
        if (!is_object($user) || $user != Auth::user()) {
            return Redirect::to('/')
                ->with('flash_message', 'You can\'t edit this user\'s profile!')
                ->with('alert_class', 'alert-danger');
        } else {
            return View::make('users.update')
                ->with('user', Auth::user());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $user = User::findOrFail($id);

        //Validation
        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'new_password' => 'required_with:current_password'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/users/'.$id.'/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $user->name = Input::get('name');
        $user->email = Input::get('email');

        //If the user wants to change their password
        if (Input::get('current_password') != "") {
            if (Hash::check(Input::get('current_password'), $user->password)) {
                $user->password = Hash::make(Input::get('new_password'));
            } else {
                return Redirect::to('/users/'.$id.'/edit')
                    ->withInput()
                    ->with('flash_message', 'Your current password doesn\'t match your actual password. Try again?')
                    ->with('alert_class', 'alert-danger');
            }
        }

        $user->save();

        return Redirect::to('/users/'.$id)
            ->with('flash_message', 'Your profile has been successfully updated')
            ->with('alert_class', 'alert-success');
    }

}