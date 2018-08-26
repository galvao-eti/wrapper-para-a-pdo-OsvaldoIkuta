<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Osvaldo
 * Date: 13/08/2018
 * Time: 15:18
 */

namespace Turma3;

/*$localhost = array(
    'driver' => 'mysql',
    'host' => 'localhost',
    'dbname' => 'turma3',
    'username' => 'root',
    'password' => '');
*/

//use Turma3\Traits\Hidratacao;

class Config{
    public $driver;
    public $host;
    public $dbname;
    public $username;
    public $password;

    function __construct(string $driver, string $host, string $dbname, string $username, string $password)
    {
        $this->driver = $driver;
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }




}