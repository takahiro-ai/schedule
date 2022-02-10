<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\User;
use Illuminate\Support\Facades\Auth;


class ScheduleController extends Controller
{

    /**
     * スケジュールを登録
     *
     * @param  Request  $request
     */
    public function scheduleAdd(Request $request)
    {
        // バリデーション
        $request->validate([
            'start' => 'required|integer',
            'end' => 'required|integer',
            'title' => 'required|max:32',
        ]);

        // 登録処理
        $schedule = new Schedule();
        // 日付に変換。JavaScriptのタイムスタンプはミリ秒なので秒に変換
        $schedule->start = date('Y-m-d', $request->input('start') / 1000);
        $schedule->end = date('Y-m-d', $request->input('end') / 1000);
        $schedule->title = $request->input('title');
        $schedule->save();

        return;
    }

    /**
     * スケジュールを取得
     *
     * @param  Request  $request
     * 
     * 
     */
    public function itiran(Schedule $schedule)
    {
        return view('itiran')->with(['schedules' => $schedule->get()]);
    }     
    public function register(Schedule $schedule, User $user)
    {
        return view('register')->with([
            'schedule' => $schedule, 
            'users'=>$user->get()
            ]);
    }
    
    public function store(Request $request, Schedule $schedule)
    {
        // $input_schedule = $request['schedule'];
        $input_users = $request->users_array; 
    
        //attachメソッドを使って中間テーブルにデータを保存
        $schedule->users()->attach($input_users); 
        return redirect('/schedules/itiran');
    }

    
    public function scheduleGet(Request $request)
    {
        // $schedule = Schedule::get();

        $user = Auth::user();
        $schedule = $user->schedules;
        // // dd($schedule);
        return response()->json($schedule);
        
        
        
        
        
    }
}