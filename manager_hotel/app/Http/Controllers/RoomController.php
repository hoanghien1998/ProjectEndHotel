<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Room;
use App\RoomType;


class RoomController extends Controller
{
    //
    //show room
    public function index(){
        $room=DB::table('rooms')->join('roomtypes','roomtypes.id','=','rooms.typeCode')
        ->select('rooms.id','rooms.roomNumber','roomtypes.name','rooms.state')->get();

        $roomtype=RoomType::all();
        $data=[$room,$roomtype];

        return $data;
    }

    public function create(){

    }
    // khi create xong sẽ redirect qua store xử lý
    public function store(Request $request){
        $data = [
            'roomNumber' => $request->room_roomNumber,
            'typeCode'=>$request->room_typeCode,
        ];
        Room::create($data);
        return Room::all();
    }

    //update
    public function update(Request $request,$id){
        $data=[
            'roomNumber'=>$request->room_roomNumber,
            'typeCode'=>$request->room_typeCode,
            'state'=>$request->room_state
        ];
        Room::where('id',$id)->update($data);
        return $request->all();
    }

    //delete
    public function delete($id){
        $room=Room::find($id);
        $room->delete();
        return redirect('api/room/viewRoom')->with('status','xóa thành công');
    }

}
