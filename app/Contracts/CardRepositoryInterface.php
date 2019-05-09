<?php
 
namespace App\Contracts;
 
interface CardRepositoryInterface
{
	function all();
 
	function getById($id);
	
	function create(array $attributes);
 
	function select(array $attributes);
 
	function delete($id);
}