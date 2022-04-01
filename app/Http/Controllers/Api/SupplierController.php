<?php

namespace App\Http\Controllers\Api;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $supplier = Supplier::orderByDesc("created_at")->get();
        return response()->json($supplier, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|unique:suppliers|max:255',
            'email' => 'required',
            'phone' => 'required|unique:suppliers',
        ]);
        try {
            $image_url = null;
            if ($request->photo) {
                $position = strpos($request->photo, ';');
                $sub = substr($request->photo, 0, $position);
                $ext = explode('/', $sub)[1];

                $name = time() . "." . $ext;
                $img = Image::make($request->photo)->resize(240, 200);
                $upload_path = 'backend/supplier/';
                $image_url = $upload_path . $name;
                $img->save($image_url);
            }
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->shopname = $request->shopname;
            $supplier->address = $request->address;
            $supplier->photo = $image_url;
            $supplier->save();
            return response()->json($supplier, 201);
        } catch (\Throwable $e) {
            return response()->json($e->getMessage(), 400);
        } catch (\PDOException $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {

        return response()->json($supplier, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['shopname'] = $request->shopname;
        $data['address'] = $request->address;

        $image = $request->newphoto;

        if ($image) {
            $position = strpos($image, ';');
            $sub = substr($image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . "." . $ext;
            $img = Image::make($image)->resize(240, 200);
            $upload_path = 'backend/supplier/';
            $image_url = $upload_path . $name;
            $success = $img->save($image_url);

            if ($success) {
                $data['photo'] = $image_url;
                $img = Supplier::findOrFail($id);
                $image_path = $img->photo;
                $result = File::exists($image_path);
                if ($result) {
                    $done = unlink($image_path);
                }
            }
        } else {
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
        }
        $supplier = Supplier::findOrFail($id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {

        $photo = $supplier->photo;
        $result = File::exists($photo);
        if ($result != null) {
            unlink($photo);
        }
        $supplier->delete();
    }
}
