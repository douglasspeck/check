# Tipos de Recursos

As atividades possuem uma estrutura geral de objeto na forma:

```js
{
    notebook: INT,
    sequence: INT,
    activity: INT,
    [ item: INT ],
    type: INT,
    elements: [
        OBJECT,
        ...
    ],
    [ example: BOOL ]
}
```

Além disso, podem ter outros parâmetros relacionados ao tipo de atividade:

---

## Preencher Lacuna

Preencha uma lacuna numérica ou de fração baseada na figura correspondente.

```js
{
    ...
    type: 1,
    elements: [
        {...},  // Figura ou Conjunto de Figuras
        {...}   // Lacuna numérica ou de fração
    ],
    ...
}
```

---

## Hachurar Figuras

Clique em uma seção da figura muda o estado da mesma para ```hachurado```.

```js
{
    ...
    type: 2,
    elements: [figura, fraction],
    ...
}
```

---

## Associar

Clique em um conjunto + Clique em outro conjunto gera uma conexão.

```js
{
    ...
    type: 3,
    elements: [
        [...],  // primeiro grupo
        [...]   // segundo grupo
    ],
    ...
}
```

---

## Contar figuras em subconjuntos

Preencher lacunas numéricas vinculadas a subconjuntos do conjunto principal.

```js
{
    ...
    type: 4,
    elements: {
        set: {...},
        inputs: [
            {...},  // Lacuna numérica (com ou sem label) ou Subconjunto.
            ...
        ]
    },
    ...
}
```

---

## Formar subconjuntos

Clicando nas figuras do conjunto principal, o usuário copia o formato e estilo de hachura e pode colar sobre os subconjuntos.

```js
{
    ...
    type: 5,
    elements: {
        set: {...},
        inputs: [
            {...},  // Lacuna numérica (com ou sem label) ou Subconjunto.
            ...
        ]
    },
    ...
}
```

---

## Formar subconjuntos

Clicando nas figuras dos subconjuntos, o usuário copia o estilo de hachura e pode colar sobre os elementos do conjunto principal.

```js
{
    ...
    type: 6,
    elements: {
        set: {...},
        inputs: [
            {...},  // Lacuna numérica (com ou sem label) ou Subconjunto.
            ...
        ]
    },
    ...
}
```

---

## Preencher Fração por Extenso

Simples lacunas feitas com `<input type="text"/>`.

---

## Preencher subconjuntos de acordo com fração

Com base em uma "paleta de figuras sólidas", o usuário pode preencher os subconjuntos de maneiras diferentes.

---

## Preencher o contorno com subconjuntos de acordo com a fração

O usuário pode clicar no subconjunto e em seguida no contorno para adicionar um novo subconjunto ao mesmo (tentar incluira a possibilidade de arrastar). Clicar em um subconjunto já adicionado exclui o mesmo.

---

- Circular sinal da desigualdade
- Conjunto de Frações
- Contornar Pontos
- Contornar subconjuntos de acordo com fração
- Dividir Figuras
- Preencher Linha Segmentada
- Selecionar desigualdades