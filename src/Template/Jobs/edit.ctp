
<section class="profile--user-body">

<h3 class="block-heading">Edit Job: <?= h($job->title) ?></h3>

<?php

echo $this->Form->create($job, ['class' => 'form-control']);
echo $this->Form->control('user_id', ['type' => 'hidden']);
echo $this->Form->control('category_id', ['type' => 'hidden']);
echo $this->Form->control('type_id', ['type' => 'hidden']);
echo $this->Form->control('contract_id', ['type' => 'hidden']);
echo $this->Form->control('company_id', ['type' => 'hidden']);
echo $this->Form->control('title');
echo $this->Form->control('description');
echo $this->Form->control('salary');
echo $this->Form->control('city');
echo $this->Form->control('area');
echo $this->Form->button(__('Save Job'), ['class' => 'btn btn-primary']);
echo $this->Form->end();

?>



</section>

