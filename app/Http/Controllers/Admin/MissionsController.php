<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checked;
use App\Models\Day;
use App\Models\Missions;
use App\Models\User;
use App\Models\Week;
use Illuminate\Http\Request;

class MissionsController extends Controller
{

    public function index()
    {  $entries=Missions::all();
        $user = User::with('mission')->get();
        $day = Day::with('missions')->get();
        return view('Admin.Missions.index',[
            'missions'=>$entries,
            'title'=>'all missions',
            'user'=>$user,
            'day'=>$day
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $missions= Missions::create($request->all());
        $id=$missions->day_id;

        return redirect()->route('missions.show',$id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $missions=[
            'معاينة'=>'معاينة',
            'صيانة'=>'صيانة',
            'تحصيل'=>'تحصيل',
            'زيارة دورية'=>'زيارة دورية',
            'فحص'=>'فحص',
            'مشروع'=>'مشروع',
        ];
        $status=[
            'منتهية'=>'منتهية',
            'غير منتهية'=>'غير منتهية'
        ];
        $mission=new Missions();
        $day = Day::with('missions')->findOrFail($id);
        $users=User::all();
       $checked=new Checked();

        return view('admin.Missions.show', compact('mission', 'users'),[
            'day'=>$day  ,
        'mission'=>$mission,
            'missions'=>$missions,
            'status'=>$status,
            'check'=>$checked,
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
        $missions=[
            'معاينة'=>'معاينة',
            'صيانة'=>'صيانة',
            'تحصيل'=>'تحصيل',
            'زيارة دورية'=>'زيارة دورية',
            'فحص'=>'فحص',
            'مشروع'=>'مشروع',
        ];
        $status=[
            'منتهية'=>'منتهية',
            'غير منتهية'=>'غير منتهية'
        ];
        $mission= Missions::find($id);
        return view('Admin.Missions.edit',[
            'mission'=>$mission,
            'missions'=>$missions,
            'status'=>$status,
        ]);
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
        $mission= Missions::find($id);
        $idd=$mission->day_id;
        $mission->update( $request->all() );
        return redirect()->route('missions.show',$idd) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function searchh(Request $request)
    {
        $request->validate([
            'word' => 'required'
        ]);
        $word = $request->get('word');
        $mission = Missions::with([])
            ->where('name', 'like', "%$word%")->paginate();;
        return view('Admin.Missions.index', [
            'missions' => $mission,
            'title' => "mission Related [$word]",
        ]);
    }
}
