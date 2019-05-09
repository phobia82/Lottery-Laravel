<?php

namespace App\Http\Controllers;

use App\Contracts\EventRepositoryInterface;
use Illuminate\Http\Request;

class EventoController extends Controller
{
	
    protected $eventRepository;

    function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }
	
    /**
     * Show Events Available
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = $this->eventRepository->all();
        return view('events', ['events'=>$events]);
    }
	
    /**
     * Display the specified event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = $this->eventRepository->getById($id);
        return view('event', ['event'=>$event]);
    } 

}
