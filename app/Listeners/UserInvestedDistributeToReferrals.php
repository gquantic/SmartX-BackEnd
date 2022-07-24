<?php

/*
 * При вкладе пользователя будем искать рефералов и распределять средства по ним в зависимости от выполнения нужных
 * условий
 */

namespace App\Listeners;

use App\Events\UserInvestedInProduct;
use App\Http\Controllers\ReferralsController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserInvestedDistributeToReferrals
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
     * @param UserInvestedInProduct $event
     * @return void
     */
    public function handle(UserInvestedInProduct $event)
    {
        $referralsController = new ReferralsController();

        $referral = $referralsController->getReferrals($event->user);
        $referralsController->setAmounts($event, $referral, 1);

        $branch = 1;
        while ($referral != null) {
            $branch += 1;

            $referral = $referralsController->getReferrals($referral);
            $referralsController->setAmounts($event, $referral, $branch);

            if ($branch == 9)
                return;
        }
    }
}
