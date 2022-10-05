<?php 
namespace Class;
require __DIR__."/../assets/service/_pdo.php";
abstract class AbstractModel
{
    protected \PDO $pdo;
    function __construct()
    {
        $this->pdo = connexionPDO();
    }
}
?>