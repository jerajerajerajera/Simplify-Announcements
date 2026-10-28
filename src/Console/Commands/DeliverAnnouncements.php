<?php

declare(strict_types=1);

namespace Simplify\Announcements\Console\Commands;

use Illuminate\Console\Command;
use Simplify\Announcements\Services\Bell;

/** Runs every minute from Pelican's scheduler, so an announcement with a later start reaches the bell when it starts. */
final class DeliverAnnouncements extends Command
{
    protected $signature = 'simplify-announcements:deliver';

    protected $description = 'Puts announcements that just started in the notifications of everyone who sees them.';

    public function handle(): int
    {
        $reached = Bell::deliverDue();
        if ($reached > 0) {
            $this->info("Put announcements in the notifications of $reached accounts.");
        }

        return self::SUCCESS;
    }
}
