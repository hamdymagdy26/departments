<?php

namespace App\Services\Departments;

use App\Repositories\Departments\DepartmentRepositoryInterface;
use App\Services\Departments\DepartmentServiceInterface;

class DepartmentService implements DepartmentServiceInterface
{
    /** @var DepartmentServiceInterface */
    private $departmentServiceInterface;

    public function __construct(DepartmentRepositoryInterface $departmentServiceInterface)
    {
        $this->departmentRepositoryInterface = $departmentServiceInterface;
    }

    public function index()
    {
        return $this->departmentRepositoryInterface->index();
    }

    public function store($request)
    {
        return $this->departmentRepositoryInterface->store($request);
    }

    public function show($department)
    {
        return $this->departmentRepositoryInterface->show($department);
    }

    public function update($request, $department)
    {
        return $this->departmentRepositoryInterface->update($request, $department);
    }

    public function delete($department)
    {
        return $this->departmentRepositoryInterface->delete($department);
    }
}
