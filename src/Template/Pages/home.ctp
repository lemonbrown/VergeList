<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>

	<?= $this->Html->css('bootstrap.min.css') ?>
	<?= $this->Html->css('template.css') ?>
	<?= $this->Html->script('jquery-2.2.4.min.js') ?>
	<?= $this->Html->script('bootstrap.min.js') ?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>

</head>
<body>

<nav class="navbar navbar-fixed-top" id="Nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">VergeList</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">#Food</a></li>
            <li><a href="#contact">#Fails</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav>
    <div class="container" id="Main">
		<div class='col-lg-4'>
			<div class='row home_heading'>
				<div class='home_header'>
					New
				</div>

			</div>
			<div class='row'>
				<?php 
					foreach($posts as $post):
						echo $this->element('display_post', array('post' => $post));
					endforeach
				?>
			</div>
		</div>
		<div class='col-lg-4'>
			<div class='row home_heading'>
				<div class='home_header'>
					Popular
				</div>
			</div>
			<div class='row'>
				<?php 
					foreach($posts as $post):
						echo $this->element('display_post', array('post' => $post));
					endforeach
				?>
			</div>
		</div>
		<div class='col-lg-4'>
			<div class='row home_heading'>
				<div class='home_header'>
					Trending
				</div>
			</div>
			<div class='row'>
				<?php 
					foreach($posts as $post):
						echo $this->element('display_post_mini', array('post' => $post));
					endforeach
				?>
			</div>
		</div>
	</div>
</div>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  

</body>

</html>
