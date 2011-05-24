<?php
	defined('__SITE_PATH') or exit('NO DIRECT SCRIPT ACCCES ALLOWED.');

	defined('SECOND') 	or define('SECOND',	1);
	defined('MINUTE') 	or define('MINUTE',	60);
	defined('HOUR') 	or define('HOUR',	60 * MINUTE);
	defined('DAY') 		or define('DAY', 	24 * HOUR);
	defined('WEEK') 	or define('WEEK', 	7 * DAY);

	class Date {
		/**
		 * Get the date string for current time.
		 * 
		 * @return String
		 */
		public static function now() {
			return date('Y-m-d');
		}
		
		/**
		 * Create an array of date range.
		 * 
		 * @param Integer|String $lowerBound
		 * @param Integer|String $upperBound
		 * @param Integer $unit
		 * 
		 * @return Array
		 */
		public static function range($lowerBound, $upperBound, $unit = DAY) {
			if(is_string($lowerBound)) {
				$lowerBound = strtotime($lowerBound);
				
			}
			
			if(empty($upperBound)) {
				$upperBound = self::now();
			}
			
			if(is_string($upperBound)) {
				$upperBound = strtotime($upperBound);
			}
								
			$range = range($lowerBound, $upperBound, $unit);
			
			return array_map(function($date) { return date('Y-m-d', $date); }, $range);
		}
	}