<aside class="profile--user-nav">

  <h3 class="block-heading">Navigation</h3>
  
  <nav>

    <ul>

      <li><?= $this->Html->link('My Dashboard', [
        'controller' => 'Users',
        'action' => 'profile'
      ], ['title' => 'My Dashboard']) ?></li>

      <?php if($user->isSeeker()): ?>

      <li><?= $this->Html->link('My Applications', [
        'controller' => 'Users',
        'action' => 'myApplications'
      ], ['title' => 'My Applications']) ?></li>
      <li><?= $this->Html->link('Saved Jobs', [
        'controller' => 'Users',
        'action' => 'savedJobs'
      ], ['title' => 'Saved Jobs']) ?></li>
      <li><?= $this->Html->link('Email Preferences', [
        'controller' => 'Users',
        'action' => 'emailPreferences'
      ], ['title' => 'Email Preferences']) ?></li>

      <?php elseif($user->isEmployer()): ?>

      <li><?= $this->Html->link('Post Job', [
        'controller' => 'Jobs',
        'action' => 'add'
      ], ['title' => 'Add New Job']) ?></li>
      <li><?= $this->Html->link('My Jobs', [
        'controller' => 'Users',
        'action' => 'viewJobs'], ['title' => 'My Jobs']) ?></li>
      <li><?= $this->Html->link('View Applicants', [
        'controller' => 'Users',
        'action' => 'viewApplicants'], ['title' => 'View Applicants']) ?></li>
      <li><?= $this->Html->link('Mailbox', ['controller' => 'Users', 'action' => 'mailbox'], ['title' => 'Mailbox']) ?></li>

      <?php endif; ?>

      <li><?= $this->Html->link('Edit Profile', [
        'controller' => 'Users',
        'action' => 'edit'
      ], ['title' => 'Edit Profile']) ?></li>
      <li><?= $this->Html->link('Change Password', [
        'controller' => 'Users',
        'action' => 'changePassword'
      ], ['title' => 'Change Password']) ?></li>
      <li><?= $this->Html->link('Logout', [
        'controller' => 'Users',
        'action' => 'logout'
      ], ['title' => 'Logout']) ?></li>

    </ul>

  </nav>

</aside>

<?php if($user->isEmployer()): ?>

<aside class="profile--user-nav">

<h3 class="block-heading">Company</h3>

<nav>

  <ul>

    

    <?php if(empty($user->companies)): ?>
      <li><?= $this->Html->link('Create Company', [
          'controller' => 'Companies',
          'action' => 'add'
        ], ['title' => 'Add Company']) ?></li>
    <?php else: ?>
      <?php foreach($user->companies as $company): ?>  
      <li><?= $this->Html->link('View Company', [
          'controller' => 'Companies',
          'action' => 'profile',
          $company->slug
        ], ['title' => 'View Company', 'target' => '_blank']) ?></li>
      <li><?= $this->Html->link('Edit Company', [
        'controller' => 'companies',
        'action' => 'edit'], ['title' => 'Edit Company']) ?></li>
      <?php endforeach; ?>
    <?php endif; ?>

    

  </ul>

</nav>

</aside>

<?php endif; ?>