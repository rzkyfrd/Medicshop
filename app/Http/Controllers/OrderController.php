<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderFormRequest;
use App\Models\Cart;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderLog;
use App\Models\Product;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->is_admin){
            $orders = Order::with('details')->orderBy('created_at', 'desc')->paginate(10);
            return view('order.admin.index', compact('orders'));
        }
        $orders = Order::with('details')->where('user_id', Auth::user()->id)->whereIn('status', ['Waiting For Payment', 'Process'])->get();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = new Order();
        $user_id = Auth::user()->id;
        $cart = Cart::with('product', 'category', 'user')->where('user_id', $user_id)->get();

        return view('order.form', compact('order', 'cart'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;
            Order::create([
                ...$request->except('user_id'),
                'user_id' => $user_id,
                'status' => 'Waiting For Payment'
            ]);

            DB::commit();
            return redirect()->route('order.index')->with('message', 'Order precessed successfully');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['Failed To Process Order']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        DB::beginTransaction();
        try {
            $order->update([
                'status' => $request->status
            ]);

            DB::commit();
            return redirect()->back()->with('message', 'Order Status Changed Successfully');
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->withErrors(['Order Status Failed To Changed']);
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        DB::beginTransaction();
        try {
            $order->update([
                'status' => 'Canceled'
            ]);

            DB::commit();
            return redirect()->back()->with('message', 'Order Canceled');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->withErrors(['Failed To Cancel Order']);
        }
    }

    public function print(Order $order)
    {
        $dompdf = new Dompdf();
        $html = view('order.print', compact('order'));
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $output = $dompdf->output();

        return response()->make($output, 200, [
            'Content-Type' => 'application/pdf',
        ]);

        $dompdf->stream('INV/' . strtotime($order->created_at));
    }
}
