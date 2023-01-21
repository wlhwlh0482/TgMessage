$botToken = 5969604325:AAH1yRb9t2hSbx7rETqY4Czz_ehkSkpRJq4;
$website = "https://api.telegram.org/bot" . $botToken;

$request = file_get_contents('php://input');
$request = json_decode($request, true);

if (!$request) {
    // Some Error output (request is not valid JSON)
} elseif (!isset($request['update_id']) || !isset($request['message'])) {
    // Some Error output (request has not message)
} else {
    $chatId = $request["message"]["chat"]["id"];
    $message = $request["message"]["text"];


    switch ($message) {

        case "/test":
            sendMessage($chatId, "test");

            break;

        case "/hi":
            sendMessage($chatId, "hi there!");

            break;

        default:
            sendMessage($chatId, "default");
    }

    function sendMessage($chatId, $message)
    {
        $url = $GLOBALS[website] . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($message);
        url_get_contents($url);

    }


    function url_get_contents($Url)
    {

        if (!function_exists('curl_init')) {

            die('CURL is not installed!');
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
