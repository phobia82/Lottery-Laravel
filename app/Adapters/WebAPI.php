<?php
 
namespace App\Adapters;
 
use App\Contracts\WebApiInterface;
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
		return $this->response($response);
	}
 
	/**
	 * Get Evento by id.
	 *
	 * @param integer $id
	 *
	 * @return String
	 */
	public function getById($id)
	{
		$response = $this->client->request('GET', config('webapi.events').'/'.$id);
		return $this->response($response);
	}
 
	/**
	 * Get Eventos Finalizados.
	 *
	 * @param integer $id
	 *
	 * @return String
	 */
	public function getEnded()
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
	public function getEndedById($id)
	{
		$json = file_get_contents($this->url.'EventosFinales/'.$id);
		return $this->decode($json);
	}
 
	/**
	 * Response
	 *
	 * @return Object/Array
	 */
	private function response($response , bool $assoc = TRUE)
	{
		return json_decode($response->getBody()->getContents(), $assoc);
	}
 
}