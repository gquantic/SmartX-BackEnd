<?php

namespace App\Http\Controllers;

use App\Events\UserInvestedInProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Part;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class InvestController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showInvest($id)
    {
        return view('components.invest', ['product' => Product::find($id)]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function makeInvest(Request $request, $id)
    {
        // Валидация
        $request->validate([
            'quantity' => 'required|integer',
            'address' => 'required|string|max:100',
            'comment' => 'required|string|max:500',
        ]);

        // Переменные для упрощения кода
        $totalAmount = round((Product::find($id)->need_funds / Product::find($id)->shares)) * $request->post('quantity');
        $user = Auth::id();

        // Проверим доступность частей, если части недоступны, то вернём с ошибкой
        if ($this->checkFreeSharesOnProduct($id) < $request->post('quantity')) {
            return Redirect::back()->withErrors(['msg' => 'Столько долей нет :(']);
        }

        // Теперь же проверяем баланс, если баланс меньше, то отправляем обратно с ошибкой
        if (User::find(Auth::id())->balance < $totalAmount) {
            return Redirect::back()->withErrors(['msg' => 'На балансе недостаточно средств']);
        }

        // Создаём
        Part::create([
            'quantity' => $request->post('quantity'),
            'user_id' => $user,
            'product_id' => $id,
            'address' => $request->post('address'),
            'comment' => $request->post('comment')
        ]);

        $user = Auth::user();
        $user->balance = Auth::user()->balance - $totalAmount;
        $user->save();

        event(new UserInvestedInProduct(Auth::user(), [
            'product' => $id,
            'quantity' => $request->post('quantity'),
            'total' => $totalAmount
        ]));

        // Если всё успешно, переводим на страницу продукта с сообщением
        return Redirect::route('products.show', $id)->with(['success' => 'Успешная инвестиция!']);
    }

    /**
     * Проверить доступность частей
     * @param integer $id ID продукта
     * @return void
     */
    public function checkFreeSharesOnProduct($id)
    {
        $product = Product::find($id);
        return $product->shares - $product->parts()->sum('quantity');
    }
}
