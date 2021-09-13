<?php


namespace App\WebRepositories\Interfaces;


use App\Http\Requests\Bank\BankRequest;
use Illuminate\Http\Request;

interface IBankRepositoryInterface
{
    public function index();

    public function create();

    public function store(BankRequest $request);

    public function update(Request $request, $id);

    public function getById($id);

    public function show($id);

    public function edit($id);

    public function destroy_temp(Request $request, $id);

    public function restore($Id);

    public function trashed();
}
