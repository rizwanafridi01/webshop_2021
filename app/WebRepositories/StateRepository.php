<?php


namespace App\WebRepositories;


use App\Http\Requests\Location\StateRequest;
use App\Models\Country;
use App\Models\State;
use App\WebRepositories\Interfaces\IStateRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StateRepository implements IStateRepositoryInterface
{

    public function index()
    {
        // TODO: Implement index() method
        abort_if(Gate::denies('state_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        if(request()->ajax())
        {
            return datatables()->of(State::latest()->get())
                ->addColumn('show', function ($data) {
                    $button ='<a href="'.route('admin.states.show', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-folder-plus me-0"></i></a>';
                    return $button;
                })
                ->addColumn('edit', function ($data) {
                    $button ='<a href="'.route('admin.states.edit', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-pen me-0"></i></a>';
                    return $button;
                })
                ->addColumn('delete', function ($data) {
                    $button = '<form action="'.route('admin.states.destroy', $data->id).'" method="POST"  id="">';
                    $button .= @csrf_field();
                    $button .= @method_field('DELETE');
                    $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 20px; margin-left: 5px" class="bx bx-trash"></i></button>';
                    $button .= '</form>';
                    return $button;
                })
                ->addColumn('isActive', function($data) {
                    if($data->isActive == true){
                        $button = '<form action="'.route('admin.states.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="0" >';
                        $button .= '<button type="submit" class="btn btn-outline-success" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-check"> </i></button>';
                        return $button;
                    }else{
                        $button = '<form action="'.route('admin.states.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="1" >';
                        $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-no-entry"> </i></button>';
                        return $button;
                    }
                })
                ->addColumn('country.name', function($data) {
                    return $data->country->name ?? "No Country";
                })
                ->rawColumns([
                    'show',
                    'edit',
                    'delete',
                    'isActive',
                    'country.name',
                    // 'state.Name'
                ])
                ->make(true);
        }
        return view('admin.states.index');
    }

    public function create()
    {
        // TODO: Implement create() method.
        abort_if(Gate::denies('state_create'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $countries = Country::all();
        return view('admin.states.create',compact('countries'));
    }

    public function store(StateRequest $request)
    {
        // TODO: Implement store() method.
        $user_id = session('user_id');
        $company_id = session('company_id');
        $state = [
            'name' =>$request->name,
            'country_id' =>$request->country_id ?? 0,
            'user_id' =>$user_id ?? 0,
            'company_id' =>$company_id ?? 0,
        ];
        State::create($state);
        return redirect()->route('admin.states.index');
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
        $state = State::find($id);
        $user_id = session('user_id');
        if ($request->activeRequest == "checkActive") {
            $state->update([
                'isActive' => $request->isActive,
                'user_id' => $user_id ?? 0,
            ]);
        }
        else{
            $state->update([
                'name' => $request->name,
                'country_id' => $request->country_id ?? 0,
                'user_id' => $user_id ?? 0,
            ]);
        }
        return redirect()->route('admin.states.index');
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        abort_if(Gate::denies('state_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $state = State::with('country')->find($id);
        return view('admin.states.show',compact('state'));
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        abort_if(Gate::denies('state_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $countries = Country::all();
        $state = State::find($id);
        return view('admin.states.edit',compact('state','countries'));
    }

    public function destroy_temp(Request $request, $id)
    {
        // TODO: Implement destroy_temp() method.
        abort_if(Gate::denies('state_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = State::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.states.index');
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
