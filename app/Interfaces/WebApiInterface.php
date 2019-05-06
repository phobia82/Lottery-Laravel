<?php
 
namespace App\Interfaces;
 
interface WebApiInterface
{
	function getEvents();
 
	function getEventById($id);
	
	function getAllEventsEnded();
	
	function getEventEndedById($id);
	
}