<?php

namespace App\Listeners;

use App\Models\Role;
use App\Models\User;
use App\Events\RequestSavedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Modules\Approval\Http\Enum\ActionEnum;
use App\Models\Flow;
use Modules\Approval\Models\Request;
use Modules\Approval\Models\Timeline;
use Modules\Approval\Notifications\RequestApprovedNotification;
use Modules\Approval\Notifications\RequestDeclinedNotification;
use Modules\Approval\Notifications\RequestSavedNotification;
use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;

class RequestSavedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param RequestSavedEvent $event
     * @return void
     */
    public function handle(RequestSavedEvent $event)
    {
        $request = $event->request;

        //add a row to approval timeline for new request
        //else add a row to approval timeline based on current step/order
        $timeline = $request->timelines()->create([
            'flow_id' => Flow::where('approval_order', $request->order)->where('type_id', $request->type_id)->first()->id,
            'action_id' => $request->action_id,
            'staff_id' => auth()->user()->staff->id,
            'comments' => session('comments'),
        ]);

        //if new approval request - CREATED
        if ($event->request && $event->request->action_id == 1) {
            //notify request creator
            $email = $request->staff->user->email;
            /* Notification::route('mail', $email)
                ->notify(new RequestSavedNotification($event->request)); */
                
        }



        /*
         update approval request row based on action taken
        to show next step/order
        */
        //dd($request->type->flows);
        //dump($request);
        

        //dd();
    }
}
