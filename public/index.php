<?php require __DIR__ . '/../vendor/autoload.php';

session_start();

/**
 * Class App
 */
class App
{
    /**
     * @var array
     */
    protected $routes;

    /**
     * @var string
     */
    protected $nsController = 'App\Controller';

    /**
     * App constructor.
     * @param array $routes
     * @throws Exception
     */
    public function __construct(array $routes = [])
    {
        if (empty($routes)) {
            throw new Exception('Router list is empty!');
        }
        $this->routes = $routes;
    }

    public function run()
    {
        $route = strtok($_SERVER["REQUEST_URI"],'?');
        if (! array_key_exists($route, $this->routes)){
            throw new Exception('Route not found!');
        }

        list($controllerName, $methodName) = $this->routes[$route];

        $controllerName = $this->nsController. '\\' . $controllerName;
        $instance = new $controllerName;

        if (! is_callable([$instance, $methodName])) {
            throw new Exception('Invalid controller name or method!');
        }

        // Run method of controller
        call_user_func_array([$instance, $methodName], [(object) $_REQUEST]);
    }
}

// Register routes
$routes = require __DIR__ . '/../routes/web.php';

// Run app
try {
    (new App($routes))->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
