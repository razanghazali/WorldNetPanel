<?php

namespace App\Http\Controllers\Admins;


use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $notes=new Note();
     $note=Note::all();
       $user=User::all();
       return view('Admins.dashbord',[
           'user'=>$user,
           'notes'=>$notes,
           'note'=>$note
       ]);}




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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with(['weeks'])->findOrFail($id);
        $users=User::all();
        return view('Admins.weeks.show',[
            'user' => $user,
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
        //
    }

    public function  getusers()
    {
        $user=User::all();
        return view('Admins.profiles',[
            'user'=>$user
        ]);
    }
    public function search(Request $request)
    {
        $request->validate([
            'word' => 'required'
        ]);
        $word = $request->get('word');
        $user = User::with(['weeks'])
            ->where('name', 'like', "%$word%")
            ->paginate();
        return view('Admins.dashbord', [
            'user' => $user,
            'title' => "user Related [$word]",
            'note'=>$note=Note::all(),
            'notes'=>new Note(),
        ]);
    }

}
