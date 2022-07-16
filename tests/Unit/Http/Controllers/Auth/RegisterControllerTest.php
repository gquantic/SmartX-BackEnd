<?php

namespace Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Http\Controllers\Auth\RegisterController;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    /**
     * @return int
     * @doesNotPerformAssertions
     */
    public function testRegister()
    {
        $this->get('/register/1');
        $response = $this->post('/register', [
            'name' => 'Murad Gapurovich',
            'email' => 'lgaster@list.ru',
            'phone' => '89286712267',
            'password' => '@muraa005'
        ]);
        echo $response->exception;
    }
}
