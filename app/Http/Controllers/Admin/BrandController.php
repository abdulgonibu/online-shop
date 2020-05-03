<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Exception;
use phpDocumentor\Reflection\Type;

class BrandController extends Controller
{
    public function index(){
      $brands =Brand::get();
        return view('admin.brand.manage', compact('brands'));
    }

    public function create(){
        return view('admin.brand.create');
    }

    public function store(Request $request){
        $request->validate([
            'brand_name' => 'required'
        ]);

        $brand = null;
        try {
            $brand_name = $request->brand_name;
            $brand = Brand::create([
               'brand_name' => $brand_name,
               'brand_slug' => slugify($brand_name),
               'status' => '1',
            ]);
            $brand = true ;
        } catch (Exception $exception){
            $brand = false;
        }
        if ($brand === true){
            setMessage('success','Yes ! A Brand has been Successfully Create');
        }else{
            setMessage('danger','Oops ! Unable to create a new brand');
        }
        return redirect()->back();

    }
    public function edit($id)
    {
        $id    = base64_decode($id);
        $brand = Brand::find($id);

        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);

        $request->validate([
            'brand_name' => 'required'
        ]);

        $success = null;
        try {
            $brand_name = $request->brand_name;
            $brand->update([
                'brand_name' => $brand_name,
                'brand_slug' => slugify($brand_name)
            ]);
            $success = true;
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success === true) {
            setMessage('success', 'Yay! A brand has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update brand.');
        }
        return redirect()->back();
    }

    public function delete($id){
        $id = base64_decode($id);
        $brand = Brand::find($id);
        $brand->delete();
        setMessage('success','Brand has been Successfully Delete');
        return redirect()->back();

    }
    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $brand         = Brand::find($id);
        $brand->status = $status;
        if ($brand->save()) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
