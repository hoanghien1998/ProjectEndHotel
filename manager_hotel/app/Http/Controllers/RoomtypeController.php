<?php

namespace App\Http\Controllers;

use App\Roomtype;
use Illuminate\Http\Request;

class RoomtypeController extends Controller
{
    //
    public function index(){
        return Roomtype::all();
    }

    public function create(){

    }

    public function store(Request $request){
        $request->validate([
            'roomtype_name'=> 'required',
            'roomtype_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'roomtype_price'=>'required|integer'
        ]);
        $data=[
            'name'=>$request->roomtype_name,
            'price'=>$request->roomtype_price,
        ];

        // Kiểm tra tồn tại file
        if($request->hasFile('roomtype_image')){
            $file=$request->roomtype_image;
            //Kiểm tra file upload lên thành công không
            if($request->file('roomtype_image')->isValid()){
                //Di chuyển file vào folder lưu trữ
                $file->move('public/uploads',$file->getClientOriginalName());
                $image='public/uploads/'.$file->getClientOriginalName();
                $data['images'] = $image;
            }
        }

        Roomtype::create($data);
        return $data;
    }

    public function update(Request $request,$id){
        $request->validate([
            'roomtype_name'=> 'required',
            // 'roomtype_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'roomtype_price'=>'required|integer'
        ]);
        $data=[
            'name'=>$request->roomtype_name,
            'price'=>$request->roomtype_price,
        ];

        // Kiểm tra tồn tại file
        if($request->hasFile('roomtype_image')){
            $file=$request->roomtype_image;
            //Kiểm tra file upload lên thành công không
            if($request->file('roomtype_image')->isValid()){
                //Di chuyển file vào folder lưu trữ
                $file->move('public/uploads',$file->getClientOriginalName());
                $image='public/uploads/'.$file->getClientOriginalName();
                $data['images'] = $image;
            }
        }
        // Roomtype::where('id',$id)->update($data);
        return $request;
    }

    public function delete($id){
        $roomtype=Roomtype::find($id);
        $roomtype->delete();
        return redirect('api/roomtype/viewRoomType')->with('status','xóa thành công');
    }

}
