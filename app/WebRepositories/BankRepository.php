<?php


namespace App\WebRepositories;


use App\Http\Requests\Bank\BankRequest;
use App\Models\Bank;
use App\Models\Region;
use App\WebRepositories\Interfaces\IBankRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BankRepository implements IBankRepositoryInterface
{

    public function index()
    {
        // TODO: Implement index() method.
        abort_if(Gate::denies('bank_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        if(request()->ajax())
        {
            return datatables()->of(Bank::latest()->get())
                ->addColumn('show', function ($data) {
                    $button ='<a href="'.route('admin.banks.show', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-folder-plus me-0"></i></a>';
                    return $button;
                })
                ->addColumn('edit', function ($data) {
                    $button ='<a href="'.route('admin.banks.edit', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-pen me-0"></i></a>';
                    return $button;
                })
                ->addColumn('delete', function ($data) {
                    $button = '<form action="'.route('admin.banks.destroy', $data->id).'" method="POST"  id="">';
                    $button .= @csrf_field();
                    $button .= @method_field('DELETE');
                    $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 20px; margin-left: 5px" class="bx bx-trash"></i></button>';
                    $button .= '</form>';
                    return $button;
                })
                ->addColumn('isActive', function($data) {
                    if($data->isActive == true){
                        $button = '<form action="'.route('admin.banks.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="0" >';
                        $button .= '<button type="submit" class="btn btn-outline-success" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-check"> </i></button>';
                        return $button;
                    }else{
                        $button = '<form action="'.route('admin.banks.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="1" >';
                        $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-no-entry"> </i></button>';
                        return $button;
                    }
                })
                ->rawColumns([
                    'show',
                    'edit',
                    'delete',
                    'isActive',
                    // 'state.Name'
                ])
                ->make(true);
        }
        return view('admin.banks.index');
    }

    public function create()
    {
        // TODO: Implement create() method.

        abort_if(Gate::denies('bank_create'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        return view('admin.banks.create');
    }

    public function store(BankRequest $request)
    {
        // TODO: Implement store() method.
        $user_id = session('user_id');
        $company_id = session('company_id');
        $bank = [
            'name' =>$request->name,
            'branch' =>$request->branch,
            'contactNumber' =>$request->contactNumber,
            'address' =>$request->address,
            'description' =>$request->description,
            'user_id' =>$user_id ?? 0,
            'company_id' =>$company_id ?? 0,
        ];
        Bank::create($bank);
        return redirect()->route('admin.banks.index');
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
        $bank = Bank::find($id);
        $user_id = session('user_id');
        if ($request->activeRequest == "checkActive") {
            $bank->update([
                'isActive' => $request->isActive,
                'user_id' => $user_id ?? 0,
            ]);
        }
        else{
            $bank->update([
                'name' =>$request->name,
                'branch' =>$request->branch,
                'contactNumber' =>$request->contactNumber,
                'address' =>$request->address,
                'description' =>$request->description,
                'user_id' =>$user_id ?? 0,
            ]);
        }
        return redirect()->route('admin.banks.index');
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        $bank = Bank::find($id);
        return view('Admin.banks.show',compact('bank'));
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        abort_if(Gate::denies('bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $bank = Bank::find($id);
        return view('admin.banks.edit',compact('bank'));
    }

    public function destroy_temp(Request $request, $id)
    {
        // TODO: Implement destroy_temp() method.
        abort_if(Gate::denies('bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = Bank::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.banks.index');
    }

    public function restore($Id)
    {
        // TODO: Implement restore() method.
    }

    public function trashed()
    {
        // TODO: Implement trashed() method.
    }
}
