<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class ChatComponent extends Component
{
    public $user;
    public $sender_id;
    public $receiver_id;
    public $message = '';

    public function render()
    {
        return view('livewire.chat-component');
    }

    public function mount($user_id){
        // dd($user_id);
        $this->sender_id = auth()->user()->id;
        $this->receiver_id = $user_id;
        $this->user = User::whereId($user_id)->first();
    }

    public function sendMessage(){
        $message = new Message();
        $message->sender_id = $this->sender_id;
        $message->receiver_id = $this->receiver_id;
        $message->message = $this->message;
        $message->save();
        $this->message = '';

    }
}
