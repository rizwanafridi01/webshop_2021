<?php


namespace App\WebRepositories\Interfaces;


use App\Http\Requests\Product\UniteRequest;
use Illuminate\Http\Request;

interface IUnitRepositoryInterface
{
    public function index();

    public function create();

    public function store(UniteRequest $request);

    public function update(Request $request, $id);

    public function getById($id);

    public function show($id);

    public function edit($id);

    public function destroy_temp(Request $request, $id);

    public function restore($Id);

    public function trashed();
}
