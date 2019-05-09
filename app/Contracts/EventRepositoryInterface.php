<?php
 
namespace App\Contracts;
 
interface EventRepositoryInterface
{
	function all();
 
	function getById($id);
	
	function updateOrCreate(array $where, array $attributes);
 
	function update($id, array $attributes);
 
	function delete($id);
}