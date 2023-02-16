<?php

function testInternetSpeed() {
    // URL do arquivo de teste de download
    $downloadUrl = 'https://speed.hetzner.de/100MB.bin';

    // Inicia o temporizador
    $start = microtime(true);

    // Cria a requisição cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $downloadUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    $info = curl_getinfo($ch);

    // Para o temporizador
    $end = microtime(true);

    // Calcula a velocidade da internet em Mbps (Megabits por segundo)
    $speed = ($info['size_download'] * 8) / (($end - $start) * 1000000);

    // Exibe a velocidade da internet
    printf("Velocidade da internet: %.2f Mbps", $speed);
}

testInternetSpeed();