<?php


namespace App\WebRepositories;


use App\Http\Requests\Product\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductClassification;
use App\Models\ProductGallery;
use App\Models\SubCategory;
use App\WebRepositories\Interfaces\IProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProductRepository implements IProductRepositoryInterface
{

    public function index()
    {
        // TODO: Implement index() method.
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        if(request()->ajax())
        {
            return datatables()->of(Product::latest()->get())
                ->addColumn('show', function ($data) {
                    $button ='<a href="'.route('admin.products.show', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-folder-plus me-0"></i></a>';
                    return $button;
                })
                ->addColumn('edit', function ($data) {
                    $button ='<a href="'.route('admin.products.edit', $data->id).'"  class="btn btn-outline-primary"><i style="font-size: 20px" class="bx bx-pen me-0"></i></a>';
                    return $button;
                })
                ->addColumn('delete', function ($data) {
                    $button = '<form action="'.route('admin.products.destroy', $data->id).'" method="POST"  id="">';
                    $button .= @csrf_field();
                    $button .= @method_field('DELETE');
                    $button .= '<button type="submit" class="btn btn-outline-danger" onclick="return confirm()"><i style="font-size: 20px; margin-left: 5px" class="bx bx-trash"></i></button>';
                    $button .= '</form>';
                    return $button;
                })
                ->addColumn('isActive', function($data) {
                    if($data->isActive == true){
                        $button = '<form action="'.route('admin.products.update', $data->id).'" method="POST"  class="">';
                        $button .= @csrf_field();
                        $button .= @method_field('PUT');
                        $button .= '<input type="hidden" name="activeRequest" value="checkActive" >';
                        $button .= '<input type="hidden" name="isActive" value="0" >';
                        $button .= '<button type="submit" class="btn btn-outline-success" onclick="return confirm()"><i style="font-size: 25px; margin-left: 5px" class="bx bx-check"> </i></button>';
                        return $button;
                    }else{
                        $button = '<form action="'.route('admin.products.update', $data->id).'" method="POST"  class="">';
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
        return view('admin.products.index');
    }

    public function create()
    {
        // TODO: Implement create() method.
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $categories = Category::where('isActive','1')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
//        dd($request);
//        return response()->json(['success'=>$request->all()]);
//        // TODO: Implement store() method.
//dd(request());
        request()->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'galleryImages.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);
        $user_id = session('user_id');
        $company_id = session('company_id');
        if ($request->hasFile('thumbnail')){

            $thumbnail = $request->file('thumbnail');
            $fileName = time().'_'.rand(1,99999999).'_'.$thumbnail->getClientOriginalName();
            // File extension
            $extension = $thumbnail->getClientOriginalExtension();
            //file location
            $location = 'files';
            // Upload file
            $thumbnail->move($location,$fileName);
            // File path
            $filepath = url('files/'.$fileName);

            $product = new Product();
            $product->name = $request->name;
            $product->thumbnail = $fileName;
            $product->sub_category_id = $request->subCategory_id;
            $product->amount = $request->amount;
            $product->discount = $request->discount;
            $product->currentAmount = $request->amount - $request->discount;
            $product->excerpt = $request->excerpt;
            $product->uses = $request->uses;
            $product->shippingInstruction = $request->shippingInstruction;
            $product->description = $request->description;
            $product->user_id = $user_id;
            $product->company_id = $company_id;
            $product->save();

            $classificationName = $request->classificationName;
            $classificationDesc = $request->classificationDesc;
            foreach($classificationName as $key => $no)
            {
//                dd($classificationDesc[$key]);
                $input['name'] = $no;
                $input['description'] = $classificationDesc[$key];
                $input['product_id'] = $product->id;
                $input['user_id'] = $user_id;
                $input['company_id'] = $company_id;
                ProductClassification::create($input);
            }

            if ($files = $request->file('galleryImages')) {
                // Define upload path
                $destinationPath = public_path('/files/'); // upload path
                foreach($files as $img) {
                    // Upload Orginal Image
                    $profileImage =time().'_'.rand(1,9999999).'_'.$img->getClientOriginalName();
                    $img->move($destinationPath, $profileImage);
                    // Save In Database
                    $imagemodel= new ProductGallery();
                    $imagemodel->galleryImages= $profileImage;
                    $imagemodel->product_id= $product->id;
                    $imagemodel->user_id = $user_id;
                    $imagemodel->company_id = $company_id;
                    $imagemodel->save();
                }
            }

        }
        return back()->with('success', 'Product has been submitted Upload successfully');
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
//        dd($request);
        $product = Product::find($id);
        $user_id = session('user_id');
        if ($request->activeRequest == "checkActive") {
            $product->update([
                'isActive' => $request->isActive,
                'user_id' => $user_id ?? 0,
            ]);
        }
        else {
//            request()->validate([
//                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
//                'galleryImages.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
//            ]);
            $user_id = session('user_id');
            $company_id = session('company_id');
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $fileName = time() . '_' . rand(1, 99999999) . '_' . $thumbnail->getClientOriginalName();
                // File extension
                $extension = $thumbnail->getClientOriginalExtension();
                //file location
                $location = 'files';
                // Upload file
                $thumbnail->move($location, $fileName);
                // File path
                $filepath = url('files/' . $fileName);
            } else {
                $fileName = $request->previousName;
//                dd($fileName);
            }
            $product->name = $request->name;
            $product->thumbnail = $fileName;
            $product->sub_category_id = $request->subCategory_id;
            $product->amount = $request->amount;
            $product->discount = $request->discount;
            $product->currentAmount = $request->amount - $request->discount;
            $product->excerpt = $request->excerpt;
            $product->uses = $request->uses;
            $product->shippingInstruction = $request->shippingInstruction;
            $product->description = $request->description;
            $product->user_id = $user_id;
//                $product->company_id = $company_id;
            $product->save();

            ProductClassification::where('product_id', array($id))->delete();
            $classificationName = $request->classificationName;
            $classificationDesc = $request->classificationDesc;
            if ($classificationName != null) {
                foreach ($classificationName as $key => $no) {
//                dd($classificationDesc[$key]);
                    $input['name'] = $no;
                    $input['description'] = $classificationDesc[$key];
                    $input['product_id'] = $product->id;
                    $input['user_id'] = $user_id;
                    ProductClassification::create($input);
                }
            }

            ProductGallery::where('product_id', array($id))->delete();

            $previousImageName = $request->previousImageName;
            if ($previousImageName != null)
            {
                foreach($previousImageName as $key1 => $no1)
                {
                    $imagemodel= new ProductGallery();
                    $imagemodel->galleryImages = $no1;
                    $imagemodel->product_id = $product->id;
                    $imagemodel->save();
                }
            }

            if ($files = $request->file('galleryImages')) {
                // Define upload path
                $destinationPath = public_path('/files/'); // upload path
                foreach($files as $img) {
                    // Upload Orginal Image
                    $profileImage =time().'_'.rand(1,9999999).'_'.$img->getClientOriginalName();
                    $img->move($destinationPath, $profileImage);
                    // Save In Database
                    $imagemodel= new ProductGallery();
                    $imagemodel->galleryImages= $profileImage;
                    $imagemodel->product_id= $product->id;
                    $imagemodel->user_id = $user_id;
                    $imagemodel->company_id = $company_id;
                    $imagemodel->save();
                }
            }

        }
        return redirect()->route('admin.products.index');
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $product = Product::with('product_classifications','product_galleries','sub_category')->find($id);
        $categories = Category::where('isActive','1')->get();
        return view('admin.products.show',compact('product','categories'));
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $product = Product::with('product_classifications','product_galleries','sub_category')->find($id);
        $categories = Category::where('isActive','1')->get();
        return view('admin.products.edit',compact('product','categories'));
    }

    public function destroy_temp(Request $request, $id)
    {
        // TODO: Implement destroy_temp() method.
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = Product::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.products.index');
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
