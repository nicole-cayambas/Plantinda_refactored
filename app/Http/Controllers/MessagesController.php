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
        $messages = Message::where('from', auth()->user()->id)->get();
        // dd($messages);
        return view('message.index', [
            'messages' => $messages,
            'user' => auth()->user()
        ]);
    }

    public function dash_index(){
        if(!auth()->user()->store){
            return redirect()->route('createStore')->with('status', 'You need to create a store first');
        }
        $messages = Message::where('to', auth()->user()->store->id)->orWhere('from', auth()->user()->store->id)->orWhere('from', auth()->user()->id)->orWhere('from', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(20);
        // dd($messages);
        return view('dashboard.messages.index', [
            'messages' => $messages,
        ]);
    }

    public function show($id){
        $message = Message::find($id);
        return view('dashboard.messages.show', [
            'message' => $message,
            'user' => User::find($message->from),
        ]);
    }

    public function showBuyer($id){
        $message = Message::find($id);
        return view('message.show', [
            'message' => $message,
            'user' => User::find($message->from)
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
        $message = Message::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'product_id' => $request->product_id,
            'from' => $request->from,
            'to' => $request->to
        ]);
        return redirect()->back()->with('status', 'Message sent!');
    }

    public function reply($id){
        $message = Message::find($id);
        return view('dashboard.messages.reply', [
            'message' => $message,
            'user' => User::find($message->from),
        ]);
    }
}
