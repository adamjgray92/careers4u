<?= $this->element('header', [
  'header_type' => 'page-header'
]) ?>

<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>

<?= $this->element('footer') ?>