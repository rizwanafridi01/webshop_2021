<?php


namespace App\WebRepositories;


use App\Http\Requests\Company\CompanyRequest;
use App\Http\Requests\Location\StoreCountryRequest;
use App\Models\Company;
use App\Models\Country;
use App\Models\Region;
use App\WebRepositories\Interfaces\ICompanyRepositoryInterface;
use App\WebRepositories\Interfaces\ICountryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CompanyRepository implements ICompanyRepositoryInterface
{

    public function index()
    {
        // TODO: Implement index() method.
        abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        if(request()->ajax())
        {
            return datatables()->of(Company::latest()->get())
                ->addColumn('show', function ($data) {
                    $button ='<a href="'.route('admin.companies.show', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-folder-plus me-0"></i></a>';
                    return $button;
                })
                ->addColumn('edit', function ($data) {
                    $button ='<a href="'.route('admin.companies.edit', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-pen me-0"></i></a>';
                    return $button;
                })
                ->addColumn('delete', function ($data) {
                    $button = '<form action="'.route('admin.companies.destroy', $data->id).'" method="POST"  id="">';
                    $button .= @csrf_field();
                    $button .= @method_field('DELETE');
                    $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 20px; margin-left: 5px" class="bx bx-trash"></i></button>';
                    $button .= '</form>';
                    return $button;
                })
                ->addColumn('isActive', function($data) {
                    if($data->isActive == true){
                        $button = '<form action="'.route('admin.companies.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="0" >';
                        $button .= '<button type="submit" class="btn btn-outline-success" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-check"> </i></button>';
                        return $button;
                    }else{
                        $button = '<form action="'.route('admin.companies.update', $data->id).'" method="POST"  class="">';
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
        return view('admin.companies.index');
    }

    public function create()
    {
        // TODO: Implement create() method.
        abort_if(Gate::denies('company_create'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $regions = Region::all();
        return view('admin.companies.create',compact('regions'));
    }

    public function store(CompanyRequest $request)
    {
        // TODO: Implement store() method.
        $user_id = session('user_id');
        $company = [
            'name' =>$request->name,
            'representative' =>$request->representative ?? null,
            'phone' =>$request->phone ?? null,
            'mobile' =>$request->phone ?? null,
            'address' =>$request->phone ?? null,
            'postCode' =>$request->postCode ?? null,
            'description' =>$request->description ?? null,
            'region_id' =>$request->region_id ?? 0,
            'user_id' =>$user_id ?? 0,
        ];
        Company::create($company);
        return redirect()->route('admin.companies.index');
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
        $company = Company::find($id);
        $user_id = session('user_id');
        if ($request->activeRequest == "checkActive") {
            $company->update([
                'isActive' => $request->isActive,
                'user_id' => $user_id ?? 0,
            ]);
        }
        else{
            $company->update([
                'name' => $request->name,
                'representative' =>$request->representative ?? null,
                'phone' =>$request->phone ?? null,
                'address' =>$request->phone ?? null,
                'mobile' =>$request->phone ?? null,
                'postCode' =>$request->postCode ?? null,
                'description' =>$request->description ?? null,
                'region_id' =>$request->region_id ?? 0,
                'user_id' =>$user_id ?? 0,
            ]);
        }
        return redirect()->route('admin.companies.index');
    }

    public function getById($Id)
    {
        // TODO: Implement getById() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $company = Company::with('region')->find($id);
        return view('admin.companies.show',compact('company'));
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        abort_if(Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $regions = Region::with('city.state.country')->get();
        $company = Company::find($id);
        return view('admin.companies.edit',compact('regions','company'));
    }

    public function destroy_temp(Request $request, $id)
    {
        // TODO: Implement destroy_temp() method.
        abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = Company::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.companies.index');
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
