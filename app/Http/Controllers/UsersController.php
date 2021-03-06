<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\RecordHelper;
use App\Modules\JSONResponseFormater;
use Illuminate\Validation\Validator;
use App\User;

class UsersController extends Controller
{
    use RecordHelper, JSONResponseFormater;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all(['id','name','email','created_at','updated_at']);

        $fields = [
            'name' => array('label' => 'Name'),
            'email' => array('label' => 'Email'),
            'created_at' => array('label' => 'Created At')
        ];

        $this->responseJsonDataTable($users, $fields,false, 'name', 'id');

        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new User;

        $data = $model->getFillable();
        $data = $request->only($data);

        $data['password'] = bcrypt($data['password']);

        $rules = array(
            'name' => 'required|unique:users,name|min:5',
            'email' => 'required|email|unique:users,email'
        );

        $isSaved = $this->SaveRecord(new User, $data, $rules);

        return $isSaved;

    }

    public function formValidator(Validator $validator)
    {
        return $validator->errors()->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userData = User::findOrFail($id);

        return response()->json($userData);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->deleteRecords(new User, 'id', $id);

        return $this->index();

    }

    public function multipleDelete(Request $request)
    {

        $this->deleteRecords(new User, 'id', $request->all());

        return $this->index();

    }
}
