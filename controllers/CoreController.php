<?php
namespace WhizzKids\Controller;

class CoreController {
	public function __construct() {}

	public function validateParams($required_params, $data) {
		$valid = true;
		if (count(array_intersect_key(array_flip($required_params), $data)) === count($required_params)) {
			foreach($required_params as $check_param) {
				if($data[$check_param] == '' || is_null($data[$check_param])) {
					$valid = false;
				}
			}
		} else {
			$valid = false;
		}
		$message = ($valid ? 'Required values provided' : 'Required values not provided');
		return ['success' => $valid, 'message' => $message];
	}
}