<div style="width: 200px;height: 200px;position: absolute;left: 0px;">
<h1><?php echo LANG_STIMME_H1 ?></h1>
<?php $firstday = ''; ?>
<?php foreach (Stimme::dayList() as $day): ?>
	<?php if(Schedule::dayname($day, 1) == 'Niedziela'): ?>
		<?php if($firstday == ''): ?>
			<?php $firstday = $day; ?>
		<?php endif; ?>
		<?php $dayweek = date("l"); ?>
		<div class="title"><?php echo $day ?> | <?php if($firstday == $day): ?><?php if($dayweek == 'Wednesday' || $dayweek == 'Thursday' || $dayweek == 'Friday' || $dayweek == 'Saturday'): ?><?php echo LANG_STIMME_MATERIAL_IN_THE_IMPLEMENTATION ?><?php else: ?><?php echo link_to(LANG_STIMME_ADD_GREETINGS, 'stimme/new?date='.$day) ?><?php endif; ?><?php else: ?><?php echo link_to(LANG_STIMME_ADD_GREETINGS, 'stimme/new?date='.$day) ?><?php endif; ?></div>
	<?php endif; ?>
<?php endforeach;?>
</div>

