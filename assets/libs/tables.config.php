<?php
include_once("db.config.php");
$PREFIX=DB_PREFIX;
defined('TBL_CUSTOMER') ? null : define('TBL_CUSTOMER',$PREFIX.'customer' );
defined('TBL_ADVANCE') ? null : define('TBL_ADVANCE',$PREFIX.'advance' );
defined('TBL_CREDIT') ? null : define('TBL_CREDIT',$PREFIX.'credit' );
defined('TBL_BOOKING') ? null : define('TBL_BOOKING',$PREFIX.'booking' );
defined('TBL_GROUP') ? null : define('TBL_GROUP',$PREFIX.'group' );
defined('TBL_CUSTOMERTYP') ? null : define('TBL_CUSTOMERTYP',$PREFIX.'customertyp' );
?>
