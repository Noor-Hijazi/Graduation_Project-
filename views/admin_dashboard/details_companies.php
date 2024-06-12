<?php 
declare(strict_types=1);
function read_car_view(object  $pdo, int $userId){
    $cars = read_companies_contr($pdo, $userId);

    if ($cars): 

         foreach ($cars  as $result): ?>
            <p>name: <?php echo htmlspecialchars($result['name']); ?></p>
            <p>Email: <?php echo htmlspecialchars($result['brand']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No cars registed.</p>
    <?php endif; 
}
