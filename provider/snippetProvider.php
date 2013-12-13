<?PHP 
	
	namespace snippets;
	use nrns;
	
	
	

	class snippetProvider extends nrns\Provider {
		
		private $libs = [];
		
		public function __construct($fs) {
			$this->fs = $fs;
		}
		
		public function addLib($ns, $dir) {
			
			if( $fsDir = $this->fs->find($dir) ) {
				$this->libs[$ns] = $fsDir;
			} else {
				throw nrns::Exception('Snippet-Lib not found! ('.$dir.')');
			}
			
		}
		
		public function parse($ns, $name, $scope=[]) {
			
			if( isset($this->libs[$ns]) ) {
				if( $file = $this->libs[$ns]->find($name.'.php') OR $file = $this->libs[$ns]->find($name.'.html')) {
					$content = $file->get_contents();
					return $this->parseSnippetContent($content, $scope);
				}
			}
			
		}
		
		private function parseSnippetContent($content, $scope) {
			
			$pattern = '/\{\{(?!%)\s*([a-zA-z.]*)\s*(?<!%)\}\}/i';
			
			preg_match_all($pattern, $content, $matches, PREG_PATTERN_ORDER);
			
			$replacer = $matches[0];
			$varnames = $matches[1];
			
			$values=[];
			foreach($varnames as $dotstring) {
				$values[] = \_::parseDotString($dotstring, $scope);
			}
			
			return str_replace($replacer, $values, $content);
			
		}
		
	
	}
	
	

?>