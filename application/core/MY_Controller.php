<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 12-6-4
 * Time: 下午3:49
 * To change this template use File | Settings | File Templates.
 */
class MY_Controller extends CI_Controller
{
    /**
     * 保存登录有的用户信息
     * @var array
     */
    public $user = array();

    /**
     * 保存当前控制器和方法名
     * @var array $current
     */
    public $current = array();

    function __construct()
    {
        parent::__construct();
        $this->current['current_controller'] = $this->uri->rsegment(1);
        $this->current['current_action'] = $this->uri->rsegment(2);
        $this->load->vars($this->current);

    }

    /**
     * 当前http请求是否为post
     * @return bool
     */
    protected function isPOST()
    {
        return $this->input->server('REQUEST_METHOD') === 'POST';
    }

    /**
     * 当前http请求是否为ajax
     * @return mixed
     */
    protected function isAjax()
    {
        return $this->input->is_ajax_request() || isset($_GET['callback']);
    }

    /**
     * @param int $status 0管理员 1学生 2老师
     * @return bool
     */
    protected function isLogin($status = 1)
    {
        if ($this->user) {
            return true;
        }
        $token = get_cookie("token-{$status}");
        $token = authcode($token, 'DECODE');
        $userid = 0;
        $password = '';
        if ($token) {
            $data = explode("\t", $token);
            $userid = isset($data[0]) ? $data[0] : 0;
            $password = isset($data[1]) ? $data[1] : '';
        }

        return false;
    }

    /**
     * ajax json输入
     * @param $data
     */
    static protected function json_output($data)
    {
        header('Content-Type: application/json');
        if(isset($_GET['callback']))
        {
            $callback = $_GET['callback'];
            echo "{$callback}(", json_encode($data), ")";
            die;
        }
        echo json_encode($data);
        die;
    }


}

