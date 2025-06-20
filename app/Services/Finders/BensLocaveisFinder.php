<?php

namespace App\Services\Finders;

use App\Repository\BensLocaveisRepository;

class BensLocaveisFinder
{
    protected $bensLocaveis;

    /**
     * Construtor da classe.
     * Inicializa o repositório de bens locáveis.
     */
    public function __construct()
    {
        $this->bensLocaveis = new BensLocaveisRepository();
    }

    /**
     * Retorna um bem locável específico com base no seu ID.
     *
     * @param int $id ID do bem locável a ser buscado.
     * @return object|null Objeto representando o bem locável, ou null se não encontrado.
     */
    public function find($id)
    {
        $bem = $this->bensLocaveis->find($id);
        return $bem;
    }


    /**
     * Retorna informações detalhadas de um bem locável, incluindo marca, localização e características agregadas.
     *
     * @param int $id ID do bem locável.
     * @return object|null Objeto com os detalhes completos do bem locável, ou null se não encontrado.
     *
     * Campos retornados: modelo, numero_quartos, preco_diario, numero_hospedes, numero_casas_banho, numero_camas, marca_nome
     * - marca_obs, cidade, filial, posicao, caracteristicas (lista concatenada em string separada por vírgulas)
     */
    public function getOneBem($id)
    {
        return $this->bensLocaveis->getOneBem($id);
    }

    public function extrairCaracteristicasComBem($id, $incluirDetalhes)
    {
        $bem = $this->getOneBem($id);
        if (!$bem) {
            return []; 
        }

        $caracteristicas = explode(', ', $bem->caracteristicas);

        if ($incluirDetalhes) {
            $caracteristicas[] = "{$bem->numero_quartos} quartos";
            $caracteristicas[] = "{$bem->numero_casas_banho} casas de banho";
            $caracteristicas[] = "{$bem->numero_camas} camas";
            $caracteristicas[] = "{$bem->numero_hospedes} hóspedes";
        }

        return ['bem' => $bem, 'caracteristicas' => $caracteristicas];    
    }
}
