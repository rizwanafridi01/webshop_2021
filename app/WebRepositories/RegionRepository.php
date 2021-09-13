<?php


namespace App\WebRepositories;


use App\Http\Requests\Location\RegionRequest;
use App\Models\City;
use App\Models\Region;
use App\Models\State;
use App\WebRepositories\Interfaces\IRegionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RegionRepository implements IRegionRepositoryInterface
{

    public function index()
    {
        // TODO: Implement index() method.
        abort_if(Gate::denies('region_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        if(request()->ajax())
        {
            return datatables()->of(Region::latest()->get())
                ->addColumn('show', function ($data) {
                    $button ='<a href="'.route('admin.regions.show', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-folder-plus me-0"></i></a>';
                    return $button;
                })
                ->addColumn('edit', function ($data) {
                    $button ='<a href="'.route('admin.regions.edit', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-pen me-0"></i></a>';
                    return $button;
                })
                ->addColumn('delete', function ($data) {
                    $button = '<form action="'.route('admin.regions.destroy', $data->id).'" method="POST"  id="">';
                    $button .= @csrf_field();
                    $button .= @method_field('DELETE');
                    $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 20px; margin-left: 5px" class="bx bx-trash"></i></button>';
                    $button .= '</form>';
                    return $button;
                })
                ->addColumn('isActive', function($data) {
                    if($data->isActive == true){
                        $button = '<form action="'.route('admin.regions.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="0" >';
                        $button .= '<button type="submit" class="btn btn-outline-success" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-check"> </i></button>';
                        return $button;
                    }else{
                        $button = '<form action="'.route('admin.regions.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="1" >';
                        $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-no-entry"> </i></button>';
                        return $button;
                    }
                })
                ->addColumn('city.name', function($data) {
                    return $data->city->name ?? "No City";
                })
                ->rawColumns([
                    'show',
                    'edit',
                    'delete',
                    'isActive',
                    'city.name',
                    // 'state.Name'
                ])
                ->make(true);
        }
        return view('admin.regions.index');
    }

    public function create()
    {
        // TODO: Implement create() method.
        abort_if(Gate::denies('region_create'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $cities = City::all();
        return view('admin.regions.create',compact('cities'));
    }

    public function store(RegionRequest $request)
    {
        // TODO: Implement store() method.
        $user_id = session('user_id');
        $company_id = session('company_id');
        $city = [
            'name' =>$request->name,
            'city_id' =>$request->city_id ?? 0,
            'user_id' =>$user_id ?? 0,
            'company_id' =>$company_id ?? 0,
        ];
        Region::create($city);
        return redirect()->route('admin.regions.index');
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
        $region = Region::find($id);
        $user_id = session('user_id');
        if ($request->activeRequest == "checkActive") {
            $region->update([
                'isActive' => $request->isActive,
                'user_id' => $user_id ?? 0,
            ]);
        }
        else{
            $region->update([
                'name' => $request->name,
                'city_id' => $request->city_id ?? 0,
                'user_id' => $user_id ?? 0,
            ]);
        }
        return redirect()->route('admin.regions.index');
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        abort_if(Gate::denies('region_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $region = Region::with('city')->find($id);
        return view('Admin.regions.show',compact('region'));
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        abort_if(Gate::denies('region_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $cities = City::all();
        $region = Region::find($id);
        return view('admin.regions.edit',compact('region','cities'));
    }

    public function destroy_temp(Request $request, $id)
    {
        // TODO: Implement destroy_temp() method.
        abort_if(Gate::denies('region_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = Region::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.regions.index');
    }

    public function restore($Id)
    {
        // TODO: Implement restore() method.
    }

    public function trashed()
    {
        // TODO: Implement trashed() method.
    }

    public function locationDetails($id)
    {
        // TODO: Implement locationDetails() method.
        $regions = Region::with('city.state.country')->find($id);
        return response()->json($regions);
    }
}
