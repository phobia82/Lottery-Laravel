<?php

namespace App\Http\Controllers;

use App\Contracts\CardRepositoryInterface;
use Illuminate\Http\Request;

class CardController extends Controller
{
    protected $cardRepository;

    function __construct(CardRepositoryInterface $cardRepository)
    {
        $this->cardRepository = $cardRepository;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		$data = $request->all();
        return $this->cardRepository->select($data);
    }

}
