<?php
class SiteController extends Controller
{
	public function actionContact()
	{
		$model=new ContactForm;
			if(isset($_POST['ContactForm']))
			{
				$model->attributes=$_POST['ContactForm'];
				if($model->validate())
				{
					$headers="From: {$model->email}\r\nReply-To: {$model->email}";
					mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
					Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
					$this->refresh();
				}
			}
		$this->render('contact',array('model'=>$model));
	}
}
?>
