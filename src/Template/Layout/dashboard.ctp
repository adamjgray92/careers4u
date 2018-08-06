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

  <header class="page-header">
    <div class="top-header">
      <div class="logo">
        <a href="<?= $this->request->webroot ?>"><h1>Careers4u.jobs</h1></a>
      </div>
      <div class="button">
        <a href="#" class="btn-open"></a>
      </div>
      <nav class="main-navigation">
        <ul>
          <li><?= $this->Html->link('Browse Jobs', '/jobs/browse') ?></li>
          <?php if($Auth->user()): ?>
          <li><?= $this->Html->link('My Profile', [
            'controller' => 'Users',
            'action' => 'profile'], ['title' => 'View My Profile']) ?></li>
          <?php else: ?>
          <li><?= $this->Html->link('Sign Up', '/users/signup') ?></li>
          <li><?= $this->Html->link('Login', '/users/login') ?></li>
          <?php endif; ?>
          <li><?= $this->Html->link('Post A Job', '/jobs/post', ['class'=>'btn btn-primary btn-rounded']) ?></li>
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

  </header>
  
  <main id="main-content">

  <?= $this->Flash->render() ?>

  <article id="user-profile">

    <div class="container">

      <div class="row">

        <div class="col-sm-12 col-md-3">

          <?= $this->Element('Users/sidebar', [
            'user' => $user
          ]) ?>

        </div>

        <div class="col-sm-12 col-md-9">
          
          <?= $this->fetch('content') ?>


        </div>

      </div>

    </div>

  </article>

  </main>

  <footer id="page-footer">
    <div class="container">
      <div class="footer-wrapper">
        <section class="footer-about">
          <h3>Careers4U.jobs</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis deserunt magnam facere autem id minus architecto dolore eaque nisi sit quam doloribus nesciunt, voluptates perspiciatis molestiae culpa beatae sunt? Aut?</p>
          <ul class="social-links">
            <li><a class="facebook" href="#" title="Facebook"></a></li>
            <li><a class="twitter" href="#" title="Twitter"></a></li>
            <li><a class="google-plus" href="#" title="Google Plus"></a></li>
            <li><a class="instagram" href="#" title="Instagram"></a></li>
          </ul>
        </section>

        <div class="footer-link-section">

          <h4>Candidates</h4>

          <ul class="footer-links">
            <li><a href="#">My Dashboard</a></li>
            <li><a href="#">All Jobs</a></li>
            <li><a href="#">Jobs By Category</a></li>
            <li><a href="#">My Saved Jobs</a></li>
          </ul>

        </div>

        <div class="footer-link-section">

          <h4>Employers</h4>

          <ul class="footer-links">
            <li><a href="#">My Dashboard</a></li>
            <li><a href="#">Post A Job</a></li>
            <li><a href="#">Browse Candidates</a></li>
            <li><a href="#">Mailbox</a></li>
          </ul>

        </div>

        <div class="footer-link-section">

          <h4>More</h4>

          <ul class="footer-links">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Our Blog</a></li>
            <li><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>

        </div>
      </div>
      <small>
        <span>&copy; Copyright 2018 | <a href="#">Adam Gray</a></span>
        <span>www.careers4u.jobs</span>
      </small>
    </div>
  </footer> <!-- /footer -->

  <?= $this->Html->script('jquery.min') ?>
  <?= $this->Html->script('main') ?>
</body>
</html>