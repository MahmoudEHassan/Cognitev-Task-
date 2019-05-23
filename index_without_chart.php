<?php
require_once __DIR__ . '/config.php';
class API {
  function Select(){
    $db = new Connect;
    $users = array();
    $data = $db->prepare('SELECT * FROM users ORDER BY id');
    $data->execute();
    while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
      $users[$OutputData ['id']] = array(
        'id'   => $OutputData['id'],
        'name'   => $OutputData['name'],
        'country'   => $OutputData['country'],
        'budget'   => $OutputData['budget'],
        'goal'   => $OutputData['goal'],
        'category'   => $OutputData['category']
      );
    }
    return json_encode($users);
  }
}
$API = new API;
header('Content-Type: application/json');
echo $API->Select();
 ?>
