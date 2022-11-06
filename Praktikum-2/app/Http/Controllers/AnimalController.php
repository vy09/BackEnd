<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

class AnimalController extends Controller
{
    public $animals = [
        ['id' => 1, 'name' => 'Cow'],
        ['id' => 2, 'name' => 'Horse'],
        ['id' => 3, 'name' => 'Dog'],
        ['id' => 4, 'name' => 'Bird']

    ];

    public function index()
    {
        foreach ($this->animals as $animal) {
            echo  $animal['id'] . ' - ' .  $animal['name'] . "<br>";
        }
    }
    public function store(Request $request)
    {
        array_push($this->animals, ['id' => 5, 'name' => $request->name]);
        $this->index();
    }
    public function update(Request $request, $id)
    {
        // array_splice($this->animals, $request->name, 1, $id);
        array_splice($this->animals, $id - 1, 1, [['id' => $id, 'name' => $request->name]]);
        $this->index();
    }
    public function destroy($id)
    {
        unset($this->animals[$id - 1]);
        $this->index();
    }
}