<?php

class DeleteController extends Controller {

	public $defaultAction = 'delete';

	public function actionDelete() {
		$messagesData = Yii::app()->request->getParam('Message');
		$counter = 0;
		foreach ($messagesData as $messageData) {
		    if (isset($messageData['selected'])) {
				$message = Message::model()->findByPk($messageData['id']);
				if ($message->deleteByUser(Yii::app()->user->getId())) {
				    $counter++;
				}
		    }
		}
		if ($counter) {
		    Yii::app()->user->setFlash('messageModule', MessageModule::t('{count} message'.($counter > 1 ? 's' : '').' has been deleted', array('{count}' => $counter)));
		}
		$this->redirect(Yii::app()->request->getUrlReferrer());
	}
}
