<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventType;
use App\Models\Place;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($dateTo = FALSE,$dateFrom = FALSE){
        if(!$dateFrom){
            $dateFrom = (new \DateTime('now'))->format("Y-m-d");
        }
        if(!$dateFrom){
            $dateTo = (new \DateTime('now'))->format("Y-m-d");
        }

        return view('main')->with(
            [
                'eventTypes' => [],
                'eventNeatest' => [],
                'dateFrom' => $dateFrom,
                'dateTo' => $dateTo
            ]
        );
    }

    public function search(Request $request){
        $params = $request->query();
        if(empty($params['dateFrom'])){
            $params['dateFrom'] = (new \DateTime('now'))->format("Y-m-d");
        }
        if(empty($params['dateTo'])){
            $params['dateTo'] = (new \DateTime('now'))->format("Y-m-d");
        }
        $eventTypes = EventType::get();
        $eventNearest = Event::findByDate($params['dateTo'],$params['dateFrom']);
        return view('searchEvent')->with(
            [
                'eventTypes' => $eventTypes,
                'events' => $eventNearest,
                'dateFrom' => $params['dateFrom'],
                'dateTo' => $params['dateTo']
            ]
        );
    }

    public function places(){
        $places = Place::all();
        return view('places')->with(['places'=>$places]);
    }

    public function about(){
        return view('about');

    }

    public function contact(){
        return view('contacts');

    }
}
