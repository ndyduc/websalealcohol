<?php
class BaseController
{
  protected $folder; // Biến có giá trị là thư mục nào đó trong thư mục views, chứa các file view template của phần đang truy cập.
  function render($file, $data = array()){
    $view_file = 'views/' . $this->folder . '/' . $file . '.php';
    if (is_file($view_file)) {
      extract($data);
      require_once($view_file);
    } else {
      header('Location: index.php?controller=Alcohol&action=error');
    }
  }
}