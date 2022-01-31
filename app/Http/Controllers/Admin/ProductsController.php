<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use App\Models\ProductClassification;
use App\Models\ProductGallery;
use App\WebRepositories\Interfaces\IProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $productRepository;
    public function __construct(IProductRepositoryInterface $productRepository){
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        return $this->productRepository->index();
    }

    public function create()
    {
        return $this->productRepository->create();
    }

    public function store(Request $request)
    {
        return $this->productRepository->store($request);
    }

    public function show($id)
    {
        return $this->productRepository->show($id);
    }

    public function edit($id)
    {
        return $this->productRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->productRepository->update($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->productRepository->destroy_temp($request, $id);
    }

    public function uploadimg()
    {
        return view('admin.test');
    }

    public function storeMultiFile(Request $request)
    {
///////////// A test Version //////////
        $validatedData = $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:csv,txt,xlx,xls,pdf'
        ]);

        if($request->TotalFiles > 0)
        {

//            for ($x = 0; $x < $request->TotalFiles; $x++)
//            {

                if ($request->hasFile('files'))
                {

                    $file = $request->file('files');

                    $filename = time().'_'.$file->getClientOriginalName();
                    return response()->json(['success'=>$request->all()]);
                    // File extension
                    $extension = $file->getClientOriginalExtension();

                    // File upload location
                    $location = 'files';

                    // Upload file
                    $file->move($location,$filename);

                    // File path
                    $filepath = url('files/'.$filename);

//                    $file      = $request->file('files');
//
//                    $path = $file->store('public/files');
//                    $name = $file->getClientOriginalName();
//
                    $insert['name'] = $filename;
////                    $insert[$x]['path'] = $path;
                }
//            }

            Product::insert($insert);

            return response()->json(['success'=>'Ajax Multiple fIle has been uploaded']);


        }
        else
        {
            return response()->json(["message" => "Please try again."]);
        }

    }

    public function file_upload()
    {
        return view('admin.test1');
    }

    public function store_file(Request $request)
    {
//        dd($request);
        request()->validate([
            'profileImage.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->save();

//        foreach($request->profileImage as $test) {
//            $classs = new ProductClassification();
//            $classs->name = $test;
//            $classs->product_id = $product->id;
//            $classs->save();
//        }

        if ($files = $request->file('profileImage')) {
            // Define upload path
            $destinationPath = public_path('/profile_images/'); // upload path
            foreach($files as $img) {
                // Upload Orginal Image
                $profileImage =$img->getClientOriginalName();
                $img->move($destinationPath, $profileImage);
                // Save In Database
                $imagemodel= new ProductGallery();
                $imagemodel->galleryImages= $profileImage;
                $imagemodel->product_id= $product->id;
                $imagemodel->save();
            }

        }
        return back()->with('success', 'Image Upload successfully');

    }

}
