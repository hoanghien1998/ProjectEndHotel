<?php

namespace App\Http\Controllers;

use App\Roomtype;
use App\RoomType_Detail;
use Illuminate\Http\Request;

class RoomType_DetailController extends Controller
{
    //
    //xem chi tiết phòng

    public function index($room_type_id){
        $room_type_detail=RoomType_Detail::where('room_type_id',$room_type_id)->first();
        return $room_type_detail;
    }

    //Thêm chi tiết phòng
    public function store(Request $request,$room_type_id){
        $roomtype=Roomtype::find($room_type_id);
        if(isset($roomtype->id)){
            $data=[
                "dientich"=>$request->dientich,
                "huongphong"=>$request->huongphong,
                "giuong"=>$request->giuong,
                "room_type_id"=>$roomtype->id
            ];
            RoomType_Detail::create($data);
        }
        return RoomType_Detail::all();
    }

    //cập nhật
    public function update(Request $request,$room_type_id){
        $roomtype=Roomtype::find($room_type_id);
        if(isset($roomtype->id)){
            $data=[
                "dientich"=>$request->dientich,
                "huongphong"=>$request->huongphong,
                "giuong"=>$request->giuong
            ];
            RoomType_Detail::where('room_type_id',$roomtype->id)->update($data);
        }
        return RoomType_Detail::all();
    }

}
