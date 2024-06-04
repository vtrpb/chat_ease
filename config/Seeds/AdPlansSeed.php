<?php

use Phinx\Seed\AbstractSeed;

class AdPlansSeed extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'name' => 'Plano Individual',
                'alias' => 'plan_individual',
                'active_days' => 30,
                'free' => false,
                'value' => 120,
            ],
            [
                'name' => 'Plano PJ Básico',
                'alias' => 'plan_pj',
                'active_days' => 30,
                'free' => false,
                'value' => 180,
            ],
            [
                'name' => 'Plano PJ Premium',
                'alias' => 'plan_pj_premium',
                'active_days' => 30,
                'free' => false,
                'value' => 240,
            ],
        ];

        $adPlans = $this->table('ad_plans');
        $adPlans->insert($data)->save();
    }
}
