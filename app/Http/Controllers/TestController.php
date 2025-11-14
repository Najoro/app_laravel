<?php

namespace App\Http\Controllers;

use App\Services\TestService;
use Illuminate\Http\Client\Request;

class TestController extends Controller{

    private TestService $testService;
    public function __construct(TestService $testService){
        $this->testService = $testService;
    }

    public function index(){
        return [
            "link" => \route("blog.show", ["slug" => "article", "id" => 12])
        ];
    }

    public function show($slug, $id) {
        return [
            "slug" => $slug,
            "id" => $id,
        ];
    }
}