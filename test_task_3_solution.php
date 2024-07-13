<?php
// Доработайте код из test_task_2.php так, чтобы он мог выполняться на сайте с возможностью выбора языка отображения
// Для простоты считаем, что имя животного может быть на любом языке, при этом порода собаки только на выбранном языке
// Пример псевдо-кода такого сайта:
require_once('./test_task_2_solution.php');

class ConfigReader {
  public const LOCALE_RU = 'ru';
  public const LOCALE_EN = 'en';
}

class Controller {
  private $locale;

  public function __construct(string $locale) {
    $this->locale = $locale;
  }

  public function index() {
    $rex = new Dog('Rex', 'Labrador');
    $murka = new Cat('Мурка');

    $this->showLine($rex);
    $this->showLine($murka);
  }

  public function showLine(Animal $animal) {
    $breed = $animal->getBreed();
    $name = $animal->getName();
    $sound = $animal->sound();

    if ($this->locale === ConfigReader::LOCALE_RU) {
      $translations = [
        'Dog' => 'Собака',
        'Cat' => 'Кошка',
        'Labrador' => 'Лабрадор',
        'Woof' => 'Гав',
        'Meow' => 'Мяу'
      ];

      $breed = $translations[$breed] ?? $breed;
      $sound = $translations[$sound] ?? $sound;

      echo "$breed $name говорит $sound\n";
    } else {
      echo "$breed $name says $sound\n";
    }
  }
}

$controller = new Controller(ConfigReader::LOCALE_RU);
$controller->index();
$controller_en = new Controller(ConfigReader::LOCALE_EN);
$controller_en->index();

// Результат работы программы
// Лабрадор Rex говорит Гав
// Кошка Мурка говорит Мяу
// Labrador Rex says Woof
// Cat Мурка says Meow
?>

