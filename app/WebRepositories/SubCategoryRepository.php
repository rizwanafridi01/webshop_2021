<?php

namespace App\WebRepositories;

use App\Http\Requests\Product\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\WebRepositories\Interfaces\ISubCategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SubCategoryRepository implements ISubCategoryRepositoryInterface
{

    public function index()
    {
        // TODO: Implement index() method.
        abort_if(Gate::denies('sub_category_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        if(request()->ajax())
        {
            return datatables()->of(SubCategory::latest()->get())
                ->addColumn('show', function ($data) {
                    $button ='<a href="'.route('admin.sub_categories.show', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-folder-plus me-0"></i></a>';
                    return $button;
                })
                ->addColumn('edit', function ($data) {
                    $button ='<a href="'.route('admin.sub_categories.edit', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-pen me-0"></i></a>';
                    return $button;
                })
                ->addColumn('delete', function ($data) {
                    $button = '<form action="'.route('admin.sub_categories.destroy', $data->id).'" method="POST"  id="">';
                    $button .= @csrf_field();
                    $button .= @method_field('DELETE');
                    $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 20px; margin-left: 5px" class="bx bx-trash"></i></button>';
                    $button .= '</form>';
                    return $button;
                })
                ->addColumn('isActive', function($data) {
                    if($data->isActive == true){
                        $button = '<form action="'.route('admin.sub_categories.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="0" >';
                        $button .= '<button type="submit" class="btn btn-outline-success" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-check"> </i></button>';
                        return $button;
                    }else{
                        $button = '<form action="'.route('admin.sub_categories.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="1" >';
                        $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-no-entry"> </i></button>';
                        return $button;
                    }
                })
                ->addColumn('categoryName', function($data) {
                    return $data->Category->name ?? "No Name";
                })
                ->rawColumns([
                    'show',
                    'edit',
                    'delete',
                    'isActive',
                    'categoryName',
                    // 'state.Name'
                ])
                ->make(true);
        }
        return view('admin.sub_categories.index');
    }

    public function create()
    {
        // TODO: Implement create() method.
        abort_if(Gate::denies('sub_category_create'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $categories = Category::where('isActive','1')->get();
        return view('admin.sub_categories.create', compact('categories'));
    }

    public function store(SubCategoryRequest $request)
    {
        // TODO: Implement store() method.
        $user_id = session('user_id');
        $company_id = session('company_id');
        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request->file('thumbnail');
            $fileName = time() . '_' . rand(1, 999) . '_' . $thumbnail->getClientOriginalName();
            // File extension
            $extension = $thumbnail->getClientOriginalExtension();
            //file location
            $location = 'files/cat';
            // Upload file
            $thumbnail->move($location, $fileName);
            // File path
            $filepath = url('files/cat/' . $fileName);
        }
        else{
            $location = 'files/cat';
            $fileName = "NO_IMAGE.png";
        }

        $sub_category = [
            'name' => $request->name,
            'slug' => $request->name,
            'thumbnail' => $location.'/'.$fileName,
            'description' =>$request->description ?? "Null",
            'user_id' =>$user_id ?? 0,
            'category_id' => $request->category_id ?? 0,
            'company_id' =>$company_id ?? 0,
        ];
        SubCategory::create($sub_category);
        return redirect()->route('admin.sub_categories.index');
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
        $sub_category = SubCategory::find($id);
        $user_id = session('user_id');
        if ($request->activeRequest == "checkActive") {
            $sub_category->update([
                'isActive' => $request->isActive,
                'user_id' => $user_id ?? 0,
            ]);
        }
        else{

            if ($request->hasFile('thumbnail')) {

                $thumbnail = $request->file('thumbnail');
                $fileName = time() . '_' . rand(1, 999) . '_' . $thumbnail->getClientOriginalName();
                // File extension
                $extension = $thumbnail->getClientOriginalExtension();
                //file location
                $location = 'files/cat';
                // Upload file
                $thumbnail->move($location, $fileName);
                // File path
                $filepath = url('files/cat/' . $fileName);
            }
            else{
                $fileName = $request->previousImage;
                if ($fileName == null)
                {
                    $fileName = "files/cat/NO_IMAGE.png";
                }
                else
                {
                    $fileName = $request->previousImage;
                }
            }

            $sub_category->update([
                'name' =>$request->name,
                'thumbnail' => $fileName,
                'description' =>$request->description,
                'user_id' =>$user_id ?? 0,
            ]);
        }
        return redirect()->route('admin.sub_categories.index');
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        $sub_categories = SubCategory::with('Category')->find($id);
        return view('admin.sub_categories.show', compact('sub_categories'));
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        abort_if(Gate::denies('sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::where('isActive', true)->get();
        $sub_category = SubCategory::find($id);
        return view('admin.sub_categories.edit',compact('categories','sub_category'));
    }

    public function destroy_temp(Request $request, $id)
    {
        // TODO: Implement destroy_temp() method.
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
