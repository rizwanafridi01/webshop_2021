<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bank\BankRequest;
use App\WebRepositories\Interfaces\IBankRepositoryInterface;
use Illuminate\Http\Request;

class BankController extends Controller
{
    private $bankRepository;
    public function __construct(IBankRepositoryInterface $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }
    public function index()
    {
        return $this->bankRepository->index();
    }



    public function create()
    {
        return $this->bankRepository->create();
    }

    public function store(BankRequest $request)
    {
        return $this->bankRepository->store($request);
    }


    public function show($id)
    {
        return $this->bankRepository->show($id);
    }

    public function edit($id)
    {
        return $this->bankRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->bankRepository->update($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->bankRepository->destroy_temp($request, $id);
    }
}
