<?php


namespace App\WebRepositories;


use App\Http\Requests\Product\UniteRequest;
use App\Models\Product;
use App\Models\Unit;
use App\WebRepositories\Interfaces\IUnitRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UnitRepository implements IUnitRepositoryInterface
{

    public function index()
    {
        // TODO: Implement index() method.
        abort_if(Gate::denies('unit_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        if(request()->ajax())
        {
            return datatables()->of(Unit::latest()->get())
                ->addColumn('show', function ($data) {
                    $button ='<a href="'.route('admin.units.show', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-folder-plus me-0"></i></a>';
                    return $button;
                })
                ->addColumn('edit', function ($data) {
                    $button ='<a href="'.route('admin.units.edit', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-pen me-0"></i></a>';
                    return $button;
                })
                ->addColumn('delete', function ($data) {
                    $button = '<form action="'.route('admin.units.destroy', $data->id).'" method="POST"  id="">';
                    $button .= @csrf_field();
                    $button .= @method_field('DELETE');
                    $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 20px; margin-left: 5px" class="bx bx-trash"></i></button>';
                    $button .= '</form>';
                    return $button;
                })
                ->addColumn('isActive', function($data) {
                    if($data->isActive == true){
                        $button = '<form action="'.route('admin.units.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="0" >';
                        $button .= '<button type="submit" class="btn btn-outline-success" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-check"> </i></button>';
                        return $button;
                    }else{
                        $button = '<form action="'.route('admin.units.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="1" >';
                        $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-no-entry"> </i></button>';
                        return $button;
                    }
                })
                ->addColumn('product.name', function($data) {
                    return $data->product->name ?? "No Product";
                })
                ->rawColumns([
                    'show',
                    'edit',
                    'delete',
                    'isActive',
                    'product.name',
                    // 'state.Name'
                ])
                ->make(true);
        }
        return view('admin.units.index');
    }

    public function create()
    {
        // TODO: Implement create() method.
        abort_if(Gate::denies('unit_create'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $products = Product::all();
        return view('admin.units.create',compact('products'));
    }

    public function store(UniteRequest $request)
    {
        // TODO: Implement store() method.
        $user_id = session('user_id');
        $company_id = session('company_id');
        $unit = [
            'name' =>$request->name,
            'product_id' =>$request->product_id ?? 0,
            'user_id' =>$user_id ?? 0,
            'company_id' =>$company_id ?? 0,
        ];
        Unit::create($unit);
        return redirect()->route('admin.units.index');
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
        abort_if(Gate::denies('unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $unit = Unit::find($id);
        $user_id = session('user_id');
        if ($request->activeRequest == "checkActive") {
            $unit->update([
                'isActive' => $request->isActive,
                'user_id' => $user_id ?? 0,
            ]);
        }
        else{
            $unit->update([
                'name' => $request->name,
                'product_id' => $request->product_id ?? 0,
                'user_id' => $user_id ?? 0,
            ]);
        }
        return redirect()->route('admin.units.index');
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        abort_if(Gate::denies('unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $unit = Unit::find($id);
        return view('admin.units.show',compact('unit'));
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        abort_if(Gate::denies('unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $products = Product::all();
        $unit = Unit::find($id);
        return view('admin.units.edit',compact('unit','products'));
    }

    public function destroy_temp(Request $request, $id)
    {
        // TODO: Implement destroy_temp() method.
        abort_if(Gate::denies('unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = Unit::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.units.index');
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
