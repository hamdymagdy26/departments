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
        return $this->model->all();
    }

    /**
     * @return Collection
     * @param $request
     */
    public function store($request)
    {
        return $this->model->create([
            'name' => $request->get('name'),
            'desc' => $request->get('description'),
            'user_id' => Auth::user()->id,
        ]);
    }

    public function show($department)
    {
        return $department;
        // return $department->with('user')->first();
    }

    public function update($request, $department)
    {
        $department->update([
            'name' => $request->get('name'),
            'desc' => $request->get('description')
        ]);
        return $department;
    }

    public function delete($department)
    {
        $department->delete();
        return $department;
    }

}
