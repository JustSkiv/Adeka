<?php

/**
 * Created by Nikolay Tuzov
 */
class PostNew
{
    public function before()
    {
        echo 'Post New - before!';
    }

    public function actionIndex()
    {
        echo 'Post New - index!';
    }

    public function actionTest()
    {
        echo 'Post New - test!';
    }

    public function actionTestNew()
    {
        echo 'Post New - test new!';
    }
}