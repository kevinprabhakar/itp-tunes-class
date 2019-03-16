let connection = new WebSocket('ws://kprabhakar-websocket-demo.herokuapp.com');

connection.onopen = () => {
    console.log('connected from the frontend');

    connection.send('hello');
};


connection.onerror = () => {
    console.log('failed to connect from the frontend')
};

connection.onmessage = (event) => {
    console.log('received message', event.data);
    let p = document.createElement('p');
    p.innerText = event.data;
    document.querySelector('blockquote').append(p);
};

document.getElementById('websocketContentBlock').addEventListener('input', (event) => {
    event.preventDefault();
    let message = document.getElementById('websocketContentBlock').value;
    connection.send(message);
});
