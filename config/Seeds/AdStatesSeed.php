<?php

use Phinx\Seed\AbstractSeed;

class AdStatesSeed extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'name' => 'Ativo',
                'alias' => 'ativo'                
            ],
            [
                'name' => 'Pausado',
                'alias' => 'pausado'                
            ],
            [
                'name' => 'Expirado',
                'alias' => 'expirado'                
            ],
            [
                'name' => 'Pendente',
                'alias' => 'pendente'                
            ],
            [
                'name' => 'Negado',
                'alias' => 'negado'                
            ],

        ];

        $adPlans = $this->table('ad_plans');
        $adPlans->insert($data)->save();
    }
}
