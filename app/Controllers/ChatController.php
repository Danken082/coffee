<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ChatModel;
use App\Models\UserModel;
class ChatController extends BaseController
{

        private $user;

        public function __construct()
        {
            $this->user = new UserModel();
        }
        public function index()
        {

            return view('chatbot');
        }
        public function sendMessage()
        {
            $request = service('request');
            $data = $request->getJSON(true);
        
            $message = $data['message'] ?? '';  // Use null coalescing to avoid undefined index error
            $receiverId = $data['receiver_id'] ?? '';  // Use null coalescing for receiver_id
        
            $senderId = session()->get('UserID');
        
            if (!$message || !$receiverId) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Invalid data. Message and receiver ID are required.',
                ]);
            }
        
            log_message('debug', 'Receiver ID: ' . $receiverId);
        
            $messageModel = new ChatModel();
        
            $messageModel->save([
                'sender_id' => $senderId,
                'receiver_id' => $receiverId,  // Use the dynamic receiver_id
                'message' => $message,  // Use the dynamic message
            ]);
        
            // Return success response
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Message sent!',
            ]);
        }
        
        
    
        public function fetchMessages($receiverId)
        {
            $messageModel = new ChatModel();
            $senderId = session()->get('UserID');
    
            $messages = $messageModel
                ->where("(sender_id = $senderId AND receiver_id = $receiverId) OR (sender_id = $receiverId AND receiver_id = $senderId)")
                ->orderBy('created_at', 'ASC')
                ->findAll();
    
            return $this->response->setJSON($messages);
        }

        public function deleteMessage($messageId)
        {
            $messageModel = new ChatModel();
    
            // Fetch the message by ID to check if it belongs to the logged-in user
            $message = $messageModel->find($messageId);
            $senderId = session()->get('UserID');
    
            // Ensure the message exists and belongs to the logged-in user
            if (!$message || $message['sender_id'] !== $senderId) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Message not found or you do not have permission to delete this message.',
                ]);
            }
    
            // Delete the message
            $messageModel->delete($messageId);
    
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Message deleted successfully.',
            ]);
        }

        public function getResponse()
        {
            // Retrieve the user's message
            $message = $this->request->getPost('message');
    
            // Simulate chatbot responses
            $responses = [
                'hello' => 'Hi there! How can I assist you today?',
                'how are you' => 'I\'m just a bot, but I\'m functioning as expected!',
                'bye' => 'Goodbye! Have a great day!',
                'default' => 'I\'m sorry, I didn\'t understand that. Can you rephrase?',
            ];
    
            // Match response or fallback to default
            $response = $responses[strtolower($message)] ?? $responses['default'];
    
            return $this->response->setJSON(['response' => $response]);
        }
    }
    


