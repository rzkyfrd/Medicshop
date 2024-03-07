<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
            $details = [];
            foreach ($carts as $key => $cart) {
                $details[] = [
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price,
                ];
            }
            $model->details()->createMany($details);
            $model->log()->create([
                'status' => $model->status
            ]);

            Cart::where('user_id', $user_id)->delete();
        });

        self::updated(function ($model) {
            $model->log()->create([
                'status' => $model->status
            ]);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function log()
    {
        return $this->hasMany(OrderLog::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
