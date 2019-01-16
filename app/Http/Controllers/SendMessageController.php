<?php

namespace App\Http\Controllers;
use App\Notifications\NewLessonNotification;
use Illuminate\Http\Request;
use Pusher\Pusher;
use App\Lesson;
use App\User;
class SendMessageController extends Controller
{
    public function index()
    {
        return view('sendmesage');
    }
    public function sendMessage(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        
        $data['title'] = $request->input('title');
        $data['content'] = $request->input('content');

        $options = array(
            'cluster' => 'mt1',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $lesson = new Lesson;
        $lesson->user_id = auth()->user()->id;
        $lesson->title = $data['title'];
        $lesson->body = $data['content'];
        $lesson->save();
        $user =User::where('id','!=',auth()->user()->id)->get();

        if (\Notification::send($user,new NewLessonNotification(Lesson::latest('id')->first()))) {
            return back();
        }
        $pusher->trigger('Notify', 'send-message', $data);

        return redirect()->route('send');
    }
}