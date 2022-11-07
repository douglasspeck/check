# Tipos de Elementos
## Frações

**``input:``**

```html
<fraction [ int={INT} ] [ num={INT} ] [ den={INT} ]>;
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