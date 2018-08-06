<?= $this->element('header', [
  'header_type' => 'landing-header'
]) ?>

<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>

<?= $this->element('footer') ?>