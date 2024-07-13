<?php
// В этом задании вам нужно исправить ошибки в предоставленном коде. Код имеет несколько логических и синтаксических ошибок, которые необходимо найти и исправить.
abstract class Animal {
  protected $name;
  protected $breed;

  public function __construct($name, $breed) {
    $this->name = $name;
    $this->breed = $breed;
  }

  abstract public function sound(): string;

  public function getName(): string {
    return $this->name;
  }
  public function getBreed(): string {
    return $this->breed;
  }
}
class Dog extends Animal {

  public function __construct(string $name, string $breed = 'Dog') {
    parent::__construct($name, $breed);
  }

  public function sound(): string {
    return "Woof";
  }
}
class Cat extends Animal {

  public function __construct(string $name, string $breed = 'Cat') {
    parent::__construct($name, $breed);
  }

  public function sound(): string {
    return "Meow";
  }
}

$rex = new Dog("Rex", "Labrador");
$stooped = new Dog("Stooped");
$murka = new Cat("Murka");

echo $rex->getBreed() . " " . $rex->getName() . " says " . $rex->sound() . "\n";
echo $stooped->getBreed() . " " . $stooped->getName() . " says " . $stooped->sound() . "\n";
echo $murka->getBreed() . " " . $murka->getName() . " says " . $murka->sound() . "\n";

// Результат работы программы
// Labrador Rex says Woof
// Dog Stooped says Woof
// Cat Murka says Meow

?>