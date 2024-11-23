<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= session()->get('UserRole')?> Home</title>
    <link rel="icon" type="image/png" href="/images/coffeelogo2.png">
    <link href="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
        }

        .modal-header {
            font-size: 1.5em;
            font-weight: bold;
        }

        .modal-footer {
            text-align: right;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 1.5em;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Message Button */
        .message-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50%;
            font-size: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            z-index: 9999;
        }

        .message-btn:hover {
            background-color: #0056b3;
        }

        /* Chat Box */
        .chat-box {
            max-height: 300px;
            overflow-y: scroll;
            margin-top: 20px;
        }

        .chat-box .message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
            background-color: #f1f1f1;
        }

        .chat-box .message.sent {
            background-color: #007BFF;
            color: white;
            margin-left: auto;
            text-align: right;
        }

        .chat-box .message.received {
            background-color: #e9ecef;
            margin-right: auto;
        }
    </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
        <?php include('sidebar.php'); ?>
        <main id="view-panel" class="col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light bg-light px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <br>
                                <br>
                                <h1>Welcome Back <?= session()->get('UserRole')?>!</h1>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Message Button -->
                <button class="message-btn" id="openModalBtn">
                    <i class="fas fa-comment"></i>
                </button>

                <!-- Modal -->
                <div id="messageModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="close" id="closeModalBtn">&times;</span>
                            <h2>Message</h2>
                        </div>
                        <div class="modal-body">
                            <div class="chat-box" id="chatBox">
                                <!-- Messages will load here dynamically -->
                            </div>
                            <textarea id="messageInput" placeholder="Type a message..."></textarea>
                        </div>
                        <div class="modal-footer">
                            <button id="sendMessageBtn" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
  </div>

  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/chartjs.min.js"></script>
  <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <script>
    // Modal Logic
    const openModalBtn = document.getElementById('openModalBtn');
    const messageModal = document.getElementById('messageModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const sendMessageBtn = document.getElementById('sendMessageBtn');
    const messageInput = document.getElementById('messageInput');
    const chatBox = document.getElementById('chatBox');

    openModalBtn.addEventListener('click', () => {
        messageModal.style.display = 'block';
    });

    closeModalBtn.addEventListener('click', () => {
        messageModal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === messageModal) {
            messageModal.style.display = 'none';
        }
    });

    sendMessageBtn.addEventListener('click', () => {
        const message = messageInput.value.trim();
        if (message) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'message sent';
            messageDiv.textContent = message;
            chatBox.appendChild(messageDiv);
            messageInput.value = '';
            chatBox.scrollTop = chatBox.scrollHeight;

            // Send message to backend (AJAX call)
            fetch('/message/sendMessage', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    message: message,
                    receiver_id: 1 // This should be the dynamic receiver ID
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'error') {
                    alert('Failed to send message');
                }
            })
            .catch(error => {
                console.error('Error sending message:', error);
            });
        }
    });
  </script>
</body>
</html>
