# Gerador de formulários base

---

## Descrição

Gerador de arquivos front-end, gera 4 arquivos _list, _new, _edit e _delete.

---

## Commands

---

Cria um crud completo new, edit, delete e listar

```bash
  php generate-form --create-template-crud
```

Cria um arquivo new para gerar um novo registro

```bash
  php generate-form --create-template-new
```

Cria um arquivo edit para edição de dados

```bash
  php generate-form --create-template-edit
```

Cria um arquivo index para listar os dados

```bash
  php generate-form --create-template-list
```

Adiciona mais campos ao formulário que foi gerado, sempre irá adicionar ao final 
do arquivo de acordo com os campos passados na opção.
**--fields**

```bash
  php generate-form --create-template-add-fields
```

---

## Parâmetros possíveis

Nome da pasta do formulário.

````bash
    --name=folder_form
````

Tipo de template a ser criado, Laravel ou Bootstrap são as opções possíveis.

````bash
    --type=tipo
````

Quando for usado a opção create-template-form ou create-template-add-fields, é possíve
passar o parâmetro --fields para estipular quais campos devem ser criados no arquivo de formulário.

````bash
    --fields="fiel:type"
````

---

## Exemplos:

Cria um crud completo new, edit, delete e listar

```bash
  php generate-form --create-template-crud --name=customer --type=laravel --fields="name:text, age:number, birthDate:date"
```

Cria um arquivo new para gerar um novo registro

```bash
  php generate-form --create-template-new --name=customer --type=laravel --fields="name:text, age:number, birthDate:date"
```


Cria um arquivo edit para edição de dados

```bash
  php generate-form --create-template-edit --name=customer --type=laravel --fields="name:text, age:number, birthDate:date"
```


Cria um arquivo index para listar os dados

```bash
  php generate-form --create-template-list --name=customer --type=laravel --fields="name:text, age:number, birthDate:date"
```

Adiciona mais campos ao formulário que foi gerado, sempre irá adicionar ao final
do arquivo de acordo com os campos passados na opção.
**--fields**

```bash
  php generate-form --create-template-add-fields --name=customer --type=laravel --fields="name:text, age:number, birthDate:date"
```

---

# Tecnologias

- PHP >= 7.4
- Bootstrap >= 5.2
- Laravel >= 7