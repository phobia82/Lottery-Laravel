<?php
 
namespace App\Contracts;
 
interface CardRepositoryInterface
{

	function myCards();

	function getById($id);
	
	function create(array $attributes);
 
	function update($id, array $attributes);
 
	function select(array $attributes);
 
	function delete($id);
}