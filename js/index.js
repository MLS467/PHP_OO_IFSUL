import { Carrinho } from "./carrinho.js";


const carrinho = new Carrinho();


const mostraItensCarrinho = () => {
    carrinho.pegaDadosEmJSON();
    carrinho.mostrarCarrinho();
}


document.getElementById('btnCarrinho').addEventListener('click', mostraItensCarrinho);