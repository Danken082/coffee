<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Notifcation</title>
</head>
<body>
    
</body>
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-app.js";
  import { getMessaging, getToken } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-messaging.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDFwEjsLJGL6vqn7zBgDoUwLyIHEXNWrMw",
    authDomain: "crossroads-notification.firebaseapp.com",
    projectId: "crossroads-notification",
    storageBucket: "crossroads-notification.appspot.com",
    messagingSenderId: "911816447296",
    appId: "1:911816447296:web:d70317f9964541342096a5",
    measurementId: "G-GRJ3PS14T0"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const messaging = getMessaging();
  navigator.serviceWorker.register("/js/sw.js").then(registration => {

  
  getToken(messaging, {
    serviceWorkerRegistration: registration, vapidKey: 'BD2BsgeCWQs-x8kzlKIiyMYTA0WPjBlTzFcBk1oEt0SEKHW8-XhGfC7FL0aTj3DbJrmCCYclHY6oOg6e1Um9FPU' }).then((currentToken) => {
  if (currentToken) {
    console.log("Token is:" + currentToken);
    // Send the token to your server and update the UI if necessary
    // ...
  } else {
    // Show permission request UI
    console.log('No registration token available. Request permission to generate one.');
    // ...
  }
}).catch((err) => {
  console.log('An error occurred while retrieving token. ', err);
  // ...
});
});
</script>
</html>