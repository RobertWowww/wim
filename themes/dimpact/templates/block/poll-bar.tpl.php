<?php

/**
 * @file
 * Default theme implementation to display the bar for a single choice in a
 * poll.
 *
 * Variables available:
 * - $title: The title of the poll.
 * - $votes: The number of votes for this choice
 * - $total_votes: The number of votes for this choice
 * - $percentage: The percentage of votes for this choice.
 * - $vote: The choice number of the current user's vote.
 * - $voted: Set to TRUE if the user voted for this choice.
 *
 * @see template_preprocess_poll_bar()
 */

 // Original pol bar template uses inline style which is against WCAG2.0. This one uses
 // bare percentages and then a javascript makes pretty bars.
 // Progressive enhancement.
?>

<div class="text"><?php print $title; ?></div>
<div class="bar">
  <div class="foreground" data-percentage="<?php print $percentage; ?>"></div>
</div>
<div class="percent">
  <?php print $percentage; ?>% (<?php print format_plural($votes, '1 vote', '@count votes'); ?>)
</div>