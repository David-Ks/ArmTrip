<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\ReviewRequest;
use App\Http\Requests\QuestionRequest;
use Illuminate\Http\Request;

use App\Ticket;
use App\Gid;
use App\Region;
use App\Reviw;
use App\Question;

class MainController extends Controller
{
    public function index() {
        $content = [
            'gidsCount'    => count(Gid::all()),
            'toursCunt'    => count(Ticket::all()),
            'commentsCoun' => count(Reviw::all()),
        ];
        return view('index', $content);
    }

    public function tours(Request $request) {
        if(!$request->has('region') && $request->has('search')){
            $request->session()->put('region', range(1, 12));
        } else if($request->has('region') && $request->has('search')) {
            $request->session()->put('region', $request->region);
        }
        if(!$request->has('page') && !$request->has('region')) {
            $request->session()->put('region', range(1, 12));
        }

        $content = [
            "tours"         => DB::table('tickets')
                ->join('region_tickets', 'region_tickets.ticket_id', 'tickets.id')
                ->whereIn('region_id', $request->session()->get('region'))->get()->unique('title'),
            "gids"          => Gid::all(),
            "regions"       => Region::all(),
            "searchRegions" => Region::select('region')->whereIn('id', $request->session()->get('region') ? (count($request->session()->get('region')) >= 11 ? [] :  $request->session()->get('region')) : [])->get(),
        ];

        return view('tours', $content);
    }

    public function tour(Ticket $id) {
        return view('tour', ["tour" => $id]);
    }

    public function review(Request $request) {
        $content = [
            'reviews'    => Reviw::orderBy('created_at', 'DESC')->paginate(6),
            'pagesCount' => count(Reviw::all()),
            'page'       => $request->page? $request->page:1,
        ];

        return view('review', $content);
    }

    public function addReview(ReviewRequest $request) {
        if(in_array($request->raiting, ['Bad', 'Normal', 'Amazing'])) {
            Reviw::create($request->except('_token'));
            return redirect()->route('review.view');
        }
        return redirect()->route('review.view')->withErrors(['msg', 'Bad/Normal/Amazing']);
    }

    public function delReview(Request $request) {
        $review = Reviw::find($request->id);
        if($review->user->id == Auth::user()->id)
            $review->delete();
        return redirect()->route('review.view');
    }

    public function message(QuestionRequest $request) {
        if($request->user_id == Auth::user()->id) {
            Question::create($request->except('_token'));
            return redirect()->route('home');
        }
        return redirect()->route('home')->withErrors('msg', 'What are you doing???');
    }

    public function balance() {
        return view('balance');
    }

    public function saper() {
        return view('saper');
    }

    public function ticketBuy(Request $request, Ticket $ticket) {
        if($ticket->count >= 1 && Auth::user()->balance >= $ticket->price) {
            Auth::user()->balance -= $ticket->price;
            $ticket->count -= 1;
            DB::table('ticket_users')->insert([
                'user_id'   => Auth::user()->id,
                'ticket_id' => $ticket->id,
            ]);
            Auth::user()->save();
            $ticket->save();
            return redirect()->route('tickets.my');
        }
        return redirect()->route('home');
    }

    public function ticketsMy() {
        return view('tickets');
    }
}
