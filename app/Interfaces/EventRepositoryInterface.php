<?php
 
namespace App\Interfaces;
 
interface EventRepositoryInterface
{
	function getAllEvents();
 
	function getById($id, bool $ended = FALSE);
	
	function create(array $attributes);
	
	function updateOrCreate(array $where, array $attributes);
 
	function update($id, array $attributes);
 
	function delete($id);
}