<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $events = Event::orderBy('startdate', 'ASC');
        $today = Carbon::parse(Carbon::now())->format('Y-m-d');
        $sevenUp = Carbon::parse(Carbon::now())->addDays(7)->format('Y-m-d');
        $sevenFin= Carbon::parse(Carbon::now())->subDays(7)->format('Y-m-d');
        if($request ->search_by_event == 'finished'){
            $events = $events->where('enddate','<',$today);
        }
        if($request ->search_by_event == 'upcoming')
        {
            $events = $events->where('startdate','>',$today);
        }
        if($request ->search_by_event == '7upcoming')
        {
            $events = $events->where('startdate','=',$sevenUp);
        }
        if($request ->search_by_event == '7finished')
        {
            $events = $events->where('enddate','=',$sevenFin);
        }
        $events = $events->get();
        return view('backend.event.index',compact('events'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=> 'required',
            "start_date" => "required|after_or_equal:today",
            "end_date" => "required|after:start_date",
        ]);
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->startdate = $request->start_date;
        $event->enddate =$request->end_date;
        $event->save();
        $request->session()->flash('message','Record saved successfully');
        return redirect()->route('event.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('backend.event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=> 'required',
            "start_date" => "required|after_or_equal:today",
            "end_date" => "required|after:start_date",
        ]);
        $event = Event::find($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->startdate = $request->start_date;
        $event->enddate =$request->end_date;
        $event->save();
        $request->session()->flash('message','Record Updated successfully');
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return response('data delete');
    }
}
