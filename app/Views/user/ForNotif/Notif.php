<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Firebase</h3>
    <script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-app.js";
  import { getMessaging , getToken } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-messaging.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDtPIR7xemPYNaP6SA9zxCTxj8kD8JqYH4",
    authDomain: "notifbar-980f5.firebaseapp.com",
    projectId: "notifbar-980f5",
    storageBucket: "notifbar-980f5.appspot.com",
    messagingSenderId: "679968031039",
    appId: "1:679968031039:web:c9fb9f3e2d9a84642bd38a",
    measurementId: "G-503F83QLZB"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
  const messaging = getMessaging(app);

    navigator.serviceWorker.register("<?= site_url('js/sw.js');?>").then(registration => {
        getToken(messaging, {
                 serviceWorkerRegistration: registration,
                 vapidKey: 'BBQaQSxRTLt-nV22Pz7eIfoDaChH_mgk8Vh1WRB5jIFpjUjDoGx3qs5OvGHDkcOSDljw9lgWViR-stv3RSHOyb4' }).then((currentToken) => {
    if (currentToken) {

        console.log("Token is: "+currentToken);
        // Send the token to your server and update the UI if necessary
        // ...
    } else {
        // Show permission request UI
        console.log('No registration token available. Request permission to generate one.');
        // ...
    }
    }).catch((err) => {
    console.log('An error occurred while retrieving token.', err);
    // ...
    });
    });

    
</script>
</body>
</html>