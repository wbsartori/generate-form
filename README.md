### Versão do Projeto  0.0.1


##### Tecnologias utilizadadas
###### php7.4 | 8.2
###### Bootstrap 5.2

<hr>

### Descrição
<hr>  

Gerador de arquivos front-end, gera 4 arquivos _list, _new, _edit e _delete.

###### Commands
<hr>

##### create-template:crud		- cria um crud completo new, edit, delete e listar
##### create-template:new 		- cria um template para inserir dados
##### create-template:edit 		- cria um template para editar dados
##### create-template:delete 		- cria um template para remover dados
##### create-template:list 		- cria um template para listar dados

##### update-template:add 		- cria um template para listar dados

##### name=						- nome do template
##### path=						- caminho onde será criado os templates
##### type=						- bootstrap
##### extension=					- php
##### fields=						- nome dos campos exemplo: nome:tipo separe com virgula para mais de um campo

##### fieldsAdd=					- adiciona mais um


<hr>

###### Exemplos:

##### php --create-template-crud    --name=Clients --path=App/Views --type=html --extension=html fields=name:text, age:number, birthDate:date
##### php --create-template-new     --name=Clients --path=App/Views/Clients --type=html --extension=html fields=name:text, age:number, birthDate:date
##### php --create-template-edit    --name=Clients --path=App/Views/Clients --type=html --extension=html fields=name:text, age:number, birthDate:date
##### php --create-template-delete  --name=Clients --path=App/Views/Clients --type=html --extension=html fields=name:text, age:number, birthDate:date
##### php --create-template-list    --name=Clients --path=App/Views/Clients --type=html --extension=html fields=name:text, age:number, birthDate:date

##### php update-template:add     --name=Clients --path=App/Views/Clients/new fieldsAdd=lastName:text, status:text