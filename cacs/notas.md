# Anotações
- As figuras são geradas através de DOM Interativo, usando SVG. Optei por essa opção (ao invés de usar o Canvas) após ler uma [Análise](https://css-tricks.com/when-to-use-svg-vs-when-to-use-canvas/) que destacou alguns pontos:
    - SVG é mais fácil de começar;
    - SVG lida melhor com poucas figuras;
    - SVG é mais fácil de tornar acessível;

## Lista de Afazeres
### Adições
- [x] Mapeamento das etapas de desenvolvimento
    - [x] Montar o banco de atividades (1/2).
    - [x] Com base no banco de atividades, definir quais as ferramentas que serão criadas.
    - [ ] Terminar o banco de atividades (2/2).
- [ ] Diagramar as páginas:
    - [ ] Landing Page
    - [ ] Páginas de Atividade
- [ ] Implementação:
    - [ ] Caderno 1
    - [ ] Caderno 2
    - [ ] Caderno 3
    - [ ] Caderno 4
    - [ ] Caderno 5
    - [ ] Caderno 6
- [ ] Publicação
- [ ] Teste e Avaliação
- [ ] Documentação
### Correção de Bugs

## Ideias
- Na sequência 7, a seta possui um elemento superscrito que acredito ser desnecessário.
- Acho que o gap entre as sequências 18 e 19 é muito grande. Em vários momentos os CACs são extremamente enrolados, mas nessa parte eles escalonam muito rápido.
- A sequência 23 deveria aparecer antes da 22, uma vez que é ela que introduz a comparação de frações.
- Há duas representações que achei particularmente ruins: a da régua (Sequência 25+) e a de transformação de frações mistas (Sequência 28, Atividade 4). Na primeira eu penso que poderia ser mantida a reta, enquanto a segunda eu achei contraintuitiva por si só.
- A partir da sequência 29 aparecem atividades de comparar figuras e depois comparar frações. No entanto, os exercícios trazem as comparações de forma separada, sendo que se tratam de comparações equivalentes. Poderia haver apenas uma comparação.
- Sinto que as atividades da sequência 33 são _overcomplicated_.
- **O que deve contar no banco de dados?**
    - SISTEMA:
        - Questões;
        - Respostas;
    - USUÁRIO:
        - Login:
            - Simples: traçar perfil de usuário;
            - Dados Socio-econômicos;
        - Respostas:
            - Quantas tentativas?
            - O usuário voltou para conferir as respostas?
            - Onde a sessão iniciou?
            - Onde a sessão terminou? => Analisar se está todo mundo encerrando na mesma
    - SALA DE AULA:
        - Diferentes cadastros para professor e aluno;
        - **Relatórios:**
            - Progressão Individual:
                - Indivíduo;
                - Período de tempo;
                - Número de questões feitas;
                - Percentual de acertos;
                - Identificação dos erros;
            - Progressão em grupo:
                - Atribuir tarefas;
                - Visão geral da progressão individual de cada aluno da turma;
- Como dispor os exercícios?
    - Botão: ver resposta ("Pedir ajuda");
    - Botão: conferir respostas => Efetuar a correção

### Tipos de Recursos
1. **Associar:** Clique em um conjunto + Clique em outro conjunto gera uma conexão.
2. **Preencher subconjuntos:** Clicar no elemento do conjunto maior seleciona ele como um "pincel". Cada figura sólida deve ter um ID próprio e uma classe (esta última de acordo com o formato). Pelo ID, a função selecionaria ela como pincel, preenchendo o subconjunto selecionado em sequência com uma figura de mesma classe e ID. Após a ação, a figura sólida é hachurada. Ao clicar na figura gerada no subconjunto, a mesma é removida e a figura original tem sua hachura removida.
3. **Contornar subconjuntos:** Com base em uma "paleta de padrões", o usuário pode hachurar as figuras de maneiras diferentes, destacando as mesmas em diferentes subconjuntos de acordo com o padrão de sua hachura.
4. **Preencher Lacuna:**
- Lacunas numéricas
- Frações Comuns
- Frações Mistas
5. **Preencher Fração por Extenso**
- Circular sinal da desigualdade
- Conjunto de Frações
- Contar Figuras Sólidas por Conjunto
- Contar Figuras Sólidas por Tipo
- Contornar Pontos
- Contornar subconjuntos de acordo com fração
- Dividir Figuras
- Hachurar Figuras
- Preencher Linha Segmentada
- Preencher o contorno com subconjuntos de acordo com a fração
- Preencher subconjuntos de acordo com fração
- Selecionar desigualdades