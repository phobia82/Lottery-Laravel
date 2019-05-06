<?php
 
namespace App\Repositories;
 
use App\Tarjeta;
use App\Interfaces\TarjetaRepositoryInterface;
 
class TarjetaRepository implements TarjetaRepositoryInterface
{
	/**
	 * @var $model
	 */
	private $model;
 
	/**
	 * EloquentTask constructor.
	 *
	 * @param App\Tarjeta $model
	 */
	public function __construct(Tarjeta $model)
	{
		$this->model = $model;
	}
 
	/**
	 * Get all tarjetas.
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function getAll()
	{
		return $this->model->all();
	}
 
	/**
	 * Get Tarjeta by id.
	 *
	 * @param integer $id
	 *
	 * @return App\Tarjeta
	 */
	public function getById($id)
	{
        return $this->model->find($id);
	}
 
	/**
	 * Update Tarjetas by User.
	 *
	 * @param integer $id
	 *
	 * @return App\Tarjetas
	 */
	public function updateByUser($event_id, \App\User $user, $data)
	{
		$user->tarjetas()->where('evento_id',$event_id)->delete();
        if(!empty($data)){
            foreach ($data as $value) {
				$user->tarjetas()->create([
									'evento_id' => $event_id,
									'tarjetas_id' => $value['Id'],
                                    'status_tarjeta' => $value['Status']
								   ]);
            }            
        }
        return $user->tarjetas;        
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
		return $this->model->create($attributes);
	}
 
	/**
	 * Update a Tarjeta.
	 *
	 * @param integer $id
	 * @param array $attributes
	 *
	 * @return App\Tarjeta
	 */
	public function update($id, array $attributes)
	{
		return $this->model->find($id)->update($attributes);
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
		return $this->model->find($id)->delete();
	}
}