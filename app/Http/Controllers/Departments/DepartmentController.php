<?php

namespace App\Http\Controllers\Departments;

use App\Services\Departments\DepartmentServiceInterface;
use App\Http\Controllers\Controller;
use App\Traits\General\ResponseHandler\ResponseHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDepartmentRequest;

class DepartmentController extends Controller
{
    use ResponseHandler;

    /** @var AuthService */
    private $departmentServiceInterface;

    /**
     * AuthController constructor.
     * @param DepartmentServiceInterface $departmentServiceInterface
     */
    public function __construct(DepartmentServiceInterface $departmentServiceInterface)
    {
        $this->departmentServiceInterface = $departmentServiceInterface;
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
    	$data = $this->departmentServiceInterface->index();
        return $this->successResponse([$data], 200);
    }

    /**
     * @return JsonResponse
     * @param StoreDepartmentRequest
     */
    public function store(StoreDepartmentRequest $storeDepartmentRequest)
    {
    	$data = $this->departmentServiceInterface->store($storeDepartmentRequest);
        return $this->successResponse([$data], 200);
    }

    /**
     * @return JsonResponse
     * @param $department
     */
    public function show($department)
    {
    	$data = $this->departmentServiceInterface->show($department);
        return $this->successResponse([$data], 200);
    }

    /**
     * @return JsonResponse
     * @param Request | $department
     */
    public function update(StoreDepartmentRequest $request, $department)
    {
    	$data = $this->departmentServiceInterface->update($request, $department);
        return $this->successResponse([$data], 200);
    }

    /**
     * @return JsonResponse
     * @param $department
     */
    public function delete($department)
    {
    	$data = $this->departmentServiceInterface->delete($department);
        return $this->successResponse([$data], 200);
    }
}
