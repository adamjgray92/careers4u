
<section class="profile--user-body">
<h3 class="block-heading">Add New Job</h3>
<?php

echo $this->Form->create($job, ['class' => 'form-control']);

echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
echo $this->Form->control('title');
echo $this->Form->control('description');
echo $this->Form->control('category_id', [
  'type' => 'select',
  'options' => $categories,
  'empty' => 'Choose category']);
echo $this->Form->control('salary');
echo $this->Form->control('city');
echo $this->Form->control('area');
echo $this->Form->control('contact_name');
echo $this->Form->control('contact_info');
echo $this->Form->control('contract_id', [
  'type' => 'select',
  'options' => $contracts,
  'empty' => 'Choose contract type']);
echo $this->Form->control('type_id', [
  'type' => 'select',
  'options' => $types,
  'empty' => 'Choose job type']);
echo $this->Form->button(__('Save Job'), ['class' => 'btn btn-primary']);
echo $this->Form->end();
?>
</section>
