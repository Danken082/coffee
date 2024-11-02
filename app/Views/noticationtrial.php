<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <form action="/sendmynotif" method="POST">

  <button type="submit">notif</button>
  </form>


<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.1/firebase-app.js";
  import { getMessaging , getToken } from "https://www.gstatic.com/firebasejs/11.0.1/firebase-messaging.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyDXyvXZR8Qs-SM_TMLgU09QEgiymZGNjZg",
    authDomain: "notification-app-58e23.firebaseapp.com",
    projectId: "notification-app-58e23",
    storageBucket: "notification-app-58e23.appspot.com",
    messagingSenderId: "62648487227",
    appId: "1:62648487227:web:7f91a17babcc12ba463b1e"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const messaging = getMessaging(app);

  navigator.serviceWorker.register("<?= base_url()?>js/sw.js").then(registration => {
    getToken(messaging,{ 
      serviceWorkerRegistration: registration,
      vapidKey: 'BAbyPy7ejsez4L0T7_UAIR8G3KHAsYYdCIxKBCE99HsFDT4K2dCWTB5UTav60tf7jFx74sexGWZ9bKlPhS22C6U' }).then((currentToken) => {
  if (currentToken) {

    console.log("Token is: " + currentToken);
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
</body>
</html>