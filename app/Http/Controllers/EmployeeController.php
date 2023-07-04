<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Http\Requests\StoreemployeeRequest;
use App\Http\Requests\UpdateemployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = employee::all();
        

        return view('admin.employee.employee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreemployeeRequest $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateemployeeRequest $request, employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employee $employee)
    {
        //
    }


    public function saveRecord(Request $request)
    {

        

        $request->validate([
            'name'        =>  'required|string|max:255',
            'email'       => 'required|string|email',
            'birth_date'   => 'required',
            'company'     => 'required',
            'password'    => 'required',
            'company'     => 'required',
            'Joining_Date'=> 'required',
        ]);

        

        DB::beginTransaction();
        try {

            $employees = employee::where('email', '=', $request->email)->first();
            if ($employees === null) {

                $employee = new employee();
                $employee->name         = $request->name;
                $employee->email        = $request->email;
                $employee->birth_date   = $request->birth_date;
                $employee->company      = $request->company;
                $employee->password     = $request->password;
                $employee->company      = $request->company;
                $employee->Joining_Date = $request->Joining_Date;
                $employee->save();

            //     for ($i = 0; $i < count($request->id_count); $i++) {
            //         $module_permissions = [
            //             'employee_id' => $request->employee_id,
            //             'module_permission' => $request->permission[$i],
            //             'id_count'          => $request->id_count[$i],
            //             'read'              => $request->read[$i],
            //             'write'             => $request->write[$i],
            //             'create'            => $request->create[$i],
            //             'delete'            => $request->delete[$i],
            //             'import'            => $request->import[$i],
            //             'export'            => $request->export[$i],
            //         ];
            //         DB::table('module_permissions')->insert($module_permissions);
            //     }

                DB::commit();
                Toastr::success('Add new employee successfully :)', 'Success');
               return redirect()->back();
            } else {
                DB::rollback();
                Toastr::error('Add new employee exits :)', 'Error');
               return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Add new employee fail :)', 'Error');
            return redirect()->back();
        }
    }

    // delete record
    public function deleteRecord($id)
    {

       
        DB::beginTransaction();
        try {

            Employee::where('id', $id)->delete();
            

            DB::commit();
            Toastr::success('Delete record successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Delete record fail :)', 'Error');
            return redirect()->back();
        }
    }
}
