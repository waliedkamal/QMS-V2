<?php 

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;


class DepartmentController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   * 
   * 
   * 
   */



  /** save record department */
  public function saveRecordDepartment( request $request)
  {
    $request->validate([
      'department'        => 'required|string|max:255',
    ]);

    DB::beginTransaction();
    try {

      $department = department::where('name', $request->department)->first();
      if ($department === null) {
        $department = new department();
        $department->name = $request->department;
        $department->description = $request->description;
        $department->save();

        DB::commit();
        toastr::success('Add new department successfully :)', 'Success');
        return redirect()->back();
      } else {
        DB::rollback();
        Toastr::error('Add new department exits :)', 'Error');
        return redirect()->back();
      }
    } catch (\Exception $e) {
      DB::rollback();
      Toastr::error('Add new department fail :)', 'Error');
      return redirect()->back();
    }
  }

  /** update record department */
  public function updateRecordDepartment(Request $request)
  {
    DB::beginTransaction();
    try {

      
      // update table departments
      $department = [
        'id' => $request->id,
        'name' => $request->department,
        'description' => $request->description,
      ];
      department::where('id', $request->id)->update($department);

      DB::commit();
      Toastr::success('updated record successfully :)', 'Success');
      return redirect()->back();
    } catch (\Exception $e) {
      DB::rollback();
      Toastr::error('updated record fail :)', 'Error');
      return redirect()->back();
    }
  }

  /** delete record department */
  public function deleteRecordDepartment(Request $request)
  {
    try {

      department::destroy($request->id);
      Toastr::success('Department deleted successfully :)', 'Success');
      return redirect()->back();
    } catch (\Exception $e) {

      DB::rollback();
      Toastr::error('Department delete fail :)', 'Error');
      return redirect()->back();
    }
  }
  public function index()
  {
    $departments = DB::table('departments')->get();

    return view('admin.department.department', compact('departments'));


  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }



  
}

