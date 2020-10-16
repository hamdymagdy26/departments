<?php

namespace App\Services\Departments;

use Illuminate\Support\Collection;

interface DepartmentServiceInterface
{
    public function index();

    public function store($request);

    public function show($department);

    public function update($request, $department);

    public function delete($department);

}
