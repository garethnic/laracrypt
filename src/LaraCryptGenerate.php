<?php

namespace garethnic\laracrypt;

use Illuminate\Console\Command;
use ParagonIE\Halite\KeyFactory;

class LaraCryptGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laracrypt:key';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the encryption key';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $enc_key = KeyFactory::generateEncryptionKey();

        try {
            KeyFactory::save($enc_key, config('laracrypt.path'));
        } catch (\Throwable $t) {
            $this->error($t);
        }

        return $this->info("Your LaraCrypt encryption key has been generated.");
    }
}
