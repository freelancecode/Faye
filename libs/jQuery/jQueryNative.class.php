<?php
	App::load()->lib('HTML');
	
	class jQueryNative {
		private $jQuery 		= NULL;
		private $useScripTag 	= NULL;
		
		public function __construct($jQuery) {
			$this->jQuery 		= $jQuery;
		}
		
		protected function _render($actions) {
			$command = "\n";
			foreach($actions as $action) {
				$evalCommand = '';
				if(isset($action['selector'])) {
					if($action['selector'] === 'this') {
						$command .= sprintf("\t$(this)");
					} else {
						$command .= sprintf("\t$('%s')", $action['selector']);
					}
				}
				
				foreach($action['chain'] as $chain) {
					switch($chain['function']) {
						case 'eval':
							$evalCommand = $chain['args'][0];
						break;
						default:
							foreach($chain['args'] as &$arg) {
								if($arg instanceof Closure) {
									$startLen = $this->jQuery->length + 1;
									$return = $arg() === false ? 'return false;' : '';
									$endLen = $this->jQuery->length;
									
									$slice = array_slice($this->jQuery->actions, $startLen, $endLen);
									
									$arg = sprintf("function () {%s \t\t %s\n\t}", sprintf("\t%s", $this->_render($slice, false)), $return);
								} else if(is_array($arg)) {
									$arg = $arg;
								} else {
									$arg = "'" . $arg . "'";
								}
							}
							
							$command .= sprintf('.%s(%s)', $chain['function'], implode(', ', $chain['args']));
					}
				}
				
				if(isset($action['selector'])) {
					$command .= ";\n";
				}
				
				$command .= empty($evalCommand) ? '' : sprintf("window.eval('%s');\n", str_replace("'", "\'", $evalCommand));
			}
			
			return $command;
		}
		
		public function render($scriptTag = true) {
			// Get the command generated by the
			// jQuery command builder.			
			$command = $this->_render($this->jQuery->actions);
			
			// If the jQuery command is created as 
			// document ready callback, then wrap 
			// the command in a jQuery ready function.
			if($this->jQuery->onReady) {
				$command = sprintf("\njQuery (function($) {%s\n});", $command);
			}
			
			// If $scriptTag is equal true,
			// then we wrap the jQuery command 
			// in a <script> Tag.
			if($scriptTag) {
				$script = HTML('script');
				
				$script->removeAttr('src');
				$script->append($command);
			} else {
				$script = $command;
			}
			
			return $script;
		}
		
		public function __toString() {
			return (string)$this->render();
		}
	}