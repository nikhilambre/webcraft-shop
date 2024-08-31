<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function postMessage(Request $request)
    {
        $this->validate($request, [
            'messageName' => 'required|max:191',
            'messageEmail' => 'required|email|max:100',
            'messageContact' => 'required|numeric',
            'messageText' => 'required|max:1600'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $message = new Message();

        $message->messageName = $request->input('messageName');
        $message->messageEmail = $request->input('messageEmail');
        $message->messageContact = $request->input('messageContact');
        $message->messageText = $request->input('messageText');

        $message->save();
        return response()->json(['message' => $message], 201);
    }

    public function getMessages()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $message = Message::select('id','messageName','messageEmail','messageContact','messageFlag','messageText','created_at')
                            ->get();

        $response = [
            'data' => $message
        ];
        return response()->json($response, 200);
    }

    public function getMessage($id)
    {
        $message = Message::select('id','messageName','messageEmail','messageContact','messageFlag','messageText','created_at')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $message
        ];
        return response()->json($response, 200);
    }

    public function putMessage(Request $request, $id)
    {
        $message = Message::find($id);

        if(!$message) {
            return response()->json(['message' => 'Message not found'], 404);
        }

        $this->validate($request, [
            'messageName' => 'required|max:191',
            'messageEmail' => 'required|email',
            'messageContact' => 'required|max:20|numeric',
            'messageText' => 'required|max:1600'
        ]);

        $message->messageName = $request->input('messageName');
        $message->messageEmail = $request->input('messageEmail');
        $message->messageContact = $request->input('messageContact');
        $message->messageText = $request->input('messageText');

        $message->update();

        return response()->json(['message' => $message], 200);
    }

    public function deleteMessage($id)
    {
        $message = Message::find($id);
        $message->delete();
        return response()->json(['message' => 'Message deleted Successfully.', 200]);
    }
}
