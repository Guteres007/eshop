<?php

namespace App\Http\Middleware\Frontend;

use App\Services\Frontend\Cart\CartProductService;
use Closure;
use Illuminate\Http\Request;

class IsCartProduct
{
    private $cartProductService;
    public function __construct(CartProductService $cartProductService)
    {
        $this->cartProductService = $cartProductService;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->cartProductService->getProducts(session()->getId())->count() > 0) {
            return $next($request);
        }
        return redirect()->route('frontend.cart.index');
    }
}
