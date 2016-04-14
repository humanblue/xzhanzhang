<?php
class MY_Model extends CI_Model
{
    /**
     * 对象实例计数器
     * @var int
     */
    static $obj_count = 0;
    /**
     * @var 判断get_magic_quotes_runtime
     */
    public $boolMagic;

    public function __construct()
    {
        $this->load->database();
        ++self::$obj_count;
        parent::__construct();
        $this->boolMagic = get_magic_quotes_runtime();
    }
}