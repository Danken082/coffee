// Import the Firebase scripts
importScripts('https://www.gstatic.com/firebasejs/11.0.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/11.0.1/firebase-messaging.js');

const firebaseConfig = {
    apiKey: "AIzaSyDXyvXZR8Qs-SM_TMLgU09QEgiymZGNjZg",
    authDomain: "notification-app-58e23.firebaseapp.com",
    projectId: "notification-app-58e23",
    storageBucket: "notification-app-58e23.appspot.com",
    messagingSenderId: "62648487227",
    appId: "1:62648487227:web:7f91a17babcc12ba463b1e"
};

firebase.initializeApp(firebaseConfig);

// Retrieve an instance of Firebase Messaging so that it can handle background messages.
const messaging = firebase.messaging();

// Handle background messages
messaging.onBackgroundMessage((payload) => {
    console.log('Received background message: ', payload);

    // Customize notification here
    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
        icon: '/path/to/icon.png'
    };

    // Show notification
    return self.registration.showNotification(notificationTitle, notificationOptions);
});
