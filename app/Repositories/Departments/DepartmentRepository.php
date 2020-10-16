<?php

namespace App\Repositories\Departments;

use App\Models\Department;
use Auth;
use Illuminate\Support\Collection;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    /** @var Department */
    private $model;

    /**
     * DepartmentRepository constructor.
     * @param Department $model
     */
    public function __construct(Department $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function index()
    {
        return $this->model->with('user')->get();
    }

    /**
     * @return Department
     * @param Rrequest
     */
    public function store($request)
    {
        return $this->model->create([
            'name' => $request->get('name'),
            'desc' => $request->get('description'),
            'user_id' => Auth::user()->id,
        ]);
    }

    /**
     * @return Department
     * @param Department
     */
    public function show($department)
    {
        $department_info = Department::where('id', $department)->first();
        if($department_info == null) {
            return response()->json([
                'success' => false,
                'message' => 'There is no record with this id '.$department,
            ],404);

        }
        return Department::where('id', $department)->with('user')->first();
    }

    /**
     * @param Request 
     * @param $department 
     */
    public function update($request, $department)
    {
        $department_info = Department::where('id', $department)->first();
        if($department_info == null) {
            return response()->json([
                'success' => false,
                'message' => 'There is no record with this id '.$department,
            ],404);

        }
        return $department_info->update([
            'name' => $request->get('name'),
            'desc' => $request->get('description')
        ]);
    }

    /**
     * @return Boolean
     * @param $department
     */
    public function delete($department)
    {
        $department_info = Department::where('id', $department)->first();
        if($department_info == null) {
            return response()->json([
                'success' => false,
                'message' => 'There is no record with id '.$department,
            ],404);

        }
        return $department_info->delete();
    }

}
