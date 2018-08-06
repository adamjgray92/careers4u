<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$siteTitle = 'Careers4U';
?>

<?= $this->Html->docType() ?>
<html lang="en">
<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
  <?= $siteTitle ?> |
  <?= $this->fetch('title') ?></title>
  <?= $this->fetch('meta') ?>
  <!-- Styles -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <?= $this->Html->css('styles.min') ?>
</head>
<body>

  <a href="#" class="skip">Skip To Main Content</a>

  <header class="<?= $header_type ?>">
    <div class="container">
      <div class="top-header">
        <div class="logo">
          <a href="<?= $this->request->webroot ?>"><h1>Careers4u.jobs</h1></a>
        </div>
        <div class="button">
          <a href="#" class="btn-open"></a>
        </div>
        <nav class="main-navigation">
          <ul>
            <?php if($Auth->user()): ?>
            <li><?= $this->Html->link('My Profile', [
              'controller' => 'Users',
              'action' => 'profile'], ['title' => 'View My Profile']) ?></li>
              <li><?= $this->Html->link('Logout', ['controller' => 'users', 
              'action' => 'logout'], ['title' => 'Log out']) ?></li>
            <?php else: ?>
            <li><?= $this->Html->link('Sign Up', '/users/signup') ?></li>
            <li><?= $this->Html->link('Login', '/users/login') ?></li>
            <?php endif; ?>
            <?php if($Auth->user('role_id') === 2): ?>
              <li><?= $this->Html->link('Post A Job', ['controller' => 'jobs',
            'action' => 'add'], ['title' => 'Post new job', 'class'=>'btn btn-primary btn-rounded']) ?></li>
              <?php else: ?>
              <li><?= $this->Html->link('Browse Jobs', ['controller' => 'jobs',
              'action' => 'browse'], ['title' => 'Browse jobs', 'class'=>'btn btn-primary btn-rounded']) ?></li>
            <?php endif; ?>
            
          </ul>
        </nav>
        <div class="overlay">
          <nav class="wrap">
            <ul class="wrap-nav">
              <li><h3>User</h3>
                <ul>
                  <li><a href="#">Log In</a></li>
                  <li><a href="#">Sign Up</a></li>
                  <li><a href="#">What We Do</a></li>
                </ul>
              </li>
              <li>
                <h3>Candidates</h3>
                <ul>
                  <li><a href="#">My Dashboard</a></li>
                  <li><a href="#">Browse All Jobs</a></li>
                  <li><a href="#">Jobs By Category</a></li>
                  <li><a href="#">Saved Jobs</a></li>
                </ul>
              </li>
              <li>
                <h3>Employers</h3>
                <ul>
                  <li><a href="#">My Dashboard</a></li>
                  <li><a href="#">Post A Job</a></li>
                  <li><a href="#">My Jobs</a></li>
                  <li><a href="#">Browse Candidates</a></li>
                </ul>
              </li>
            </ul>
            <ul class="social-links">
              <li><a class="facebook" href="#" title="Facebook"></a></li>
              <li><a class="twitter" href="#" title="Twitter"></a></li>
              <li><a class="google-plus" href="#" title="Google Plus"></a></li>
              <li><a class="instagram" href="#" title="Instagram"></a></li>
            </ul>
          </nav>
        </div>
      </div>
      <?php if($header_type === 'landing-header'): ?>
      <div class="middle-header">
        <?= $this->element('landing-search') ?>
      </div>
      <?php else: ?>
    </div>
    <div class="middle-header">
      <?= $this->fetch('sidebar') ?>
      </div>
      <?php endif; ?>
  </header>

  <main id="main-content">