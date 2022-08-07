<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ReferralsController extends Controller
{
    private $testMode = 0;

    /**
     * Условия для каждой ветки
     * [процент отчисления с суммы, необходимое кол-во рефералов на первой ветке, необходимая сумма]
     * @var array $forReferralsAmount
     */
    private $branchesConditions = [
        1 => [7, 1, 15000],
        2 => [3, 2, 100000],
        3 => [3, 3, 300000],
        4 => [3, 4, 500000],
        5 => [3, 5, 1000000],
        6 => [3, 6, 1500000],
        7 => [3, 7, 2000000],
        8 => [3, 8, 2500000],
        9 => [3, 9, 3000000],
    ];

    /**
     * Получить рефералов пользователя
     * @param $user
     * @return void
     */
    public function getReferrals($user)
    {
        $referral = User::where('id', $user->referral)->first();

        if ($this->testMode) {
            echo "<pre>";
            var_dump($referral);
            echo "<hr>";
        }

        return $referral;
    }

    /**
     * Установить балансы пользователям
     * @param $event
     * @param $referrals
     * @param $branch
     * @return false
     */
    public function setAmounts($event, $referral, $branch)
    {
        if (empty($referral))
            return false;

        $conditions = $this->branchesConditions[$branch];
        if ($this->checkConditionsRealized($referral->id, $conditions)) {
            if ($this->testMode) {
                echo "<h1>Condition realized for branch $branch!</h1> <hr>";
                echo "<hr>";
            }
            $referralModel = User::find($referral->id);
            $referralModel->referral_balance += (intval($event->params['total']) * $conditions[0]) / 100;
            $referralModel->save();
        } else return false;
    }

    /**
     * Выбираем пользователя и смотрим его ветку, если все условия выполнены, то начисляем
     *
     * @param $user
     * @param $conditions
     * @return bool
     */
    public function checkConditionsRealized($user, $conditions)
    {
        $referrals = User::where('referral', $user)->get();

        $allInvestsAmount = 0;
        foreach ($referrals as $referral) { // Пока есть рефералы пользователя, получим данные об инвестициях
            $parts = Part::where('user_id', $referral->id)->get();
            $investedAmount = 0;
            foreach ($parts as $part) {
                $product = Product::find($part->product_id);
                $investedAmount += round(($product->need_funds / $product->shares) * $part->quantity);
            }
            $allInvestsAmount += $investedAmount;
        }

        // Инвестиции самого реферала
        $referralInvestAmount = 0;
        $selfParts = Part::where('user_id', $user)->get();
        foreach ($selfParts as $part) {
            $product = Product::find($part->product_id);
            $referralInvestAmount += round(($product->need_funds / $product->shares) * $part->quantity);
        }

        if ($this->testMode) {
            echo "<h1>" . count($referrals) . ": {$allInvestsAmount}</h1>";
        }

//        dd($referralInvestAmount);

        // Проверяем выполнение условий
        if ($conditions[2] <= $allInvestsAmount && $conditions[1] <= count($referrals) && intval($referralInvestAmount) >= 15000)
            return true;
        else
            return false;
    }
}
