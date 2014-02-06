#neurons-snippets#

A SnippetProvider for [Neurons](https://github.com/platdesign/Neurons).

##install##
`bower install neurons-snippets --save`

##Provider#

###$snippetProvider###

- **addLib($ns, $path)**	
Adds a Directory with php/html-files with a namespace.

		$snippetProvider->addLib('testlib', './test-snippets/html');

- **parse($ns, $name, $scope)**		
Parses a snippet-file with `$name`.php/.html of the `$ns`-lib.
		
	***Example***		
	The directory test-snippets/html has a file named: blog-article.php. To parse it with data in our `$scope` (can be an `object` or `array`) type:
		
		echo $snippetProvider->parse('testlib', 'blog-article', $scope);


#Contact#
![](http://www.bedit.de/test.svg?qwe=123)
