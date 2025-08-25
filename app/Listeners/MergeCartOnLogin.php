<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Session;

class MergeCartOnLogin
{
    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        // Support both Login and Registered events
        $user = $event->user ?? null;
        if (!$user) {
            return;
        }

        // Step 1: Get guest session cart (stored by Darryldecode under session id)
        $guestId = Session::getId();
        $guestCart = Cart::session($guestId)->getContent();

        if ($guestCart->isNotEmpty()) {
            foreach ($guestCart as $item) {
                // Step 2: Add items to user’s persistent cart
                Cart::session($user->id)->add([
                    'id' => $item->id,
                    'name' => $item->name,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'attributes' => $item->attributes,
                ]);
            }

            // Step 3: Clear guest cart
            Cart::session($guestId)->clear();
        }
    }
}
