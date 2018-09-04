<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\RecordHelper;
use App\Modules\JSONResponseFormater;
use Illuminate\Validation\Validator;
use App\Role;

class RolesController extends Controller
{
    use RecordHelper, JSONResponseFormater;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all(['id','name','guard_name','created_at','updated_at']);

        $fields = [
            'name' => array('label' => 'Name'),
            'guard_name' => array('label' => 'Role Name')
        ];
        $this->responseJsonDataTable($roles, $fields,false, 'name', 'id');
        return response()->json($roles);
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
        $model = new Role();
        $data = $model->getFillable();
        $data = $request->only($data);

        $data['created_at'] = date('Y-m-d H:i:s');

        $rules = array(
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required',
        );

        $isSaved = $this->SaveRecord(new Role(), $data, $rules);

        return $isSaved;
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
        $roleData = Role::findOrFail($id);

        return response()->json($roleData);
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
        $data = $request->all();

        $updated = Role::where('id',$id)->update($data);

        if($updated){
            return $this->index();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->deleteRecords(new Role, 'id', $id);

        return $this->index();
    }

    public function multipleDelete(Request $request)
    {

        $this->deleteRecords(new Role, 'id', $request->all());

        return $this->index();

    }
}
