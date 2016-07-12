<?php
namespace Org\Util;
/**
 *发送短信验证码类
 */
class MessageVerify {

	/**
	 * 手机号码
	 * @val string
	 * @access protected
	 */
	protected $cellphone;


	/**
	 * 平台号
	 * @val string
	 * @access protected
	 */
	protected static $PLATFORM_NUMBER = "340003";

	
	/**
	 * 时间格式为date("YmsHis")格式 
	 * @val string
	 * @access protected
	 */
	protected $DATA_TIME;


	/**
	 * 交易码 
	 * @val string
	 * @access protected
	 */
	protected $TRANSACATION_CODE = "1000";

	/**
	 * 流水号
	 * @val string
	 * @access protected
	 */
	protected $FLOW_NUMBER;


	/**
	 * 验证码
	 * @val string
	 * @access protected
	 */
	protected $VERIFY_CODE;

	
	/**
	 * 验证码长度
	 * @val string
	 * @access protected
	 */
	protected $length = 6;


	/**
	 * 验证码软文
	 * @val string
	 * @access protected
	 */
	protected $message = "（短信验证码，30分钟有效）【安徽邮政微信平台】";
	

	/**
	 * 构造函数
	 * 创建一个MessageVerify对象
	 * @param string $cellphone手机号码
	 * @access public
	 */
	public function __construct($cellphone = '') {
		$this->cellphone = $cellphone;
	}

	

	public function sendMessage() {
		
	}

	private function assemble_datagram() {
		
		
	}

	public static function str_random($length = 6) {
		$str = "0123456789";
		return substr(str_shuffle($str), 0, $length);

	}
}
?>
