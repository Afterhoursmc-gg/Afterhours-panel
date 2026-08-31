<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
try {
    require '/var/www/pterodactyl/vendor/autoload.php';
    $app = require '/var/www/pterodactyl/bootstrap/app.php';
    $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
    $servers = Pterodactyl\Models\Server::query()->count();
    $nodes = Pterodactyl\Models\Node::query()->count();
    $locations = Pterodactyl\Models\Location::query()->count();
    echo json_encode(['servers'=>$servers,'nodes'=>$nodes,'locations'=>$locations,'online'=>0]);
} catch (Throwable $e) {
    http_response_code(503);
    echo json_encode(['servers'=>0,'nodes'=>0,'locations'=>0,'online'=>0,'error'=>'Pterodactyl backend utilgjengelig']);
}
