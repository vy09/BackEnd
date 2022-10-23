<?php
// membuat class Animal
class Animal
{
   // property animals
   public $nama;

   public function __construct($data)
   {
      $data = array('elepant', 'cow', 'horse', 'dog');
      return $this->nama = $data;
   }

   public function index()
   {
      foreach ($this->nama as $key => $value) {
         echo $key . ' : ' . $value . '<br>';
      }
   }

   public function store($nama)
   {
      array_push($this->nama, $nama);
   }

   public function update($index, $nama)
   {
      array_splice($this->nama, $index, 1, $nama);
   }

   public function delete($index)
   {
      unset($this->nama[$index]);
   }
}

$animal = new Animal([]);
echo "Index - Menampilkan Seluruh data Hewan <br>";
$animal->update(1, "horse");
$animal->index();

echo "<br> Store - Menambahkan data Hewan <br>";
$animal->store("dog");
$animal->index();

echo "<br> Update - Mengubah data Hewan <br>";
$animal->update(1, "elephant");
$animal->index();

echo "<br> Delete - Menghapus data Hewan <br>";
$animal->delete(2);
$animal->index();