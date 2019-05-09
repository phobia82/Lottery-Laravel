<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Contracts\CardRepositoryInterface;
use App\Adapters\WebApi;

class UpdateWinners extends Command
{
    protected $cardRepository;
	
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:winners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update winners from finished events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CardRepositoryInterface $cardRepository)
    {
        parent::__construct();
		
        $this->cardRepository = $cardRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $webApi = new WebApi();
		$events = $webApi->getEnded();
        foreach ($events as $key => $event) {
            foreach ($event['Tarjetas'] as $k => $card) {                    
				$this->cardRepository->update($card['Id'],['status' => $card['Status'] == 'W']);
            }                 
        }          
    }
}
