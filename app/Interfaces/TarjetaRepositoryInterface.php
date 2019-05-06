<?php
 
namespace App\Interfaces;
 
interface TarjetaRepositoryInterface
{
	function getAll();
 
	function getById($id);
	
	function updateByUser($event_id, \App\User $user, $data);
 
	function create(array $attributes);
 
	function update($id, array $attributes);
 
	function delete($id);
}