# RoutePHP
RoutePHP é um sistema de rota leve e simples.

## Importação
A primeira coisa a se fazer é baixar o **RoutePHP** e importar para seu projeto.
Se estiver utilizando gerenciadores de dependência como o Composer, por exemplo, atualize o namespace de **RoutePHP** para um caminho correto dentro de seu projeto.

## Configuração
A configuração de **RoutePHP** se dá pela variável` $dirBase`. Segue um projeto fictício.

```
	|-- nomeDoProjeto
		|-- src
			|-- database
				|-- script.sql
			|-- classes
				|-- Produto.php
				|-- Cliente.php
			|-- view
				|-- assets
				|-- dashboard.php
				|-- login.php
		|-- vendor
```
Com um projeto como acima, a variável `$dirBase` ficaria com o seguinte valor: `private $dirBase = '/nomeDoProjeto/src/view/';`
Por motivos de organização e facilitadade, aconselhamos que todas os arquivos que sejam uma view, fiquem dentro de uma única pasta. No exemplo dado, todas ficaram dentro uma pasta `view` em `src`. Isto é uma sugestão e não lei.

## Cadastrar as Rotas
A variável `$routes` possui todas as rotas que serão gerenciadas pela **RoutePHP**.
Para criar novas rotas, basta seguir o padrão das duas rotas de exemplo (elas não são necessárias para o funcionamento do sistema e podem ser removidas).

## Preciso imprimir o endereço da rota em uma tag <a>
Basta na página desejada, instanciar um objeto Route e utilizar a função `print()` passando como parâmetro o 'name' da rota desejada.
```
$route = new Route();
<a class="btn btn-primary" href="<?php $route->print('index'); ?>">Home</a>
```
Na verdade, a função `print()` imprime o endereço em qualquer tag.
  
## Preciso redirecionar a página
Quando não se precisa imprimir a rota, podemos realizar um redirect diretamente utilizando a função `redirect()` e passando o 'name' da rota. Exemplo: `$route->redirect('produtos');`
Neste caso o redirecionamento ocorrerrá automaticamente.

## Page 404
Caso uma rota inválida seja passado por parâmetro, **RoutePHP** retornará a rota que estiver configurada na variável `$notFound`.

## Adicionando rotas temporárias
É possível adicionar rotas dinânicamente. Para isto basta chamar a função add() e como parâmetro passar um array no formato de uma rota comum.
```
$route->add( ['name'=>'vendas', 'view'=>'adm/vendas.php'] );
```
Esta rota não é permanente e ficará disponível até que ocorra um redicionamento. Logo após a mesma é perdida.

## Implemetações Futuras
- [ ] Adicionar variáveis nas passagens de parâmetros. **Ex:** ´$route->redirect('produto/$id')´
- [ ] Aceitar cache para melhorar performance
