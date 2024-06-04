<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Config $config
 */
?>
<div class="configs form large-9 medium-8 columns content">
    <?= $this->Form->create($config) ?>
    <fieldset>
        <legend><?= __('Adicionar Configuração') ?></legend>
        <?php
            echo "<div class=\"form-group\">";                
                echo $this->Form->control('user_id', ['label'=>'Perito(a)','options' => $users,'class'=>'form-control']);
                echo $this->Form->control('management',['label'=>'Gerência','class'=>'form-control']);
                echo $this->Form->control('core',['label'=>'Núcleo','class'=>'form-control']);
                echo $this->Form->control('core_chief',['label'=>'Chefe de Núcleo','class'=>'form-control']);
                echo $this->Form->control('operational_manager',['label'=>'Gerente Operacional','class'=>'form-control']);
                echo $this->Form->control('sector',['label'=>'Setor','class'=>'form-control']);
                echo $this->Form->control('city',['label'=>'Cidade','class'=>'form-control']);
            echo "</div>";
        ?>
    </fieldset>
    <?= $this->Form->button(__('<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> SALVAR'),['class'=>'btn btn-default']) ?>    
    <?= $this->Form->end() ?>
    <br>
</div>
