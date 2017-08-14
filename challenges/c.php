<?php

/*
Challenge 3: Use reflection to get access to Question::$answer from $e->getAnswer
*/

class Question
{
    private $answer = 42;

    public function __construct($e)
    {
        try {
            throw $e;
        } catch (Exception $e) {
            echo $e->getAnswer($this) . PHP_EOL;
        }
    }
}


// start editing here
class Answer extends Exception
{
    function getAnswer($e)
    {
        $reflectionInstance = new ReflectionObject($e);
        $property = $reflectionInstance->getProperty('answer');
        $property->setAccessible(true);
        return $property->getValue($e);
    }
}
$e = new Answer();

// end editing here

new Question($e);

