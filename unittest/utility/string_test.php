<?php

if( ! defined('DOCROOT') )
{
    require_once '/var/www/testlab/Faye/unittest/bootstrap.php';
}

class StringTest extends UnitTestCase
{
    function testingHypenate()
    {
        $expected = array(
            'hello-world',
            'this-is-a-string-unit-test',
        );
        
        $data = array(
            'Hello World',
            'This is a string unit test',
        );
        

        foreach( $data as $key => $str )
        {
            $this->assertEqual( $expected[$key], String::hyphenate($str) );
        }
    }
    
    function testingDash()
    {
        /* Hmm, something wrong. this is underscore actually. bygones! :p */
        $expected = array(
            'hello_world',
            'this_is_a_string_unit_test',
        );
        
        $data = array(
            'Hello World',
            'This is a string unit test',
        );
        
        foreach( $data as $key => $str )
        {
            $this->assertEqual( $expected[$key], String::dash($str) );
        }
        
    }
    
    function testingPascalize()
    {
        $expected = array(
            'HelloWorld',
            'ThisIsAStringUnitTest',
        );
        
        $data = array(
            'Hello World',
            'This is a string unit test',
        );
        
        foreach( $data as $key => $str )
        {
            $this->assertEqual( $expected[$key], String::pascalize($str) );
        }
    }
    
    function testingCamelize()
    {
        /* Java style */
        
        $expected = array(
            'helloWorld',
            'thisIsAStringUnitTest',
        );
        
        $data = array(
            'Hello World',
            'This is a string unit test',
        );
        
        foreach( $data as $key => $str )
        {
            $this->assertEqual( $expected[$key], String::camelize($str) );
        }
    }
    
    function testingSpaceSeparate()
    {
        $data = array(
            0 => 'hello_world',
            1 => 'this_is_a_string_unit_test',
            2 => 'helloWorld',
            3 => 'thisIsAStringUnitTest',
            4 => 'HelloWorld',
            5 => 'ThisIsAStringUnitTest',
            6 => 'hello-world',
            7 => 'this-is-a-string-unit-test',
        );
        
        $expected = array(
            'Hello World',
            'This Is A String Unit Test',
            'Hello World',
            'This Is A String Unit Test',
            'Hello World',
            'This Is A String Unit Test',
            'Hello World',
            'This Is A String Unit Test',
        );
        
        foreach( $data as $key => $str )
        {
            $this->assertEqual( $expected[$key], String::spaceSeparate($str) );
        }
    }
}
