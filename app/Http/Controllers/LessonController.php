<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewLessonNotification;
use App\Lesson;
use App\User;
class LessonController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function newlesson(){
        $lesson = new Lesson;
        $lesson->user_id = auth()->user()->id;
        $lesson->title = "huy";
        $lesson->body = "huynh nhat huy";
        $lesson->save();
        $user =User::where('id','!=',auth()->user()->id)->get();

        if (\Notification::send($user,new NewLessonNotification(Lesson::latest('id')->first()))) {
            return back();
        }
    }
    public function notification(){
       return auth()->user()->unreadNotifications;
    }
}
