<?php $this->renderPartial('/message/_navigation') ?>
<?php if ($messagesAdapter->data): ?>
	<table>
		<tr>
			<th>From</th>
			<th>Subject</th>
		</tr>
		<?php foreach ($messagesAdapter->data as $message): ?>
			<tr>
				<td><?php echo $message->sender_id ?></td>
				<td><a href="<?php echo $this->createUrl('view/', array('message_id' => $message->id)) ?>"><?php echo $message->subject ?></a></td>
			</tr>
		<?php endforeach ?>
	</table>
	<?php $this->widget('CLinkPager', array('pages' => $messagesAdapter->getPagination())) ?>
<?php endif; ?>
