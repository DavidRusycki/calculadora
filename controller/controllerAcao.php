<?php
require_once('./controller/controllerCalculadora.php');

const INDICE = 'indiceNumeros';
const CONTA = 'conta';

/**
 * Responsável por iniciar a sessão.
 */
function iniciaSessao() {
    if (!isset($_SESSION)) {
        session_start();
    }
}

/**
 * Processa a ação requisitada.
 */
function processaAcao() {
    iniciaConta();
    if (isset($_POST) && count($_POST)) {
        executaAcao();
    }

    exibeCalculadora();

}

/**
 * Executa a ação POST.
 */
function executaAcao() {
    iniciaOperacao();
    if (isset($_POST)) {
        if (isset($_POST['numero'])) {
            trataNumero($_POST['numero']);
        }
        else if (isset($_POST['operacao'])) {
            trataOperacao($_POST['operacao']);
        }
        else if (isset($_POST['igual'])) {
            trataIgual();
        }
        else if (isset($_POST['clear'])) {
            trataClear();
        }
    }
}

/**
 * Trata quando o post trazer um número.
 * @param String $sNumero
 */
function trataNumero($sNumero) {
    if (!isset($_SESSION[CONTA])) {
        $_SESSION[CONTA] = null;
    }
    // $iIndice = $_SESSION[INDICE];
    $_SESSION[CONTA] .= $sNumero;
    $_SESSION['operacao'] = false; 
}
/**
 * Trata quando o post trazer um operacao.
 * @param String $sOperacao
 */
function trataOperacao($sOperacao) {
    if (!$_SESSION['operacao']) {
        $_SESSION[CONTA] .= $sOperacao;
    }
    $_SESSION['operacao'] = true;
}

/**
 * Trata quando o post trazer uma requisição de igual.
 */
function trataIgual() {
    if ($_SESSION['operacao']) {
        $_SESSION[CONTA] = rtrim($_SESSION[CONTA], '+');
        $_SESSION[CONTA] = rtrim($_SESSION[CONTA], '-');
        $_SESSION[CONTA] = rtrim($_SESSION[CONTA], '/');
        $_SESSION[CONTA] = rtrim($_SESSION[CONTA], '*');
        $_SESSION['operacao'] = false;
    }

    eval('$xResult = ('.$_SESSION[CONTA].');');
    $_SESSION[CONTA] = $xResult;
}

/**
 * Trata quando o post trazer uma requisição para limpar.
 */
function trataClear() {
    $_SESSION[CONTA] = null;
}

/**
 * Inicia a operação.
 */
function iniciaOperacao() {
    if (!isset($_SESSION['operacao'])) {
        $_SESSION['operacao'] = true;
    }
}

/**
 * Inicia a conta
 */
function iniciaConta() {
    if (!isset($_SESSION[CONTA])) {
        $_SESSION[CONTA] = '';
    }
}