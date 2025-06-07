<?php

namespace App\Services\Finders;

use App\Repository\FiltroRepository;

class DisponibilidadeFinder 
{
    protected $bensFiltrados;

    /**
     * Construtor da classe.
     * Inicializa o repositório Filtro.
    */
    public function __construct()
    {
        $this->bensFiltrados = new FiltroRepository();
    }

    /**
     * Retorna todos os bens locáveis disponíveis no intervalo de datas especificado e com base no número de hóspedes.
     * Também armazena os dados da possível reserva na sessão.
     *
     * @param string $dataInicio Data de início da reserva (formato: YYYY-MM-DD).
     * @param string $dataFim Data de fim da reserva (formato: YYYY-MM-DD).
     * @param int $hospedes Número de hóspedes para a reserva.
     *
     * @return array Lista de bens locáveis disponíveis.
    */
    public function all_avalible($dataInicio, $dataFim, $hospedes)
    {
        $disponiveis = $this->bensFiltrados->all_avalible($dataInicio, $dataFim, $hospedes);
        return $disponiveis;
    }

    /**
     * Retorna todos os bens locáveis disponíveis em uma cidade
     * @param string $cidades Lista de nomes de cidades.
     * @return array Lista de bens locáveis disponíveis.
    */
    public function all_local($cidades)
    {
        $cidadesArray = explode(',', $cidades);
        $disponiveis = $this->bensFiltrados->filtro_localizacao($cidadesArray);
        return [$disponiveis, $cidadesArray];
    }


    public function um_local($cidade)
    {
        $disponiveis = $this->bensFiltrados->um_local($cidade);
        return $disponiveis;
    }

     /**
     * Retorna todos os bens locáveis disponíveis em uma cidade
     * @param array $colecao_bens_locaveis Lista de bens locáveis disponíveis.
     * @param string $dataInicio Data de início da reserva (YYYY-MM-DD).
     * @param string $dataFim Data de fim da reserva (YYYY-MM-DD).
     * @return \Illuminate\Support\Collection Bens locáveis disponíveis no período.
    */
    public function all_avalible_in_city($cidades, $dataInicio, $dataFim)
    {
        [$disponiveis, $cidadesArray] = $this->all_local($cidades);

        if ($dataInicio || $dataFim)
        {
            $disponiveis = $this->bensFiltrados->all_avalible_in_city($disponiveis, $dataInicio, $dataFim);

        }
        return [$disponiveis, $cidadesArray];
    }
}
