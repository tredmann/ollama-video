<?php

require_once __DIR__ . "/vendor/autoload.php";


$client = new \Ollama\Client\OllamaClient();

$modelsApi = new \Ollama\Api\ListLocalModels($client);

$response = $modelsApi->listLocalModels();

$models = $response->models;

foreach ($models as $model) {
    echo $model->name . "\n";
}

// codestral:latest
