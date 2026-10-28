<?php

declare(strict_types=1);

namespace Simplify\Announcements\Console\Commands;

use Illuminate\Console\Command;
use Simplify\Announcements\Services\Bell;
use Simplify\Announcements\Services\Push;

/** Runs every minute from Pelican's scheduler, so an announcement with a later start reaches the bell and devices when it starts. */
final class DeliverAnnouncements extends Command
{
    protected $signature = 'simplify-announcements:deliver';

    protected $description = 'Puts announcements that just started in the bell and sends them as app notifications.';

    public function handle(): int
    {
        $reached = Bell::deliverDue();
        if ($reached > 0) {
            $this->info("Put announcements in the notifications of $reached accounts.");
        }
        $devices = Push::sendDue();
        if ($devices > 0) {
            $this->info("Sent announcements as app notifications to $devices devices.");
        }

        return self::SUCCESS;
    }
}
