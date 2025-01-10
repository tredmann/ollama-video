<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new \Ollama\Client\OllamaClient();

$completionApi = new \Ollama\Api\Completion(client: $client);

$address = "Max Mustermann, Musterstraße 11b, 99900 Musterstadt, Deutschland";

$prompt = <<< EOT
You are a helpful AI assistant who convert a given address in a json with the address data filled. The json should look like

```
{
    "firstName": "Tobias",
    "lastName": "Redmann",
    "street": "Goerzallee",
    "houseNumber": "299b",
    "postalCode": "14167",
    "city": "Berlin",
    "country": "Germany",
}
``` 

The address we want to convert is: $address
EOT;

$request = new \Ollama\Requests\CompletionRequest(
    model: "codestral:latest",
    prompt: $prompt,
    format: "json"
);

$response = $completionApi->getCompletion($request);


print_r($response->response);
