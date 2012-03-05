<h2>Function Reference [<a href="#" class="func_close">+</a>/<a href="#" class="func_open">-</a>]</h2>

<?php 

$class_name = $class->name;


foreach($class->methods() as $method => $method_obj) :
	$comment = $method_obj->comment;
	$parameters = $method_obj->params();
	$example = $comment->example();
	$description = $comment->description(array('periods', 'one_line', 'markdown'));
	$comment_params = $comment->tags('param');
	$comment_return = $comment->tags('return');
	$ci_obj_name = (substr(strtolower($class_name), 0, 4) == 'fuel') ? 'fuel->'.substr(strtolower($class_name), 5) : strtolower($class_name);
?>	
<?=user_guide_block('function', array('function' => $method_obj, 'prefix' => '$this->'.$ci_obj_name.'->')) ?>
<div class="func">
<?=$description?>

<?=user_guide_block('return', array('return' => $comment_return)) ?>

<?=user_guide_block('params', array('params' => $comment_params)) ?>

<?=user_guide_block('example', array('example' => $example)) ?>
</div>
<?php endforeach; ?>