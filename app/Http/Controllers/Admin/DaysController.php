<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\User;
use App\Models\Week;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Admin.days.show');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = new Day();
        $parents=Day::all();
        return view('admin.days.show', compact('days', 'parents'));
       ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $days = Day::create($request->all());
        $id=$days->week_id;
        return redirect()->route('days.show',$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $days = [
            'saturday'=>'saturday',
            'sunday' => 'sunday',
            'monday' => 'monday',
            'thursday'=>'thursday',
            'wednesday'=>'wednesday',
            'tuesday'=>'tuesday'
        ];

        $weeks=Week::with('day')->findOrFail($id);
        $day= new  Day();
        return view('admin.days.show', [
            'weeks' => $weeks,
            'day' => $day,
           'title'=>'Days list ',
            'days'=>$days
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $days= Day::destroy($id);

        return redirect()->route('days.show',$days) ->with('success', 'Category deleted');
    }
}
