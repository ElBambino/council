<?php

namespace App\Listeners;

use App\User;
use App\Notifications\YouWereMentioned;
use App\ThreadReceivedNewReply;

class NotifyMentionedUsers
{
    /**
     * Handle the event.
     *
     * @param  ThreadReceivedNewReply  $event
     * @return void
     */
    public function handle(ThreadReceivedNewReply $event)
    {
        $users = User::whereIn('name', $event->reply->mentionedUsers())
            ->get()
            ->each(function($user) use ($event){
                $user->notify(new YouWereMentioned($event->reply));
            });
    }
}
