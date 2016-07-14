<?php
/**
 * Application
 */

namespace app;

use models\User;
use PDO;

class App
{
    /** @var  App */
    protected static $instance;

    /** @var  string */
    public $appName;
    /** @var PDO  */
    protected $db;
    /** @var  Router */
    protected $router;

    protected $appRootPath;
    protected $webRootPath;

    /**
     * Constructor
     */
    protected function __construct()
    {
        $this->appRootPath = realpath(str_replace('/', DIRECTORY_SEPARATOR, '..'));
        $this->webRootPath = $this->appRootPath . DIRECTORY_SEPARATOR . 'web';

        $config = include($this->appRootPath . str_replace('/', DIRECTORY_SEPARATOR, '/config/config.php'));

        $this->appName = $config['appName'];

        $dsn = "mysql:dbname=" . $config['db']['dbName'] . ";host=" . $config['db']['host'];
        $this->db = new PDO($dsn, $config['db']['userName'], $config['db']['userPassword']);

        $this->router = new $config['router']['className']();
    }

    /**
     * Clone
     */
    protected function __clone()
    {

    }

    /**
     * Getter
     * @param $varName
     *
     * @throws \Exception
     */
    public function __get($varName)
    {
        if (is_string($varName)) {
            $methodName = 'get' . ucfirst($varName);
            if (method_exists($this, $methodName)) {
                return $this->$methodName();
            }
        }

        throw new \Exception("Error! Property $varName not found.");
    }

    /**
     * Setter
     * @param $varName
     * @param $value
     * @throws \Exception
     */
    public function __set($varName, $value)
    {
        if (is_string($varName)) {
            $methodName = 'set' . ucfirst($varName);
            if (method_exists($this, $methodName)) {
                return $this->$methodName($value);
            }
        }

        throw new \Exception("Error! Property $varName not found.");
    }

    /**
     * @return App
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function init()
    {
        session_start();
    }

    /**
     * App routing
     * @param string $path
     */
    public function route($path)
    {
        $this->router->route($path);
    }

    /**
     * App 404 error
     */
    public function show404()
    {
        $this->router->show404();
    }

    /**
     * @return PDO
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @return string
     */
    public function getAppRootPath()
    {
        return $this->appRootPath;
    }

    /**
     * @return string
     */
    public function getWebRootPath()
    {
        return $this->webRootPath;
    }
}
