<?php

namespace App\Repositories\Departments;

use Illuminate\Support\Collection;

interface DepartmentRepositoryInterface
{
    public function index();

    public function store($request);

    public function show($department);

    public function update($request, $department);

    public function delete($department);

}
