<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messaging System</title>
        <style>
            body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

ul#userList {
  list-style: none;
  padding: 0;
}

ul#userList li {
  padding: 10px;
  cursor: pointer;
  border-bottom: 1px solid #ddd;
}

ul#userList li:hover {
  background-color: #f0f0f0;
}

/* Chat Box */
.chat-box {
  position: fixed;
  bottom: 0;
  right: 0;
  width: 300px;
  height: 400px;
  border: 1px solid #ccc;
  border-radius: 10px;
  background-color: white;
  z-index: 1000;
  overflow: hidden;
}

/* Mobile Fullscreen */
@media screen and (max-width: 768px) {
  .chat-box {
    width: 100%;
    height: 100%;
    border-radius: 0;
  }
}

/* Header */
.chat-header {
  background-color: #007BFF;
  color: white;
  padding: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.close-chat {
  background: none;
  border: none;
  color: white;
  font-size: 18px;
  cursor: pointer;
}

/* Content */
.chat-content {
  padding: 10px;
  height: calc(100% - 120px);
  overflow-y: auto;
}

.message {
  margin: 5px 0;
  padding: 10px;
  border-radius: 10px;
  max-width: 80%;
}

.message.sent {
  background-color: #007BFF;
  color: white;
  margin-left: auto;
}

.message.received {
  background-color: #e9ecef;
  margin-right: auto;
}

/* Footer */
.chat-footer {
  display: flex;
  gap: 5px;
  padding: 10px;
  border-top: 1px solid #ccc;
}

textarea {
  flex: 1;
  resize: none;
  height: 40px;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 5px;
}

textarea:focus {
  outline: none;
  border-color: #007BFF;
}

        </style>
</head>
<body>
  User List
  <ul id="userList">
    <?php foreach($userAdmin as $user): ?>
    <li data-receiver-id="<?= $user['UserID']?>" class="user"><?= $user['Username']?> </li>
    <?php endforeach;?>
  </ul>
  <!-- Chat Box -->
  <div class="chat-box" id="chatBox" style="display: none;">
    <div class="chat-header">
      <span id="chatTitle"></span>
      <button class="close-chat" id="closeChat">×</button>
    </div>
    <div class="chat-content" id="chatContent">
      <!-- Messages will load dynamically -->
    </div>
    <div class="chat-footer">
    <textarea id="chatInput" name="message" placeholder="Type a message..."></textarea>
      <button id="sendChat">Send</button>
    </div>
  </div>

  <script>
    document.querySelectorAll('.user').forEach((user) => {
  user.addEventListener('click', function () {
    const receiverId = this.getAttribute('data-receiver-id');
    openChat(receiverId, this.textContent);
  });
});

function openChat(receiverId, receiverName) {
  const chatBox = document.getElementById('chatBox');
  chatBox.setAttribute('data-receiver-id', receiverId);
  document.getElementById('chatTitle').textContent = receiverName;
  chatBox.style.display = 'block';
  fetchMessages(receiverId);
}

document.getElementById('closeChat').addEventListener('click', () => {
  document.getElementById('chatBox').style.display = 'none';
});
document.getElementById('sendChat').addEventListener('click', () => {
  const sendButton = document.getElementById('sendChat');
  sendButton.disabled = true; // Disable the button

  const chatBox = document.getElementById('chatBox');
  const receiverId = chatBox.getAttribute('data-receiver-id');
  const message = document.querySelector('[name="message"]').value.trim();

  if (!message) {
    alert('Please type a message!');
    sendButton.disabled = false; // Re-enable button if no message
    return;
  }

  fetch('/message/sendMessage', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ message, receiver_id: receiverId }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === 'success') {
        addMessage('sent', message);

        document.getElementById('chatInput').value = '';
        const chatContent = document.getElementById('chatContent');
        chatContent.scrollTop = chatContent.scrollHeight;
      } else {
        alert('Failed to send message: ' + data.message);
      }
      sendButton.disabled = false; // Re-enable button after response
    })
    .catch(() => {
      alert('An error occurred.');
      sendButton.disabled = false; // Re-enable button if error
    });
});

function fetchMessages(receiverId) {
  fetch(`/message/fetchMessages/${receiverId}`)
    .then((response) => response.json())
    .then((messages) => {
      const chatContent = document.getElementById('chatContent');
      chatContent.innerHTML = '';
      messages.forEach((msg) => {
        addMessage(msg.sender_id === sessionUserId ? 'sent' : 'received', msg.message);
      });
      chatContent.scrollTop = chatContent.scrollHeight;
    });
}

function addMessage(type, text) {
  const messageDiv = document.createElement('div');
  messageDiv.className = `message ${type}`;
  messageDiv.textContent = text;
  document.getElementById('chatContent').appendChild(messageDiv);
}

  </script>
</body>
</html>
