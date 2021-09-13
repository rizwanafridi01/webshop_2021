<?php


namespace App\WebRepositories;


use App\Http\Requests\Location\StoreCountryRequest;
use App\Http\Requests\Location\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\WebRepositories\Interfaces\ICountryRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class CountryRepository implements ICountryRepositoryInterface
{

    public function index()
    {
        // TODO: Implement index() method.
        abort_if(Gate::denies('country_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        if(request()->ajax())
        {
            return datatables()->of(Country::latest()->get())
                ->addColumn('show', function ($data) {
                    $button ='<a href="'.route('admin.countries.show', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-folder-plus me-0"></i></a>';
                    return $button;
                })
                ->addColumn('edit', function ($data) {
                    $button ='<a href="'.route('admin.countries.edit', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-pen me-0"></i></a>';
                    return $button;
                })
                ->addColumn('delete', function ($data) {
                    $button = '<form action="'.route('admin.countries.destroy', $data->id).'" method="POST"  id="">';
                    $button .= @csrf_field();
                    $button .= @method_field('DELETE');
                    $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 20px; margin-left: 5px" class="bx bx-trash"></i></button>';
                    $button .= '</form>';
                    return $button;
                })
                ->addColumn('isActive', function($data) {
                    if($data->isActive == true){
                        $button = '<form action="'.route('admin.countries.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="isActive" value="0" >';
                        $button .= '<button type="submit" class="btn btn-outline-success" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-check"> </i></button>';
                        return $button;
                    }else{
                        $button = '<form action="'.route('admin.countries.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="isActive" value="1" >';
                        $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-no-entry"> </i></button>';
                        return $button;
                    }
                })
                ->addColumn('check', function($row){

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                    return $btn;
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
        return view('admin.countries.index');
    }

    public static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
        abort_if(Gate::denies('country_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.countries.create');
    }

    public function store(StoreCountryRequest $storeCountryRequest)
    {
        // TODO: Implement store() method.
        $country = Country::create($storeCountryRequest->all());
        return redirect()->route('admin.countries.index');
    }

    public function update(Request $request, Country $country)
    {
        // TODO: Implement update() method.
        $country->update($request->all());

        return redirect()->route('admin.countries.index');
    }

    public function getById($Id)
    {
        // TODO: Implement getById() method.
    }

    public function show(Country $country)
    {
        // TODO: Implement show() method.
        abort_if(Gate::denies('country_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.countries.show', compact('country'));
    }

    public function edit(Country $country)
    {
        // TODO: Implement edit() method.
        abort_if(Gate::denies('country_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.countries.edit', compact('country'));
    }

    public function destroy_temp(Request $request, $id)
    {
        // TODO: Implement delete() method.
        abort_if(Gate::denies('country_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = Country::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.countries.index');
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
