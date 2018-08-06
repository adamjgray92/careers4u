



<section class="profile--user-body">

  <h3 class="block-heading">My Jobs</h3>

  <table class="table-dashboard">

    <tr>
      <th>Title</th>
      <th>Actions</th>
    </tr>

    <?php foreach($jobs as $job): ?>
      <tr>
        <td><?= h($job->title) ?></td>
        <td>
          <?= $this->Html->link('View',[
            'controller' => 'Jobs',
            'action' => 'view',
            h($job->id)], ['title' => 'View Job', 'target' => '_blank'
          ]) ?>
          <?= $this->Html->link('Edit',[
            'controller' => 'Jobs',
            'action' => 'edit',
            h($job->id)], ['title' => 'Edit Job'
          ]) ?>
          <a href="">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>

  </table>

  

</section>