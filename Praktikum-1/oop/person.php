<?php
class Person
{
   // membuat property
   public $nama;
   public $alamat;
   public $jurusan;

   public function setNama($data)
   {
      $this->nama = $data;
   }

   public function setAlamat($data)
   {
      $this->alamat = $data;
   }

   public function setJurusan($data)
   {
      $this->jurusan = $data;
   }

   public function getNama()
   {
      return $this->nama;
   }

   public function getAlamat()
   {
      return $this->alamat;
   }

   public function getJurusan()
   {
      return $this->jurusan;
   }
}

// membuat objek dari class Person 
$luvy = new Person();
$luvy->nama = "Luvy Muhammad Riski";
$raghib->alamat = "Jl. Sermaniran No.54";
$luvy->jurusan = "Teknik Informatika";

// mengakses property objek nama
echo $luvy->nama;
echo "<br>";
echo $luvy->alamat;
echo "<br>";
echo $luvy->jurusan;

echo "<br>";

echo "<br><br>============== OBJECK FUNCTION ==============";
// mengisi property objek melalui function
echo "<br>";
$luvy->setNama("Luvy Muhammad Riski");
$luvy->setAlamat("Jl. Sermaniran No.54");
$luvy->setJurusan("Teknik Informatika");
// mengakses property objek melalui function
echo $luvy->getNama();
echo "<br>";
echo $raghib->getAlamat();
echo "<br>";
echo $raghib->getJurusan();
