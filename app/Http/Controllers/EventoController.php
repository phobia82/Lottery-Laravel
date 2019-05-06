<?php

namespace App\Http\Controllers;

use App\Interfaces\EventRepositoryInterface;
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
        return $this->eventRepository->getAllEvents();
        return view('home');
    }
}
