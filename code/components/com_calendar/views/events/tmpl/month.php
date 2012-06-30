<div class="component-header">
	<?= @template('default_scopebar', array('date' => $state->date)) ?>
</div>

<? $firstdate = date('Ym', strtotime($state->date)).'01' ?> 
<? $lastdate = date('Ymt', strtotime($state->date)) ?>

<? $firstweek = date('W', strtotime($firstdate)) ?> 
<? $lastweek = date('W', strtotime($lastdate)) ?>

<? $firstday = date('N', strtotime($firstdate)) ?> 
<? $lastday = date('N', strtotime($lastdate)) ?>

<? $weeks = $lastweek - $firstweek ?>

<? //@service('lib.koowa.date', array('date' => $state->date))->getDaysInMonth() ?>

<? 
function getDaysInWeek ($weekNumber, $year) {
  // Count from '0104' because January 4th is always in week 1
  // (according to ISO 8601).
  $time = strtotime($year . '0104 +' . ($weekNumber - 1)
                    . ' weeks');
  // Get the time of the first day of the week
  $mondayTime = strtotime('-' . (date('w', $time) - 1) . ' days',
                          $time);
  // Get the times of days 0 -> 6
  $dayTimes = array ();
  for ($i = 0; $i < 7; ++$i) {
    $dayTimes[] = strtotime('+' . $i . ' days', $mondayTime);
  }
  // Return timestamps for mon-sun.
  return $dayTimes;
}

 ?>
<div class="calendar-month" style="padding: 20px;"> 
	<table class="table">
		<thead>
		<tr>
			<th style="width: 14.28%;"><?= @text('Mon') ?></th>
			<th style="width: 14.28%;"><?= @text('Tue') ?></th>
			<th style="width: 14.28%;"><?= @text('Wed') ?></th>
			<th style="width: 14.28%;"><?= @text('Thu') ?></th>
			<th style="width: 14.28%;"><?= @text('Fri') ?></th>
			<th style="width: 14.28%;"><?= @text('Sat') ?></th>
			<th style="width: 14.28%;"><?= @text('Sun') ?></th>
		</tr>
		</thead>
	</table>
	 
	<? $week = $firstweek ?>
	<? while($week <= $lastweek) : ?>
	<? $y = '1' ?>
	
	<div class="row-fluid">
		<table class="table">
			<tr>
				<? $dayTimes = getDaysInWeek($week, 2012); ?>
				<? $lastDayOfWeek = strftime('%d', end($dayTimes)); ?>
				<? $firstDayOfWeek = strftime('%d', $dayTimes[0]); ?>
				<? foreach ($dayTimes as $dayTime) : ?>
					<? $y++ ?>
					<td style="width: 14.28%;" <?= strftime('%Y%m%d', $dayTime) == $today ? 'class="today"' : ''; ?>>
					
						<div class="calendar-day"><?= strftime('%d', $dayTime); ?></div>
						
						<? foreach($days->find(array('day' => strftime('%d', $dayTime))) as $event) : ?>
							<? $class = date('d', strtotime($event->end_date)) == strftime('%d', $dayTime) ? ' last' : '' ?>
							<? $class .= date('d', strtotime($event->start_date)) == strftime('%d', $dayTime) ? ' first' : '' ?>
							
							<? if(date('d', strtotime($event->start_date)) == strftime('%d', $dayTime) OR strftime('%d', $dayTime) == $firstDayOfWeek) : ?>
							<div class="calendar-event<?= $class ?>">
								<a href="<?= @route('view=event&id='.$event->calendar_event_id) ?>"><?= $event->title ?></a>
							</div>
							<? else : ?>
							<div class="calendar-event<?= $class ?>"></div>
							<? endif; ?>
						<? endforeach; ?>
					</td>
				<? endforeach; ?>
			</tr>
		</table>
	</div>
	<? $week++ ?>
	<? endwhile; ?>
</div>

<module title="" position="scopebar">
	<?= @template('default_scopebar') ?>
</module>

<? if($agent) : ?>
<module title="<?= @text('') ?>" position="sidebar">
	<div class="articles-toolbar">
	    <a style="width: 90%;" class="btn btn-primary btn-small" href="<?= @route('view=event&layout=form') ?>">
	        <i class="icon-plus icon-white"></i> <?= @text('New') ?>
	    </a>
	</div>
</module>
<? endif ?>