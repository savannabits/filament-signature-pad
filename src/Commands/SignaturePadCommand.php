<?php

namespace Coolsam\SignaturePad\Commands;

use Illuminate\Console\Command;

class SignaturePadCommand extends Command
{
    public $signature = 'signature-pad';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
