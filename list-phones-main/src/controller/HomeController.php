<?php

namespace App\Controller;

use App\Core\App;
use App\Core\Helpers\{Controller, Request};
use App\Libs\Parser;
use App\Repository\CustomerRepository;

class HomeController extends Controller
{
    public function index()
    {
        $phones = App::get('database')
            ->from('customer')
            ->findBy('phone');

        $phones = (new Parser(App::get('validators')))->map($phones);
        
        if (count(Request::all()) > 0) {
            $phones = CustomerRepository::filter($phones, Request::all());
        }

        return $this->view('index', compact('phones'));
    }
}
