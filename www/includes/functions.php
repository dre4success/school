<?php

	class Utils{

		public static function ErrorHandler($key, $value) {

			if(isset($key[$value])) {

				echo '<span class="err">'.$key[$value].'</span>';
			}

		}




	}	