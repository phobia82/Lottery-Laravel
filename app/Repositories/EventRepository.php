<?php
 
namespace App\Repositories;
 
use App\Contracts\EventRepositoryInterface;
use App\Adapters\WebApi;
use App\Event;
 
class EventRepository implements EventRepositoryInterface
{
	/**
	 * @var $eventsApi
	 */
	private $eventsApi;
 
	/**
	 * @var $model
	 */
	private $model;
 
	/**
	 * EloquentTask constructor.
	 *
	 * @param App\Event $model
	 */
	public function __construct(Event $model)
	{
		$this->model = $model;
		$this->eventsApi = new WebApi();
	}
 
	/**
	 * Get all events.
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function all()
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
	public function getById($id)
	{
		//Get remote event
        $event = $this->eventsApi->getById($id);
		//Create or update local event
		$db_event = $this->updateOrCreate(
			['id' => $id], ['id' => $id, 'name' => $event['NameEvent'], 'start' => $event['StartDate']]
		);
		//Get taken cards
		$cards = $db_event->cards->pluck('id')->all();
		//Remove taken cards from array
        foreach($event['Tarjetas'] as $k=>$card){
			if(in_array($card['Id'],$cards)) unset($event['Tarjetas'][$k]);
        }
        return $event;
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