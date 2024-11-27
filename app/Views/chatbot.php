<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; }
        .chatbox { max-width: 600px; margin: 20px auto; }
        .messages { border: 1px solid #ccc; padding: 10px; height: 300px; overflow-y: auto; }
        .input-box { margin-top: 10px; display: flex; }
        .input-box input { flex: 1; padding: 10px; border: 1px solid #ccc; }
        .input-box button { padding: 10px 20px; border: none; background: #007BFF; color: white; cursor: pointer; }
    </style>
</head>
<body>
    <div class="chatbox">
        <div class="messages" id="messages"></div>
        <div class="input-box">
            <input type="text" id="userMessage" placeholder="Type your message here...">
            <button id="sendMessage">Send</button>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#sendMessage').click(function () {
                const message = $('#userMessage').val().trim();
                if (message === '') return;

                // Append user message to the chat
                $('#messages').append('<div><strong>You:</strong> ' + message + '</div>');

                // Send the message to the chatbot via AJAX
                $.post('/chatbot/getResponse', { message: message }, function (data) {
                    $('#messages').append('<div><strong>Bot:</strong> ' + data.response + '</div>');
                });

                // Clear the input field
                $('#userMessage').val('');
            });
        });
    </script>
</body>
</html>
