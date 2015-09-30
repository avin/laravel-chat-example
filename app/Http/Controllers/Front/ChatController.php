<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Auth;
use JavaScript;

class ChatController extends Controller {

    public function index(){
        JavaScript::put([
            'user' => Auth::user()
        ]);

        return view('front.chat.index');
    }

}