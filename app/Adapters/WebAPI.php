<?php
 
namespace App\Adapters;
 
use App\Interfaces\WebApiInterface;
use GuzzleHttp\Client;
 
class WebAPI implements WebApiInterface
{
	/**
	 * @var $url
	 */
	private $client;
 
	/**
	 * Initialize Guzzle
	 * 
	 */
	public function __construct()
	{
		$this->client = new Client(['base_uri' => config('webapi.url')]);
	}
 
	/**
	 * Get all Events.
	 *
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function getEvents()
	{
		$response = $this->client->request('GET', config('webapi.events'));
		return $this->decode($response);
	}
 
	/**
	 * Get Evento by id.
	 *
	 * @param integer $id
	 *
	 * @return String
	 */
	public function getEventById($id)
	{
		$json = file_get_contents($this->url.'Eventos/'.$id);
		return $this->decode($json);
	}
 
	/**
	 * Get Eventos Finalizados.
	 *
	 * @param integer $id
	 *
	 * @return String
	 */
	public function getAllEventsEnded()
	{
		$json = file_get_contents($this->url.'EventosFinales');
		return $this->decode($json);
	}
 
	/**
	 * Get Evento Finalizado by id.
	 *
	 * @param integer $id
	 *
	 * @return String
	 */
	public function getEventEndedById($id)
	{
		$json = file_get_contents($this->url.'EventosFinales/'.$id);
		return $this->decode($json);
	}
 
	/**
	 * Decode response
	 *
	 * @return Object/Array
	 */
	private function decode($response , bool $assoc = TRUE)
	{
		return json_decode($response->getBody()->getContents(), $assoc);
	}
 
}