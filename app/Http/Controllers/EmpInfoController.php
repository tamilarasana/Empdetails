<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=DB::select('select * from employees');
		return view('index',['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }
	public function search(Request $request)
	{
		$search=$request->get('search');
		$employees=DB::table('employees')->where('emp_name','like','%'.$search.'%')->paginate(10);
		return view('index',['employees' => $employees]);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp_name=$request->get('emp_name');
		$emp_department=$request->get('emp_department');
		$project=$request->get('project');
		$employees=DB::insert('insert into employees(emp_name,emp_department,project)value(?,?,?)',[$emp_name,$emp_department,$project]);
		if($employees){
			$red=redirect('employees')->with('success','Successfully added');
		}else{
			$red=redirect('employees/create')->with('danger','Input data failed,please try again');
		}			
		return $red;
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
        //
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
        $employees=DB::delete('delete from employees where id=?',[$id]);
		$red=redirect('employees');
		return $red;
    }
}
