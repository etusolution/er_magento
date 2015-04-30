<?php
class Etu_Er_Helper_Data extends Mage_Core_Helper_Abstract
{
	public static $ER_API_SERVER;
	public static $ER_CID;
	public static $ER_GROUP;

	public function Etu_Er_Helper_Data(){
		self::$ER_API_SERVER = getenv('ER_API_SERVER');
		self::$ER_CID = getenv('ER_CID');
		self::$ER_GROUP = getenv('ER_GROUP');
	}


}
	 