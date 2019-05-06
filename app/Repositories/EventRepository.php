<?php
 
namespace App\Repositories;
 
use App\Interfaces\EventRepositoryInterface;
use App\Adapters\WebApi;
 
class EventRepository implements EventRepositoryInterface
{
	/**
	 * @var $model
	 */
	private $eventsApi;
 
	/**
	 * EloquentTask constructor.
	 *
	 * @param App\Evento $model
	 */
	public function __construct()
	{
		$this->eventsApi = new WebApi();
	}
 
	/**
	 * Get all events.
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function getAllEvents()
	{
		return $this->eventsApi->getEvents();
	}
 
	/**
	 * Get Evento by id.
	 *
	 * @param integer $id
	 *
	 * @return App\Evento
	 */
	public function getById($id, bool $ended = FALSE)
	{
        $eventsApi = new EventsAPI();
		$json = $ended ? $eventsApi->getEndedById($id) : $eventsApi->getById($id);
		$evento = $this->model->updateOrCreate(
			['id' => $id], ['id' => $id, 'NameEvent' => $json['NameEvent'], 'StartDate' => $json['StartDate'], 'StartTime' => $json['StartTime']]
		);
        $tarjetas = $evento->tarjetas->pluck('tarjetas_id')->all();
        foreach($json['Tarjetas'] as $k=>$tarjeta){
            $json['Tarjetas'][$k]['asignada'] = in_array($tarjeta['Id'],$tarjetas);
        }
		$evento->Tarjetas = $json['Tarjetas'];
        return $evento;
	}
 
	/**
	 * Create a new Evento.
	 *
	 * @param array $attributes
	 *
	 * @return App\Evento
	 */
	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}
 
	/**
	 * Update an Evento.
	 *
	 * @param integer $id
	 * @param array $attributes
	 *
	 * @return App\Evento
	 */
	public function update($id, array $attributes)
	{
		return $this->model->find($id)->update($attributes);
	}
	
	/**
	 * Update or Create an Evento.
	 *
	 * @param integer $id
	 * @param array $attributes
	 *
	 * @return App\Evento
	 */
	public function updateOrCreate(array $where, array $attributes)
	{
		return $this->model->updateOrCreate($where, $attributes);
	}
 
	/**
	 * Delete an Evento.
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