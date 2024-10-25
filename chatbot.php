<?php
function getChatbotResponse($message) {
    $url = "http://localhost:5000/generate";
    $data = ["prompt" => $message];

    $options = [
        "http" => [
            "header" => "Content-Type: application/json\r\n",
            "method" => "POST",
            "content" => json_encode($data),
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        return "Sorry, there was an error processing your request.";
    }

    $response = json_decode($result, true);
    return $response["response"] ?? "Sorry, I couldn't understand that.";
}

// Example usage
$message = "What is financial literacy?";
echo getChatbotResponse($message);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Literacy Chatbot</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #chatbox {
            height: 400px;
            overflow-y: scroll;
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .user-message { color: blue; }
        .bot-response { color: green; }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Finance Literacy Chatbot</h2>
    <div id="chatbox" class="mb-3"></div>
    <form id="chatForm">
        <div class="input-group">
            <input type="text" id="user_query" name="user_query" class="form-control" placeholder="Ask me a finance question..." required>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#chatForm').submit(function(e) {
            e.preventDefault();
            const userMessage = $('#user_query').val().trim();
            
            if (userMessage) {
                $('#chatbox').append(`<p class="user-message"><strong>You:</strong> ${userMessage}</p>`);
                $('#user_query').val('');

                $.ajax({
                    url: '',
                    type: 'POST',
                    data: { user_query: userMessage },
                    dataType: 'json',
                    success: function(response) {
                        const botResponse = response.response;
                        $('#chatbox').append(`<p class="bot-response"><strong>Bot:</strong> ${botResponse}</p>`);
                        $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);
                    },
                    error: function() {
                        $('#chatbox').append('<p class="bot-response"><strong>Bot:</strong> Sorry, there was an error processing your request.</p>');
                        $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);
                    }
                });
            }
        });
    });
</script>
</body>
</html>
