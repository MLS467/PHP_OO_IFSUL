class Carrinho {


    constructor() {
        this.body = document.body;
        this.arquivoJson = '';
    }

    mostrarCarrinho = () => {

        const titulo = document.createElement('div');
        titulo.setAttribute('id', 'titulo');

        const valorTotal = document.createElement('div');
        valorTotal.setAttribute('class', 'valorTotal');

        const h2 = document.createElement('h2');
        h2.setAttribute('id', 'valorT');
        h2.innerHTML = 'carregando...';

        const Reais = document.createElement('div');
        valorTotal.setAttribute('class', 'reais');
        Reais.innerHTML = `<h2>Total:</h2>`;

        const qtdItens = document.createElement('div');
        qtdItens.setAttribute('class', 'reais');
        qtdItens.setAttribute('id', 'qtd');
        qtdItens.innerHTML = `<h2>Qtd: 0</h2:>`;

        valorTotal.prepend(Reais);
        valorTotal.appendChild(h2);
        titulo.prepend(valorTotal);
        titulo.appendChild(qtdItens);


        const style = document.createElement('style');
        style.innerHTML = this.estiloCarrinho();
        document.head.appendChild(style);

        const escurecerTela = document.createElement('div');
        escurecerTela.setAttribute('class', 'escurecerTela');
        this.body.prepend(escurecerTela);

        const divConteudo = document.createElement('div');
        divConteudo.setAttribute('id', 'divConteudo');
        divConteudo.innerHTML = "";
        this.pegaDadosEmJSON()
            .then(res => {
                console.log(res);
                let config = null;

                if (res.valores.itens.length == 0) {
                    divConteudo.innerHTML = "<h2>Nenhum item no Carrinho :(</h2>";
                } else {
                    res.valores.itens.forEach(element => {
                        config = {
                            id: element.id,
                            imagem: element.img_prod,
                            nome: element.nome_prod,
                            quantidade: element.qtd_prod,
                            valor: element.valor_prod
                        }

                        divConteudo.appendChild(this.estruturaDoCarrinho(config));

                    });

                    let valorFormatado = res.valores.valorTotal.soma.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });

                    document.getElementById('valorT').innerHTML = (valorFormatado);
                    document.getElementById('qtd').innerHTML = `<h2>Qtd: ${res.valores.qtdItens.contagem}</h2>`;
                }
            });

        escurecerTela.prepend(divConteudo);



        const divBotoes = document.createElement('div');
        divBotoes.setAttribute('id', 'divBotoes');
        escurecerTela.appendChild(divBotoes);

        const btn = document.createElement('button');
        btn.setAttribute('class', 'btn btn-primary');
        btn.innerHTML = `OK`;
        btn.addEventListener('click', () => { this.ocultarCarrinho() });
        divBotoes.appendChild(btn);

        escurecerTela.prepend(titulo);
    }


    ocultarCarrinho = () => {
        const tela = [...document.querySelectorAll('.escurecerTela')];
        tela[0].remove();
    }

    estiloCarrinho = () => {
        const estilo = `
    .escurecerTela { z-index: 999;display: flex;justify-content: center;align-items: center;flex-direction: column;position: absolute;top: 0;left: 0; width: 100%;height: 100vh;background-color: rgba(0, 0, 0, 0.7);}
    #divConteudo {padding:50px; color:black; width: 50%; height: 60%; display: flex; justify-content: center; align-items: center; background-color: #fff; overflow-y: scroll; overflow-x: hidden; flex-flow: column;}
    #divBotoes {width: 50%;height: 10%;display: flex;justify-content: center;align-items: center;background-color: #ccc;border-radius: 0px 0px 10px 10px;}
    #divp { display: flex;justify-content: space-around;align-items: center; width: 100%;flex-direction:row; }
    #nomeUser { border: 2px solid blue; padding: 10px; }
    #titulo {width: 50%; height:60px; background-color: #ccc;border-radius: 10px 10px 0px 0px;padding: 25px;display: flex;justify-content: space-between;align-items: center;flex-flow:;}
    .produto { border-radius:5px;display: flex;justify-content: space-between;align-items: center; width: 100%; padding:10px;flex-direction:column; margin-top:5px; }
    .valorTotal{flex;justify-content: center;align-items: center;width:100%;height:50px;background-color:white;}
    .reais{padding:10px;border-radius:10px;background-color:white;max-width:100%;height:40px;display:flex;justify-content:center;align-items: center;flex-direction:row;}
    .divRemove{width:40px;height:inhenhed;display: flex;justify-content: center;align-items: center;}
    #imgRemove{width:32px;height:32px;}
    `;

        return estilo;
    }


    pegaDadosEmJSON = async () => {
        const $res = (await fetch(`../produto/retornaJSON.php`)).json();
        return await $res;
    }

    estruturaDoCarrinho = (produto) => {

        const divProduto = document.createElement('div');
        divProduto.classList.add('produto');
        divProduto.classList.add('divDest');
        divProduto.setAttribute('style', ' border: 2px solid #ccc');

        const imgProduto = document.createElement('img');
        imgProduto.src = `../img/${produto.imagem}`;
        imgProduto.alt = 'Imagem do Produto';
        imgProduto.style.width = '50px';
        imgProduto.style.height = '50px';
        imgProduto.style.marginRight = '10px';


        const divRemove = document.createElement('div');
        divRemove.setAttribute('id', 'removerDiv');
        divRemove.classList.add('divRemove');
        divRemove.addEventListener('click', (evt) => {
            evt.target.parentNode.parentNode.parentNode.classList.add('efeitoRemover');
            this.deletarItemDoCarrinho(produto.id);
            this.ocultarCarrinho();
            document.getElementById('btnCarrinho').click();
        })

        const imgRemove = document.createElement('img');
        imgRemove.setAttribute('src', '../icon/remove.png');
        imgRemove.setAttribute('id', 'imgRemove');
        imgRemove.setAttribute('title', 'Remover Item');

        const divCont = document.createElement('div');
        divCont.setAttribute('id', 'divp');

        const divNome = document.createElement('div');
        divNome.classList.add('nomeProd');
        divNome.textContent = produto.nome;
        divNome.style.marginRight = '10px';

        const divQtd = document.createElement('div');
        divQtd.classList.add('qtdProd');
        divQtd.textContent = `Quantidade: ${produto.quantidade}`;
        divQtd.style.marginRight = '10px';

        const divValor = document.createElement('div');
        divValor.classList.add('valorProdUni');
        divValor.textContent = `Valor Unitário: R$${(produto.valor).toFixed(2)}`;

        divCont.appendChild(imgProduto);
        divCont.appendChild(divNome);
        divCont.appendChild(divQtd);
        divCont.appendChild(divValor);
        divRemove.appendChild(imgRemove);
        divCont.appendChild(divRemove);
        divProduto.appendChild(divCont);



        return divProduto;

    }


    deletarItemDoCarrinho = async (id) => {
        const dados = JSON.stringify({ id: id });
        console.log(dados);

        const resultado = await fetch(`../produto/deletarProd.php/?id=${id}`, {
            method: 'GET',
            headers: { 'Content-Type': 'application/json' },
        })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    console.log("Excluido com sucesso");
                }
            })
            .catch(erro => {
                console.error(erro);
            })
    }
}

export { Carrinho };
