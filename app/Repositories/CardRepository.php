<?php
 
namespace App\Repositories;
 
use App\Card;
use App\Contracts\CardRepositoryInterface;
 
class CardRepository implements CardRepositoryInterface
{
	/**
	 * @var $model
	 */
	private $model;
 
	/**
	 * EloquentTask constructor.
	 *
	 * @param App\Card $model
	 */
	public function __construct(Card $model)
	{
		$this->model = $model;
	}
 
	/**
	 * Get all cards.
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function all()
	{
		return $this->model->all();
	}
 
	/**
	 * Get Card by id.
	 *
	 * @param integer $id
	 *
	 * @return App\Card
	 */
	public function getById($id)
	{
        return $this->model->find($id);
	}
 
 
	/**
	 * Create a new Tarjeta.
	 *
	 * @param array $attributes
	 *
	 * @return App\Tarjeta
	 */
	public function create(array $attributes)
	{
		\Auth::user()->cards()->create([
				"id" => $attributes["id"],
				"name" => $attributes["name"],
				"event_id" => $attributes["event_id"],
		]);
	}
 
	/**
	 * Update a Card.
	 *
	 * @param integer $id
	 * @param array $attributes
	 *
	 * @return App\Card
	 */
	public function select(array $attributes)
	{
		$id = $attributes['id'];
		if($attributes['selected']){
			$this->create($attributes);
			return ['message'=>'Tarjeta seleccionada correctamente'];
		}else{
			$this->delete($id);
			return ['message'=>'Tarjeta desasociada correctamente'];
		}
	}
	
	/**
	 * Delete a Tarjeta.
	 *
	 * @param integer $id
	 *
	 * @return boolean
	 */
	public function delete($id)
	{
		\Auth::user()->cards()->delete($id);
	}
}