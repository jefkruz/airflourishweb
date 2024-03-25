<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Programme;
use Illuminate\Support\Str;
use App\Models\RoomAllocation;
use App\Models\RoomType;
use Illuminate\Http\Request;

class ProgrammesController extends Controller
{
    public function index()
    {
        $menu = new MenuController();
        $data['page_title'] = 'Programmes';
        $data['menu'] = $menu->fetchMenu();
        $data['view_route'] = (session('admin')->role == 'admin') ? 'admin.viewProgramme' : 'hotel.viewProgramme';
        $data['programmes'] = Programme::latest()->get();
        return view('pages.programmes', $data);
    }

    public function show($id)
    {
        $menu = new MenuController();
        $data['page_title'] = 'View Programme';
        $data['menu'] = $menu->fetchMenu();
        $data['programme'] = Programme::findOrFail($id);
        $data['hotels'] = Hotel::all();
        return view('pages.view_programme', $data);
    }

    public function edit(Request $request)
    {
       return $request;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $exists = Programme::whereName($request->name)->exists();
        if($exists){
            return back()->with('error', 'Programme exists already');
        }

        $active = Programme::whereStatus('active')->get();
        foreach($active as $item){
            $item->status = 'inactive';
            $item->save();
        }

        $p = new Programme();
        $p->name = $request->name;
        $p->slug = Str::slug($request->name);
        $p->status = 'active';
        $p->save();

        return back()->with('message', 'Programme added');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'status' => 'required'
        ]);

        if($request->status == 'active'){
            $all = Programme::whereStatus('active')->get();
            foreach($all as $item){
                $item->status = 'inactive';
                $item->save();
            }
        }

        $prog = Programme::findOrFail($request->id);
        $prog->name = $request->name;
        $prog->slug = Str::slug($request->name);
        $prog->status = $request->status;
        $prog->save();

        return back()->with('message', 'Programme updated');
    }

    public function saveRoomAllocations($programme_id, Request $request)
    {
        $request->validate([
            'hotel_id' => 'required'
        ]);

        $room_types = RoomType::where('hotel_id', $request->hotel_id)->get();
        foreach($room_types as $room_type){
            if($request->has('room-' . $room_type->id)){
                $allocation = RoomAllocation::where('programme_id', $programme_id)
                    ->where('hotel_id', $request->hotel_id)->where('room_id', $room_type->id)->first();
                if(!$allocation){
                    $allocation = new RoomAllocation();
                }
                $allocation->programme_id = $programme_id;
                $allocation->hotel_id = $request->hotel_id;
                $allocation->room_id = $room_type->id;
                $allocation->allocation = $request->input('room-' . $room_type->id);
                $allocation->save();
            }
        }

        return back()->with('message', 'Room allocation modified');
    }
}
