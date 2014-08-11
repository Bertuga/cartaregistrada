#Bertuga_CartaRegistrada

Módulo de cálculo de frete por Carta Registrada para Magento

##Compatibilidade

Testado no Magento 1.7 e 1.9

##Descrição

O módulo faz o cálculo do frete baseado apenas no peso dos itens do pedido, até o limite de 500g, para pedidos acima desse peso, os correios usam os mesmos preços que o SEDEX usa conforme dito no site: http://www.correios.com.br/para-voce/consultas-e-solicitacoes/precos-e-prazos/servicos-nacionais_pasta/carta

Portanto, nos casos em que o peso excede 500g, a forma de Carta Registrada não ficara disponível.

Recomendo o uso desse módulo em conjunto com o módulo PedroTeixeira_Correios (https://github.com/pedro-teixeira/correios), justamente para cobrir os casos em que a Carta Registrada não se aplica.

##Configurações

As configurações do módulo ficam em Sistema > Configuração, e na parte lateral em Formas de Entrega. Ao clicar na aba Carta Registrada as seguintes opções se tornam disponíveis:

- **Habilitar** - Liga ou desliga o módulo;
- **Título** - O nome que aparece no checkout para o frete;
- **Formato do Peso** - A forma que você cadastra o peso dos seus produtos, se o valor é em Quilos(kg) ou Gramas(gr);
- **Valor do Pacote** - Valor a ser adicionado ao valor do frete, como os custos da embalagem para o envio. Deve ser um número decimal, separado por .(ponto). Ex: 1.50 (Um real e cinquenta centavos);
- **Restringir disponibilidade** - No caso de nem todos os seus produtos poderem ser enviados por Carta Registrada, é possível colocar restrições. Primeiramente o tipo de restrição:
**Não restringir**: sem restrição nenhuma;
**Produto**: apenas os produtos selecionados podem ser enviados dessa forma;
**Categoria**: apenas produtos que pertençam à essa(s) categoria(s) podem ser enviados dessa maneira;
- **Permitidos** - Aqui vão os ids, das categorias ou produtos, que podem ser enviados por Carta Registrada. No caso de mais de um id, é necessário separá-los por vírgula. Ex: 100,200,300.
- **Frete grátis** - Se esse frete é gratuito caso o valor seguinte seja alcançado;
- **Valor mínimo para frete grátis** - Valor a ser alcançado para que o frete não seja cobrado;
- **Ordem** - Prioridade na ordem em que os fretes disponíveis são listados;
