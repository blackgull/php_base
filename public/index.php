<?php
session_start();

use app\engine\Autoload;
use app\model\Products;
use app\model\Users;
use app\model\Carts;
use app\model\Orders;
use app\engine\Request;
use app\engine\RequestException;

require_once "../config/config.php";
//require_once "../engine/Autoload.php";
require_once '../vendor/autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);


/**
 * @var Products $product
 */

try {
    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();
    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    //var_dump($controllerClass);

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new \app\engine\Render());
        $controller->runAction($actionName);
    }
    else {
        throw new RequestException("Неверный контроллер");
    }

} catch (\PDOException $e) {
    echo "Ошибка БД";

} catch (RequestException $e) {
    echo($e->getMessage());
    var_dump($e->getTrace());

} catch (\Exception $e) {
    echo($e->getMessage());
    var_dump($e->getTrace());
}




