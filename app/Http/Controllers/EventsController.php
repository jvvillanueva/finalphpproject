<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Session;
use Redirect;
class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::get(['id', 'title', 'start', 'end', 'color']);

        return Response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->start = $request->date_start . ' ' . $request->time_start;
        $event->end = $request->date_end;
        $event->color = $request->color;
        $event->save();

        return redirect('/');
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
        $event = Event::find($id);
        $event->title = $request->get('title');
        $event->start = $request->get('start');
        $event->end = $request->get('end');
        $event->color = $request->get('color');
        $event->save();
        Session::flash('message', 'evento modificado correctamente');
        return Redirect::to('/events');
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

        if($event == null)
            return Response()->json([
                'message'   =>  'error delete.'
            ]);

        $event->delete();

        return Response()->json([
            'message'   =>  'success delete.'
        ]) ;
        

    }
}
