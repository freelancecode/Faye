<?php


if( ! defined('DOCROOT') )
{
    require_once '/var/www/testlab/Faye/unittest/bootstrap.php';
}

class StringTest
{
    function testingHypenate()
    {
        $expected = array(
            'Hello-World',
            'This-is-a-string-unit-test',
        );
        
        $data = array(
            'Hello World',
            'This is a string unit test',
        );
        
        $this->assertTrue( new String instanceof 'String' );
        
    }
}
