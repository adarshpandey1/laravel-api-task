<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Http\Resources\EmployerResource;
use Illuminate\Support\Facades\Validator;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employer=Employer::all();
        return $this->sendResponse(new EmployerResource($employer), 'success');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'image_url' => 'required',
            'title' => 'required',
            'role' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $employer = Employer::create($input);
        return $this->sendResponse(new EmployerResource($employer), 'Employer Created Successfully.');
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
        $employer = Employer::findOrFail($id);
        $employer->update($request->all());
        return $this->sendResponse(new EmployerResource($employer), 'Employer Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employer=Employer::find($id);
        $employer=Employer::destroy($id);
        return $this->sendResponse('success','Employer deleted Successfully.');
    }
}
