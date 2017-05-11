<?php
class account

	{
	function advance($id)
		{
		global $database, $db;
		$qry = "SELECT `id`, `adv` FROM `" . TBL_ADVANCE . "` WHERE id=" . $id . "";
		$result = $database->query($qry);
		$row = $database->fetch_array($result);
		return $row['adv'];
		}
		
		function branch($id)
		{
		global $database, $db;
		$qry = "SELECT `id`, `branch` FROM `" . TBL_BRANCH . "` WHERE id=" . $id . "";
		$result = $database->query($qry);
		$row = $database->fetch_array($result);
		return $row['branch'];
		}
	}

?>