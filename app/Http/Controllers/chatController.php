<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'participants' => 'required|array|min:2',
            'participants.*' => 'string|required',
            'msg' => 'required|array|min:1',
            'msg.*.sender' => 'required|string',
            'msg.*.text' => 'required|string',
            'msg.*.timestamp' => 'required|date',
        ]);

        $chat = Chat::create($data);

        return response()->json([
            'message' => 'Chat saved successfully!',
            'chat' => $chat,
        ], 201);
    }
     // Fetch chat by ID
     public function fetch($id)
     {
         $chat = Chat::find($id);
 
         if (!$chat) {
             return response()->json([
                 'message' => 'Chat not found.',
             ], 404);
         }
 
         return response()->json([
             'chat' => $chat,
         ]);
     }
 
     // Update chat messages
     public function update(Request $request, $id)
     {
         $chat = Chat::find($id);
 
         if (!$chat) {
             return response()->json([
                 'message' => 'Chat not found.',
             ], 404);
         }
 
         $data = $request->validate([
             'msg' => 'required|array|min:1',
             'msg.*.sender' => 'required|string',
             'msg.*.text' => 'required|string',
             'msg.*.timestamp' => 'required|date',
         ]);
 
         $chat->msg = $data['msg'];
         $chat->save();
 
         return response()->json([
             'message' => 'Chat updated successfully!',
             'chat' => $chat,
         ]);
     }
}
