<?php

namespace App\Http\Controllers;

use App\Production;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    use FileSaver;
    public function addProduction(){
        return view('admin.production.add-production');
    }
    public function insertProduction(Request $request){
        //return $request->all();
        $production = new Production();
        $production->production_name = $request->production_name;
        $production->image_size = $request->image_size;
        $production->save();
        $this->fileUpload($request->production_img_one, $production, 'production_img_one',"");
        $this->fileUpload($request->production_img_two, $production, 'production_img_two',"");
        $this->fileUpload($request->production_img_three, $production, 'production_img_three',"");
        return redirect('/product/add-production');

    }

}
