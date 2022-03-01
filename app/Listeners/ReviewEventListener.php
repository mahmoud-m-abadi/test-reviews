<?php

namespace App\Listeners;

use App\Events\Reviews\UserAddedReviewCommentEvent;
use App\Events\Reviews\UserAddedReviewVoteEvent;
use App\Events\Reviews\UserReviewApprovedEvent;

class ReviewEventListener
{
    /**
     * @param $event
     * @return void
     */
    public function onCommentCreated($event)
    {
        // Run another function like Job / Update row and etc...
    }

    /**
     * @param $event
     * @return void
     */
    public function onVoteCreated($event)
    {
        // Run another function like Job / Update row and etc...
    }

    /**
     * @param $event
     * @return void
     */
    public function onReviewApproved($event)
    {
        // Run another function like Job / Update row and etc...
    }

    public function subscribe($events)
    {
        $events->listen(
            UserAddedReviewCommentEvent::class,
            '\App\Listeners\ReviewEventListener@onCommentCreated'
        );

        $events->listen(
            UserAddedReviewVoteEvent::class,
            '\App\Listeners\ReviewEventListener@onVoteCreated'
        );

        $events->listen(
            UserReviewApprovedEvent::class,
            '\App\Listeners\ReviewEventListener@onReviewApproved'
        );
    }
}
