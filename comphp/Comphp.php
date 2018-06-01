<?php
namespace comphp;

const CORE_PATH = __DIR__;

class Comphp
{
    protected $config = [];

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function run()
    {
        spl_autoload_register(array($this, 'loadClass'));
        $this->setReporting();
        $this->removeMagicQuotes();
        $this->setDbConfig();
        $this->route();
    }

    public function route(){
        $controllerName = $this->config['defaultController'];

        $viewName = $this->config['defaultView'];

        $param = array();

        $url = $_SERVER['REQUEST_URI'];

        $position = strpos($url, '?');

        $url = $position === false ? $url : substr($url, 0, $position);

        $url = trim($url, '/');

        if ($url) {
            $urlArray = explode('/', $url);

            $urlArray = array_filter($urlArray);

            //var_dump($urlArray);

            $size = count($urlArray);

            $phpFileName = ucfirst($urlArray[$size-1]);

            $pos = strrpos($phpFileName, ".");

            $controllerName = substr($phpFileName, 0 ,$pos);

            if(strtolower($controllerName) == 'index'){
                $controllerName = "Login";
            }

            array_shift($urlArray);

            $viewName = strtolower($controllerName);

        }

        $controller = 'app\\controllers\\'. $controllerName . 'Controller';

        if (!class_exists($controller)) {
            exit($controller . 'Controller is not exist!');
        }

        new $controller($controllerName, $viewName);


    }

    public function setReporting()
    {
        if (APP_DEBUG === true) {
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors', 'On');
        }
    }

    public function stripSlashesDeep($value)
    {
        $value = is_array($value) ? array_map(array($this, 'stripSlashesDeep'), $value) : stripslashes($value);
        return $value;
    }

    public function removeMagicQuotes()
    {
        if (get_magic_quotes_gpc()) {
            $_GET = isset($_GET) ? $this->stripSlashesDeep($_GET ) : '';
            $_POST = isset($_POST) ? $this->stripSlashesDeep($_POST ) : '';
            $_COOKIE = isset($_COOKIE) ? $this->stripSlashesDeep($_COOKIE) : '';
            $_SESSION = isset($_SESSION) ? $this->stripSlashesDeep($_SESSION) : '';
        }
    }

    public function setDbConfig()
    {
        if ($this->config['db']) {
            define('DB_HOST', $this->config['db']['host']);
            define('DB_NAME', $this->config['db']['dbname']);
            define('DB_USER', $this->config['db']['username']);
            define('DB_PASS', $this->config['db']['password']);
        }
    }

    public function loadClass($className)
    {
        $classMap = $this->classMap();

        if (isset($classMap[$className])) {
            $file = $classMap[$className];
        } elseif (strpos($className, '\\') !== false) {
            // 包含应用（application目录）文件
            $file = APP_PATH . str_replace('\\', '/', $className) . '.php';
            if (!is_file($file)) {
                return;
            }
        } else {
            return;
        }

        include $file;

    }

    protected function classMap()
    {
        return [
            'comphp\base\Controller' => CORE_PATH . '/base/Controller.php',
            'comphp\base\Model' => CORE_PATH . '/base/Model.php',
            'comphp\base\View' => CORE_PATH . '/base/View.php',
            'comphp\db\Db' => CORE_PATH . '/db/Db.php',
            'comphp\db\Sql' => CORE_PATH . '/db/Sql.php',
        ];
    }

}

