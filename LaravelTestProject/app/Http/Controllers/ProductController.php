<?php

namespace App\Http\Controllers;

use App\ProductTable;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use FileSaver;

    public function addProduct(){
        return view('admin.product.add-product');
    }
    public function insertProduct(Request $request){
//       $image = $request->file('product_img');
//       $imageName = $image->getClientOriginalName();
//       $directory = 'product-img/';
//       $image->move($directory, $imageName);
       $product = new ProductTable();
       $product->product_name = $request->product_name;
       $product->product_code = $request->product_code;
       $product->description = $request->description;
//       $product->product_img = $directory.$imageName;
       $product->save();

        $this->fileUpload($request->product_img, $product, 'product_img',"");
       return redirect('product/product-info')->with('message', 'Product save Successfully Done');
    }
    public function productInfo(){
        return view('admin.product.product-info',[
            'products' => ProductTable::all()
        ]);
    }
    public function editProduct($id){
        return view('admin.product.edit-product',[
            'product' => ProductTable::find($id)
        ]);
    }
    public function updateProduct(Request $request){
        $image = $request->file('product_img');
        $product = ProductTable::find($request->id);
        if(isset($image)){
            if(file_exists($product->product_img)){
                unlink($product->product_img);
            }
            $imagePath = $this->uploadImage($image);
        }
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->description = $request->description;
        if($image){
            $product->product_img = $imagePath;
        }
        $product->save();
        return redirect('product/product-info');
    }
    public function uploadImage($image){
        $imageName = $image->getClientOriginalName();
        $directory = 'product-img/';
        $image->move($directory, $imageName);
        return $directory.$imageName;
    }
    public function deleteProduct($id){
        $product =  ProductTable::find($id);
        $product->delete();
        return redirect('product/product-info');
    }
}
