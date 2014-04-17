<!--
Filename: convert_priority.php
Authors name: Graydon Armstrong
Website name: Graydon Web Design
File Description: Converts the priority number to a user freindly string
-->

<?php

	function convert_priority($inPriority) {
		$inPriority = intval($inPriority);
		switch($inPriority)
		{
			case 1:
				$outString = "1 - Low Priority";
				break;

			case 2:
				$outString = "2 - Medium Priority";
				break;

			case 3:
				$outString = "3 - High Priority";
				break;

			case 4:
				$outString = "4 - Very High Priority";
				break;
		}

		return $outString;
	}

?>