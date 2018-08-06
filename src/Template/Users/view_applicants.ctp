
<section class="profile--user-body">

<h3 class="block-heading">Viewing Applicants</h3>

<table class="table-dashboard">

  <tr>
    <th>Name</th>
    <th>Job</th>
    <th>Status</th>
    <th>Actions</th>
  </tr>

  <?php foreach($applications as $application): ?>
    <tr>
      <td><?= h($application->first_name) . ' ' . h($application->last_name) ?></td>
      <td><?= $this->Text->truncate(h($application->job->title), 25, ['ellipis' => '...', 'exact' => false]) ?></td>
      <td><?= h($application->status) ?></td>
      <td>
        <?= $this->Html->link('View Application',[
          'controller' => 'Applications',
          'action' => 'view',
          h($application->id)], ['title' => 'View Application']) ?>
      </td>
    </tr>
  <?php endforeach; ?>

</table>



</section>