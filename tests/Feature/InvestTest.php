<?php

namespace Tests\Feature;

use GuzzleHttp\Middleware;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class InvestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testInvestForm()
    {
        $user = new User([
            'id' => 1,
            'email' => 'gapurovich05@mail.ru',
            'name' => 'Мурад'
        ]);
        /**
         * setting is_admin to 1 which means the is Admin middleware should
         * let him pass, but oc depends on your handle() method
         */
        $model = $this->app['config']['auth.model'];
        /**
         * assuming you use Eloquent for your User model
         */
        $userProvider = new \Illuminate\Auth\EloquentUserProvider($this->app['hash'], $model);

        $guard = new \Illuminate\Auth\Guard($userProvider, $this->app['session.store']);
        $guard->setUser($user);

        $request = new \Illuminate\Http\Request();
        $middleware = new Middleware($guard);

        $response = $this->post('/profile/invest/1', [
            'quantity' => 1,
            'address' => 'Address 1',
            'comment' => 'Address 1',
        ]);

        $response->assertStatus(200);
    }
}
