<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;

class MessagesController extends Controller
{
    public function index(){
        $messages = auth()->user()->messages;
        dd($messages);
        return view('messages.index', [
            'messages' => $messages
        ]);
    }

    public function dash_index(){
        $messages = Message::where('store_id', auth()->user()->store->id)->orderBy('created_at', 'desc')->paginate(10);
        // dd($messages);
        return view('dashboard.messages.index', [
            'messages' => $messages
        ]);
    }

    public function show($id){
        $message = Message::find($id);
        // $message->is_read = 1;
        // $message->save();
        return view('dashboard.messages.show', [
            'message' => $message
        ]);
    }

    public function contactSeller($id)
    {
        $product = Product::find($id);
        $store = Store::find($product->store_id);
        $seller = User::find($store->user_id);
        $buyer = auth()->user();
        return view('message.create', [
            'store' => $store,
            'product' => $product,
            'seller' => $seller,
            'buyer' => $buyer
        ]);
    }

    public function sendMessage(Request $request)
    {
        $message = auth()->user()->message()->create([
            'subject' => $request->subject,
            'body' => $request->body,
            'product_id' => $request->product_id,
            'user_id' => auth()->user()->id,
            'store_id' => $request->store_id
        ]);
        return redirect()->back()->with('status', 'Message sent!');
    }
}
