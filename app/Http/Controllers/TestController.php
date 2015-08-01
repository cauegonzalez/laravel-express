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

    public function noticias()
    {
        $arrayNoticias = array(0=>"Notícia 1", 1=>"Notícia 2", 2=>"Notícia 3", 3=>"Notícia 4");

        //abaixo, três formas de fazer a mesma coisa
        //return view("test.noticias", array('arrayNoticias'=>$arrayNoticias));
        //return view("test.noticias", ['arrayNoticias' => $arrayNoticias]);
        return view("test.noticias", compact('arrayNoticias'));
    }
}
