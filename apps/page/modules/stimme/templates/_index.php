<div style="width: 250px;margin: 0 auto;position: absolute;left: -50px;background-color: #d4d4d4;padding-bottom: 19px;padding-left: 56px;">
    <h1><?php echo LANG_STIMME_H1 ?></h1>
    <?php $firstday = ''; ?>
    <?php foreach (Stimme::dayList() as $day): ?>
        <?php if (Schedule::dayname($day, 1) == 'Niedziela'): ?>
            <?php if ($firstday == ''): ?>
                <?php $firstday = $day; ?>
            <?php endif; ?>
            <?php $dayweek = date("l"); ?>
            <div class="title"><?php echo $day ?> | <?php if ($firstday == $day): ?><?php if ($dayweek == 'Wednesday' || $dayweek == 'Thursday' || $dayweek == 'Friday' || $dayweek == 'Saturday'): ?><?php echo LANG_STIMME_MATERIAL_IN_THE_IMPLEMENTATION ?><?php else: ?><?php echo link_to(LANG_STIMME_ADD_GREETINGS, 'stimme/new?date=' . $day) ?><?php endif; ?><?php else: ?><?php echo link_to(LANG_STIMME_ADD_GREETINGS, 'stimme/new?date=' . $day) ?><?php endif; ?></div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>


