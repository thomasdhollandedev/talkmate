let chatbot_button = document.querySelector('.chatbot-button');
let chatbot = document.querySelector('#chatbot');
let chatbot_close = document.querySelector('.chatbot-close');

chatbot_button.addEventListener('click', () => {
    chatbot_button.classList.toggle('hidden');
    chatbot.classList.toggle('hidden');
});

chatbot_close.addEventListener('click', () => {
    chatbot_button.classList.toggle('hidden');
    chatbot.classList.toggle('hidden');
});

function sendMessage() {
    let userInput = document.getElementById("userInput").value;

    $.ajax({
        type: "POST",
        url: "http://localhost:5000/chat",
        data: JSON.stringify({ message: userInput }),
        contentType: "application/json",
        success: function (response) {
            let chatbox = document.getElementById("chatbox");
            let message_div = document.createElement("div");
            let message = document.createElement("p");
            message_div.classList.add("user-message-container");
            message.classList.add("user-message");
            message.innerHTML = userInput;
            chatbox.appendChild(message_div);
            message_div.appendChild(message);

            let reply_div = document.createElement("div");
            let reply = document.createElement("p");
            reply_div.classList.add("chatbot-message-container");
            reply.classList.add("chatbot-message");
            reply.innerHTML = response.response;
            chatbox.appendChild(reply_div);
            reply_div.appendChild(reply);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });

    document.getElementById("userInput").value = "";
}


let chatbot_send = document.querySelector('.chatbot_send');

chatbot_send.addEventListener('click', () => {
    sendMessage();
});

