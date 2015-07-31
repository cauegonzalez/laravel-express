<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
        $nome = "Cauê Gonzalez";

        return "Olá ".$nome."!";
    }

    public function ola($nome)
    {
        return "Olá ".$nome."!";
    }

    public function hello($nome)
    {
        return view("test.index", array('nome'=>$nome));
    }

    public function notas()
    {
        return view("test.notas");
    }
}
