const operacaoAnteriorText = document.querySelector("#operacao-anterior");
const operacaoAtualText = document.querySelector("#operacao-atual");
const botoes = document.querySelectorAll("#container-de-botoes button");


class Calcular{
    constructor(operacaoAnteriorText, operacaoAtualText){
        this.operacaoAnteriorText = operacaoAnteriorText;
        this.operacaoAtualText = operacaoAtualText;
        this.operacaoAtual = " ";
    }

    // Adiciona digitos a tela da calculadora
    adicionarDigito(digito){
        //Checa se a operação atual ja tem um ponto
        if(digito==="." & this.operacaoAnteriorText.innerText.includes(".")){
            return;
        }
        this.operacaoAtual = digito;
        this.atualizarTela();
    }

    // Processa todas as operações da calculadora
    processarOperacao(operacao){
        //Checa se a varialvel atual está vazia
        if(this.operacaoAtualText.innerText === "" && operacao !== "C"){
            //Muda a operação
            if(this.operacaoAnteriorText.innerText !== ""){
                this.mudaOperacao(operacao);
            }
            return;
        }

        //Pega o valor atual e o valor anterior
        let valorOperacao;
        const anterior = +this.operacaoAnteriorText.innerText.split(" ")[0];
        const atual = +this.operacaoAtualText.innerText;

        switch(operacao){
            case"+":
                valorOperacao = anterior + atual;
                this.atualizarTela(valorOperacao, operacao, atual, anterior);
                break;
            case"-":
                valorOperacao = anterior - atual;
                this.atualizarTela(valorOperacao, operacao, atual, anterior);
                break;
            case"/":
                valorOperacao = anterior / atual;
                this.atualizarTela(valorOperacao, operacao, atual, anterior);
                break;
            case"*":
                valorOperacao = anterior * atual;
                this.atualizarTela(valorOperacao, operacao, atual, anterior);
                break;
            case"DEL":
                this.processoOperadorDEL();
                break;
            case"CE":
                this.processoLimpaOperacaoAtual();
                break;
            case"C":
                this.processoLimpaTudo();
                break;
            case"=":
                this.processoOperadorIgual();
                break;
            default:
                return;
        }
    }
    // Muda os valores da tela da calculadora
    atualizarTela(
        valorOperacao = null, 
        operacao = null, 
        atual = null, 
        anterior = null){
            
            if(valorOperacao === null){
                this.operacaoAtualText.innerText += this.operacaoAtual;
            } else{
                //Checa se o valor é nulo, se for adiciona o valor atual
                if (anterior === 0){
                    valorOperacao = atual;
                }
                //Adciona o valor atual ao valor anterior
                this.operacaoAnteriorText.innerText = `${valorOperacao} ${operacao}`;
                this.operacaoAtualText.innerText = "";

            }
                
    }

    //Muda a operação matematica
    mudaOperacao(operacao){
        const operacaoMatematica = ["*", "/", "+", "-"]

        if(!operacaoMatematica.includes(operacao)){
            return;
        }
        this.operacaoAnteriorText.innerText = this.operacaoAnteriorText.innerText.slice(0, -1) + operacao;
    }

    //Deleta um digito
    processoOperadorDEL(){
        this.operacaoAtualText.innerText = this. operacaoAtualText.innerText.slice(0, -1);
    }

    // Aapga operação atual
    processoLimpaOperacaoAtual(){
        this.operacaoAtualText.innerText = "";
    }

    //Apaga tudo
    processoLimpaTudo(){
        this.operacaoAtualText.innerText = "";
        this.operacaoAnteriorText.innerText = "";
    }

    //Executa o operado Igual
    processoOperadorIgual(){
        const operacao = operacaoAnteriorText.innerText.split(" ")[1];
        
        this.processarOperacao(operacao);
    }
}

const calcular = new Calcular(operacaoAnteriorText, operacaoAtualText);

botoes.forEach((btn) =>{
    btn.addEventListener("click",(e) =>{
        const valor = e.target.innerText;

        if(+valor >= 0 || valor ==="."){
            calcular.adicionarDigito(valor);
        } else{
            calcular.processarOperacao(valor);
        }
    });
});