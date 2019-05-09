<?php
 
namespace App\Contracts;
 
interface WebApiInterface
{
	function getEvents();
 
	function getById($id);
	
	function getEnded();
	
	function getEndedById($id);
	
}