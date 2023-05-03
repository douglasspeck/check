# Tipos de Elementos

Os elementos são objetos cujas propriedades estão descritas abaixo:

## Lacunas Numéricas

**``input:``**

```html
<number [ value={INT} ]>
```

**``output:``**

```html
<input type="number" [ value={INT} readonly ]>
```

---

## Lacunas Textuais

**``input:``**

```html
<text [ value={STR} ]>
```

**``output:``**

```html
<input type="text" [ value={STR} readonly ]>
```

---

## Frações

**``input:``**

```html
<fraction [ int={INT} ] [ num={INT} ] [ den={INT} ]>
```

**``output:``**

```html
<div class="fraction [mixed]">
    ...
</div>
```

| Parâmetro | Opcional | Descrição | Output |
| :---: | :---: | :--- | :--- |
| ``int`` | ✅ | Se declarado, transforma a fração em uma **Fração Mista**, adicionando a classe ``.mixed`` à ``<div>``. Se for declarado com valor ``null``, imprime uma lacuna. | ``<input type="number" [value={INT} readonly]>`` |
| ``num`` | ✅ | Numerador da fração. Se omitido, imprime uma lacuna. | ``<input type="number" [value={INT} readonly]>`` |
| ``den`` | ✅ | Denominador da fração. Se omitido, imprime uma lacuna. | ``<input type="number" [value={INT} readonly]>`` |

---

## Figuras

**``input:``**

```html
<figure [ paint ] [ fill={INT} ] shape={STR} size={INT} sections={INT}>
```

**``output:``**
```html
<svg id="figure-{}">
    <path transform="..." d="..."></path>
    ⋮
    <path transform="..." d="..."></path>
</svg>
```

| Parâmetro | Opcional | Descrição | Entradas Suportadas | Output |
| :---: | :---: | :--- | :--- | :--- |
| ``paint`` | ✅ | Faz com que a figura seja preenchida quando clicada. || ``svg.paint`` |
| ``fill`` | ✅ | Faz com que dado número de seções da figura venham preenchidas por padrão.|| ``path.filled`` |
| ``shape`` | ❌ | Determina a forma da figura. | ``"circle"``, ``"rect"``, ``"square"``, ``"triangle"`` |
| ``size`` | ❌ | Determina o tamanho da região vetorial (``<svg>``) criada, em *pixels*. || ``width="{INT}px"``, ``height="{INT}px"``, ``viewbox="0 0 {INT} {INT}"`` |
| ``sections`` | ❌ | Determina o número de seções (``<path>``) em que a figura será dividida. |

---

## Conjuntos de Figuras

```js
{
    subset_count: INT,
    [ style: [BOOL,BOOL,...] ]
    figures: [
        {
            id: INT,
            shape: INT,
            fill: INT,
            location: [...] // Array decomprimento igual a subset_count + 1
        },
        ...
    ]
}
```

---

## Conjuntos Associáveis

**``input:``**

```html
<associate>
    <first>
        ...
    </first>
    <second>
        ...
    </second>
</associate>
```

**``output:``**

```html
<article class="associate">
    <section class="first-container">
        ...
    </section>
    <section class="second-container">
        ...
    </section>
</article>
```