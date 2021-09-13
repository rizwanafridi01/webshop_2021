<?php


namespace App\WebRepositories;


use App\Http\Requests\Location\CityRequest;
use App\Models\City;
use App\Models\State;
use App\WebRepositories\Interfaces\ICityRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CityRepository implements ICityRepositoryInterface
{

    public function index()
    {
        // TODO: Implement index() method.
        abort_if(Gate::denies('city_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        if(request()->ajax())
        {
            return datatables()->of(City::latest()->get())
                ->addColumn('show', function ($data) {
                    $button ='<a href="'.route('admin.cities.show', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-folder-plus me-0"></i></a>';
                    return $button;
                })
                ->addColumn('edit', function ($data) {
                    $button ='<a href="'.route('admin.cities.edit', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-pen me-0"></i></a>';
                    return $button;
                })
                ->addColumn('delete', function ($data) {
                    $button = '<form action="'.route('admin.cities.destroy', $data->id).'" method="POST"  id="">';
                    $button .= @csrf_field();
                    $button .= @method_field('DELETE');
                    $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 20px; margin-left: 5px" class="bx bx-trash"></i></button>';
                    $button .= '</form>';
                    return $button;
                })
                ->addColumn('isActive', function($data) {
                    if($data->isActive == true){
                        $button = '<form action="'.route('admin.cities.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="0" >';
                        $button .= '<button type="submit" class="btn btn-outline-success" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-check"> </i></button>';
                        return $button;
                    }else{
                        $button = '<form action="'.route('admin.cities.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="1" >';
                        $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-no-entry"> </i></button>';
                        return $button;
                    }
                })
                ->addColumn('state.name', function($data) {
                    return $data->state->name ?? "No State";
                })
                ->rawColumns([
                    'show',
                    'edit',
                    'delete',
                    'isActive',
                    'state.name',
                    // 'state.Name'
                ])
                ->make(true);
        }
        return view('admin.cities.index');
    }

    public function create()
    {
        // TODO: Implement create() method.
        abort_if(Gate::denies('city_create'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $states = State::all();
        return view('admin.cities.create',compact('states'));
    }

    public function store(CityRequest $request)
    {
        // TODO: Implement store() method.
        $user_id = session('user_id');
        $company_id = session('company_id');
        $city = [
            'name' =>$request->name,
            'state_id' =>$request->state_id ?? 0,
            'user_id' =>$user_id ?? 0,
            'company_id' =>$company_id ?? 0,
        ];
        City::create($city);
        return redirect()->route('admin.cities.index');
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
        $city = City::find($id);
        $user_id = session('user_id');
        if ($request->activeRequest == "checkActive") {
            $city->update([
                'isActive' => $request->isActive,
                'user_id' => $user_id ?? 0,
            ]);
        }
        else{
            $city->update([
                'name' => $request->name,
                'state_id' => $request->state_id ?? 0,
                'user_id' => $user_id ?? 0,
            ]);
        }
        return redirect()->route('admin.cities.index');
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        $city = City::with('state')->find($id);
        return view('admin.cities.show',compact('city'));
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        abort_if(Gate::denies('city_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $states = State::all();
        $city = City::find($id);
        return view('admin.cities.edit',compact('city','states'));
    }

    public function destroy_temp(Request $request, $id)
    {
        // TODO: Implement destroy_temp() method.
        abort_if(Gate::denies('city_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = City::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.cities.index');
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
