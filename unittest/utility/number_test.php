<?php

if( ! defined('DOCROOT') )
{
    require_once '/var/www/testlab/Faye/unittest/bootstrap.php';
}

class NumberTest extends UnitTestCase
{
    public $data = array(
            'Autoloader.php' => '1031',
            'Compiler.php' => '4956',
            'CompilerInterface.php' => '741',
            'Environment.php' => '24062',
            'Error.php' => '5231',
            'ExpressionParser.php' => '14054',
            'Extension.php' => '2061',
            'ExtensionInterface.php' => '1982',
            'Filter.php' => '1280',
            'FilterInterface.php' => '622',
            'Function.php' => '1159',
            'FunctionInterface.php' => '628',
            'Lexer.php' => '11755',
            'LexerInterface.php' => '654',
            'LoaderInterface.php' => '1045',
            'Markup.php' => '541',
            'Node.php' => '5727',
            'NodeInterface.php' => '566',
            'NodeOutputInterface.php' => '375',
            'NodeTraverser.php' => '2300',
            'NodeVisitorInterface.php' => '1256',
            'Parser.php' => '8943',
            'ParserInterface.php' => '593',
            'Template.php' => '10696',
            'TemplateInterface.php' => '1164',
            'TestInterface.php' => '474',
            'Token.php' => '5599',
            'TokenParser.php' => '640',
            'TokenParserBroker.php' => '2973',
            'TokenParserBrokerInterface.php' => '1190',
            'TokenParserInterface.php' => '909',
            'TokenStream.php' => '3253',
        );
        
    function testingNumber1()
    {
        $expected = array(
            'Autoloader.php' => '1.03 KB',
            'Compiler.php' => '4.96 KB',
            'CompilerInterface.php' => '741 Bytes',
            'Environment.php' => '24.06 KB',
            'Error.php' => '5.23 KB',
            'ExpressionParser.php' => '14.05 KB',
            'Extension.php' => '2.06 KB',
            'ExtensionInterface.php' => '1.98 KB',
            'Filter.php' => '1.28 KB',
            'FilterInterface.php' => '622 Bytes',
            'Function.php' => '1.16 KB',
            'FunctionInterface.php' => '628 Bytes',
            'Lexer.php' => '11.75 KB',
            'LexerInterface.php' => '654 Bytes',
            'LoaderInterface.php' => '1.04 KB',
            'Markup.php' => '541 Bytes',
            'Node.php' => '5.73 KB',
            'NodeInterface.php' => '566 Bytes',
            'NodeOutputInterface.php' => '375 Bytes',
            'NodeTraverser.php' => '2.30 KB',
            'NodeVisitorInterface.php' => '1.26 KB',
            'Parser.php' => '8.94 KB',
            'ParserInterface.php' => '593 Bytes',
            'Template.php' => '10.70 KB',
            'TemplateInterface.php' => '1.16 KB',
            'TestInterface.php' => '474 Bytes',
            'Token.php' => '5.60 KB',
            'TokenParser.php' => '640 Bytes',
            'TokenParserBroker.php' => '2.97 KB',
            'TokenParserBrokerInterface.php' => '1.19 KB',
            'TokenParserInterface.php' => '909 Bytes',
            'TokenStream.php' => '3.25 KB',
        );
        
        foreach( $this->data as $key => $val ) $this->assertEqual( $expected[$key], Number::toReadableSize($val) );
    }
}
