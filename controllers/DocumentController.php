<?php

namespace app\controllers;
use Yii; 
use app\models\Document;
use app\models\Revisi;
use app\models\givennotes;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Cookie; 

class DocumentController extends \yii\web\Controller
{
	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreateForm()
    {
    	$model = new Document();
    	if ($model->load(Yii::$app->request->post())) {
          	return $this->redirect(['document/create-form-next', 'jenisDoc' => $model->JenisDoc]);
        }

    	return $this->render('formPilih', ['model' => $model]);
    }

    public function actionCreateFormNext($jenisDoc)
    {
    	$model = new Document();
    	if ($model->load(Yii::$app->request->post())) {
    		$this->generateCover($model);
			return $this->redirect(['main/document']);
    	}

    	return $this->render('formCreate', ['jenisDoc' => $jenisDoc, 'model' => $model]);
    }

    public function generateCover($model){
		$fileTemplateWord = \Yii::$app->basePath . '/web/Resources/FormatDokumen/Format'.$model->JenisDoc.'.DOCX';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($fileTemplateWord);
        $templateProcessor->setValue('namaDokumen', $model->namaDoc);
        $templateProcessor->setValue('noDokumen', $model->NoDoc);
        $temp_file_word = tempnam(sys_get_temp_dir(), 'PHPWord');
        $templateProcessor->saveAs($temp_file_word);
        $filename = $model->NoDoc. ".docx";
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($temp_file_word));
  //       $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($templateProcessor, 'Word2007');
		// $objWriter->save($filename.'.docx');
        flush();
        readfile($temp_file_word);
        // Hapus file word dari folder temporary server
        unlink($temp_file_word);
    }


    // untuk menampilkan view document (yg udh approved semua (status = 5))
    public function showalldocument(){
        return $this->redirect(['main/document']);
    }

    public function actionApproved()
    {
        $query = "SELECT *
                        FROM M_Revisi
                        JOIN M_Document ON M_Revisi.IdDoc = M_Document.IdDoc
                        WHERE M_Document.DocumentStatus = '6'";
        $documents = Yii::$app->db->createCommand($query);
        $result = $documents->query();
        return $this->render('Approved', ['documents' => $result]);
    }

    public function actionRevisionNotes($IdDoc){
        $query = "SELECT MAX(NoRev) FROM M_Revisi WHERE IdDoc = '$IdDoc'";
        $noRev = Yii::$app->db->createCommand($query)->queryScalar();
        $model = Revisi::find()->where(['NoRev' => $noRev, 'IdDoc' => $IdDoc])->one();
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['document/approved']);
            //tp malah ke halaman login, udh bs update
        } else {
            return $this->render('revisionForm', ['model' => $model]);
        }
    }

    public function actionViewApproved()
    {
        $query = "SELECT *
                        FROM M_Revisi
                        JOIN M_Document ON M_Revisi.IdDoc = M_Document.IdDoc
                        WHERE M_Document.DocumentStatus = '6'";
        $documents = Yii::$app->db->createCommand($query);
        $result = $documents->query();
        return $this->render('Approved', ['documents' => $result]);
    }

    public function actionDraf()
    {
        $query = "SELECT *
                        FROM M_Revisi
                        JOIN M_Document ON M_Revisi.IdDoc = M_Document.IdDoc
                        WHERE M_Document.DocumentStatus = '1'";
        $documents = Yii::$app->db->createCommand($query);
        $result = $documents->query();
        return $this->render('draf', ['documents' => $result]);
    }

    //udah bs masuk database tp idnotes blm di increment jd msh error, tp udh msk database
    public function actionGivennotes($IdDoc){
        $model = new Givennotes();
        if (($cookie = Yii::$app->request->cookies->get('emailUser')) !== null) {
            $emailUser = $cookie->value;
        } else return $this->redirect('login/index');

        $query = "SELECT M_User.IdUser
                        FROM M_User
                        WHERE M_User.EmailUser = '$emailUser'";
            $iduserr = Yii::$app->db->createCommand($query);
            $iduserresult = $iduserr->queryScalar();

        if ($model->load(Yii::$app->request->post()) && $model->validateNotes('10')) {
            $query = "INSERT INTO M_Givennotes (IdNotes, IdDoc, IdUser, Content)
                      VALUES ('10', $IdDoc, '$iduserresult', '$model->Content')";
            $notes = Yii::$app->db->createCommand($query);
            $result = $notes->query();
        }
        
        //biar dia baru lg
        $model = new Givennotes();
        $query = "SELECT *
                        FROM M_givennotes
                        JOIN M_Document ON M_givennotes.IdDoc = M_Document.IdDoc
                        JOIN M_Revisi ON M_Document.IdDoc = M_Revisi.IdDoc
                        JOIN M_User ON M_givennotes.IdUser = M_User.IdUser
                        WHERE M_givennotes.IdUser = '$iduserresult' AND M_givennotes.IdDoc = $IdDoc";  //BLM DIGANTI PAKE COOKIE
        $notesresult = Yii::$app->db->createCommand($query);
        $result = $notesresult->query();

        return $this->render('givennotes', ['notes' => $model, 'emailUser' => $emailUser, 'givennotes' => $result]);

        // return $this->render('givennotes', ['notes' => $model, 'emailUser' => $emailUser]);
    }
}
