<?php

namespace Route;

class Route {

      private $dirBase = '/vocacional/src/view/';
      private $notFound = '404.php';
      private $countRoutes = 0;

      public function __construct() {
         $this->countRoutes = count($this->routes);
      }

   /*
   * Variável com todas as rotas válidas.
   */ 
   private $routes = [
      ['name' => 'index', 'view' => 'index.php'],
      ['name' => 'login', 'view' => 'login.php']
   ];

   /*
   * Função responsável por realizar um redirecionamento para uma rota desejada.
   * Esta função não imprime o caminho.
   *                                               
   * @param 'name' - Nome da rota desejada.
   */
   public function redirect($name) {
      $route = $this->find($name);
      return header('Location:' . $route);
   }

   /*
   * Função responsável por imprimir o caminho de uma rota.
   * Ela não realiza redicionamento.
   * 
   * @param 'name' - Nome da rota desejada.
   */

   public function print($name) {
      echo $this->find($name);
      return;
   }

   /*
   * Função responsável por encontrar uma rota desejada.
   * @param 'name' - Nome da rota desejada.
   * @return 'view' - Caminho da rota desejada se existir ou, caso não exista, retorna uma página de erro (404).
   */
   private function find($name) {
      for($i = 0; $i < $this->countRoutes; $i++) {
         if($this->routes[$i]['name'] == $name) {
            return $this->redirect = $this->dirBase . $this->routes[$i]['view'];
         }
      }

      return $this->redirect = $this->dirBase . $this->notFound;
   }

   /*
   * Adiciona uma nova rotas às existentes de modo temporário.
   * A rota fica registrada até que ocorra um redicionamento.
   * 
   * @param 'route' - array no formato de uma rota comum.
   */
   public function add($route) {
      array_push($this->routes, $route);
   }
}
