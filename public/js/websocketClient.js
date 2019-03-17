let connection = new WebSocket('wss://kprabhakar-websocket-demo.herokuapp.com');

connection.onopen = () => {
    console.log('connected from the frontend');
};


connection.onerror = () => {
    console.log('failed to connect from the frontend')
};

connection.onmessage = (event) => {
    console.log('received message', event.data);
    document.getElementById('websocketContentBlock').value = event.data;
};

$(document).ready(function(){
    document.getElementById('websocketContentBlock').addEventListener('keyup', (event) => {
        event.preventDefault();
        let message = document.getElementById('websocketContentBlock').value;
        connection.send(message);
    });
});
