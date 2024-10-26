<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to call the Ollama model
function generateResponse($prompt)
{
    $formattedPrompt = "You are a knowledgeable finance and banking expert. Directly answer the following question, ensuring your response is relevant to financial principles and practices: " . $prompt;
    $escapedPrompt = escapeshellarg($formattedPrompt);
    $command = "C:\\Users\\PARMESHWAR\\AppData\\Local\\Programs\\Ollama\\ollama.exe run llama3.2 " . $escapedPrompt;

    // Log the command
    file_put_contents('command.log', $command . PHP_EOL, FILE_APPEND);

    $output = shell_exec($command);

    // Log the output
    file_put_contents('output.log', $output . PHP_EOL, FILE_APPEND);

    return trim($output);
}

// Initialize chat history
session_start();
if (!isset($_SESSION['chatHistory'])) {
    $_SESSION['chatHistory'] = [];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prompt = htmlspecialchars($_POST['prompt']);
    file_put_contents('prompt.log', $prompt . PHP_EOL, FILE_APPEND); // Log the prompt

    // Generate response with a finance context
    if ($prompt) {
        $response = generateResponse($prompt);
        $timestamp = date('H:i'); // Get current timestamp
        $_SESSION['chatHistory'][] = ['question' => $prompt, 'response' => $response, 'timestamp' => $timestamp];

        // Limit to the last 5 interactions
        if (count($_SESSION['chatHistory']) > 5) {
            array_shift($_SESSION['chatHistory']); // Remove the oldest interaction
        }
    }
}

// Handle edit actions
if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['index'])) {
    $index = (int) $_GET['index'];
    if (isset($_SESSION['chatHistory'][$index])) {
        $questionToEdit = $_SESSION['chatHistory'][$index]['question'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finbot</title>
    <style>
        * {
            scrollbar-color: var(--main-surface-tertiary) transparent
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f5f5f5;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
            padding: 10px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #007BFF;
        }

        form {
            display: flex;
            flex-direction: row;
        }

        .chat-container {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            height: 400px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .chat-item {
            display: flex;
            flex-direction: column;
            margin: 10px 0;
        }

        .question,
        .response {
            padding: 10px;
            border-radius: 10px;
            margin: 5px 0;
            position: relative;
            max-width: 80%;
            word-wrap: break-word;
            border: 1px solid #ccc;
            /* Light gray border */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: justify;
            /* Subtle shadow for depth */
        }

        .question {
            background: #e8f0fe;
            /* Light blue for questions */
            color: #0056b3;
            /* Darker blue for question text */
            align-self: flex-start;
            /* Align to the left */
        }

        .response {
            background: #f1f3f4;
            /* Light gray for responses */
            color: #333;
            /* Dark text color */
            align-self: flex-end;
            /* Align to the right */
        }

        .timestamp-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-top: 5px;
        }

        .timestamp {
            font-size: 12px;
            color: #aaa;
            margin-right: 10px;
        }

        .copy-button,
        .edit-button {
            background: transparent;
            border: none;
            cursor: pointer;
            color: #007BFF;
        }

        .copy-button:hover {
            color: #0056b3;
            /* Darker blue on hover */
        }

        .input-container {
            display: flex;
            margin-top: auto;
            width: 100%;
            max-width: 800px;
        }

        textarea {
            flex: 1;
            /* Allow textarea to grow */
            border: 1px solid #ccc;
            /* Light border */
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            resize: none;
            margin-right: 10px;
            /* Space between textarea and button */
            background: #ffffff;
            /* White background for textarea */
            color: #333;
            /* Dark text color */
        }

        .send-button {
            background: #28a745;
            /* Green button */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px;
            display: flex;
            align-items: center;
        }

        .send-button:hover {
            background: #218838;
            /* Darker green on hover */
        }
    </style>
    <script>
        function copyToClipboard(id) {
            const responseText = document.getElementById(id).innerText;
            navigator.clipboard.writeText(responseText).then(function () {
                alert('Response copied to clipboard!');
            }).catch(function (err) {
                console.error('Failed to copy: ', err);
            });
        }
    </script>
</head>

<body>
    <h1>Finbot: Onestop solution for all finance enquiries!</h1>
    <div class="chat-container">
        <?php if (!empty($_SESSION['chatHistory'])): ?>
            <?php foreach ($_SESSION['chatHistory'] as $index => $chatItem): ?>
                <div class="chat-item">
                    <div class="question">
                        Q: <?php echo $chatItem['question']; ?>
                        <a class="edit-button" href="?action=edit&index=<?php echo $index; ?>">✎</a>
                    </div>
                    <div class="response" id="response-<?php echo $index; ?>">
                        A: <?php echo $chatItem['response']; ?>
                        <div class="timestamp-container">
                            <span class="timestamp"><?php echo $chatItem['timestamp']; ?></span>
                            <button class="copy-button" onclick="copyToClipboard('response-<?php echo $index; ?>')"
                                aria-label="Copy">📋</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="input-container">
        <form method="post" style="width: 100%;">
            <textarea name="prompt" rows="1" placeholder="Enter your finance-related question..."></textarea>
            <button type="submit" class="send-button" aria-label="Send">➤</button>
        </form>
    </div>

    <?php if (isset($questionToEdit)): ?>
        <script>
            document.querySelector('textarea[name="prompt"]').value = "<?php echo addslashes($questionToEdit); ?>";
        </script>
    <?php endif; ?>
</body>

</html>