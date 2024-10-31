<?php


namespace App\Functions\Exemples;

function helloWord(): string
{
    return 'hello world';
} 

function randomCode() : int
{
    return rand(100_000, 999_999);
}