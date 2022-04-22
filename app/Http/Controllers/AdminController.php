<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Ticket;
use App\Gid;
use App\Question;
use App\Region;

class AdminController extends Controller
{
    public function __construct(Request $request) {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->id != 1) {
                return redirect()->route('home');
            }

            return $next($request);
        });
    }

    public function upload($image,$path)
    {
        if($image != null) {
            $image_name = time() . $image->getClientOriginalName();
            $image->move(public_path($path), $image_name);
            $image_path = "/" . $path . $image_name;
            return $image_path;
        }
        return "";
    }
    
    public function trash($image)
    {  
        if(file_exists(public_path($image))) {
            unlink(public_path($image));
        } 
    }

    public function panel() {
        return view('admin.panel');
    }

    public function user(Request $request) {
        $content = [
            'users' => User::paginate(6),
            'page' => $request->page? $request->page:1,
            'pagesCount' => count(User::all()),
        ];
        return view('admin.user', $content);
    }

    public function ticket(Request $request) {
        $content = [
            'tickets' => Ticket::paginate(3),
            'page' => $request->page? $request->page:1,
            'pagesCount' => count(Ticket::all()),
            'gids' => Gid::all(),
            'regions' => Region::all(),
        ];
        return view('admin.ticket', $content);
    }

    public function gid(Request $request) {
        $content = [
            'gids' => Gid::all(),
            'users' => User::all(),
        ];
        return view('admin.gid', $content);
    }

    public function question(Request $request) {
        $content = [
            'questions' => Question::all(),
        ];
        return view('admin.question', $content);
    }

    public function userImg(Request $request) {
        $user = User::find($request->id);
        if($user->img)
            $this->trash($user->img);
        $user->img = $this->upload($request->file('img'), 'images/users/');
        $user->save();
        return redirect()->route('panel.user');
    }

    public function userDelete(Request $request) {
        if($request->id != 1) {
            $user = User::find($request->id);
            if($request->file('img')) {
                $this->trash($user->img);
            }
            $user->delete();
        }
        return redirect()->route('panel.user');
    }

    public function ticketCreate(Request $request) {
        if(!$request->regions)
            return redirect()->route('panel.ticket')->withErrors(['Bad/Normal/Amazing']);
        $ticket = Ticket::create($request->except(['_token', 'regions']));
        $ticket->img = $this->upload($request->file('img'), 'images/tickets/');
        $ticket->save();
        for($i = 0; $i < count($request->regions); $i++)
            DB::table('region_tickets')->insert(
                array(
                    'region_id' => $request->regions[$i],
                    'ticket_id' => $ticket->id,
                )
            );
        return redirect()->route('panel.ticket');
    }

    public function ticketChange(Request $request) {
        $ticket = Ticket::find($request->id);
        if($ticket->img)
            $this->trash($ticket->img);
        $ticket->img = $this->upload($request->file('img'), 'images/tickets/');
        $ticket->title = $request->title;
        $ticket->content = $request->content;
        $ticket->date = $request->date;
        $ticket->price = $request->price;
        $ticket->count = $request->count;
        $ticket->gid_id = $request->gid_id;
        $ticket->save();

        return redirect()->route('panel.ticket');
    }

    public function ticketDelete(Request $request) {
        $ticket = Ticket::find($request->id);
        $this->trash($ticket->img);
        $ticket->delete();
        return redirect()->route('panel.ticket');
    }

    public function gidAdd(Request $request) {
        Gid::create($request->except('_token'));
        return redirect()->route('panel.gid');
    }

    public function gidDelete(Request $request) {
        Gid::find($request->id)->delete();
        return redirect()->route('panel.gid');
    }

    public function questCheck(Request $request) {
        $q = Question::find($request->id);
        $q->is_answered = $request->is_answered;
        $q->save();
        return redirect()->route('panel.ques');
    }
}
