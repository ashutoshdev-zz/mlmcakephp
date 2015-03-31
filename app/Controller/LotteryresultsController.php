<?php

App::uses('AppController', 'Controller');

/**
 * Lotteryresults Controller
 *
 * @property Lotteryresult $Lotteryresult
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LotteryresultsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('auth','playdateset','playupdatedate','brackage');
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
    private $_netellerClientID = 'AAABS8jUecHq7ucf';
    private $_netellerClientSecret = '0.jtRATLqEK8J8d9fiRt5Mtzh_hvuPIBRLjkBXIpFAuLg.TWQKe6EynxKcbfhoWTT91AWHR-Y';

    private function _netellerAccess($url = "https://test.api.neteller.com/v1/oauth2/token?grant_type=client_credentials", $data = array("scope" => "default"), $headers = array()) {
        $curl = curl_init();
        $headers = array_merge(array("Content-Type:application/json", "Cache-Control:no-cache"), $headers);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERPWD, $this->_netellerClientID . ":" . $this->_netellerClientSecret);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $serverOutput = curl_exec($curl);
        return json_decode($serverOutput, true);
    }

    /**
     * index method
     *
     * @return void
     */
    public $flag = false;

    public function index() {
        $this->lotteryno();
        require '../Vendor/Ganon/ganon.php';
        // Usmega million (pb)
        $document = file_get_dom('https://www.thelotter.com/lottery-results/usa-megamillions');
        foreach ($document('option') as $option) {
            $optval['val'] = $option->getAttribute('value');
        }
        foreach ($document('select') as $option) {
            $optval['txt'] = $option->getPlainText();
        }
        $a = file_get_dom('https://www.thelotter.com/lottery-results/usa-megamillions/?DrawNumber=' . $optval["val"]);

        foreach ($a('span[class="results-ball-regular results-ball icon"]') as $element) {
            $data[] = $element->getPlainText();
        }

        foreach ($a('span[class="results-ball-additional results-ball icon"]') as $element) {
            $datapb[] = $element->getPlainText();
        }
        // EuroMillions (pb)

        $document_euro = file_get_dom('https://www.thelotter.com/lottery-results/euromillions-my-million');
        foreach ($document_euro('option') as $option_euro) {
            $optval_euro['val'] = $option_euro->getAttribute('value');
        }
        foreach ($document_euro('select') as $option_euro) {
            $optval_euro['txt'] = $option_euro->getPlainText();
        }
        $a_euro = file_get_dom('https://www.thelotter.com/lottery-results/euromillions-my-million/?DrawNumber=' . $optval_euro["val"]);

        foreach ($a_euro('span[class="results-ball-regular results-ball icon"]') as $element_euro) {
            $data_eoru[] = $element_euro->getPlainText();
        }

        foreach ($a_euro('span[class="results-ball-additional results-ball icon"]') as $element_euro) {
            $datapb_eoru[] = $element_euro->getPlainText();
        }

        //U.S powerball 
        $document_uspb = file_get_dom('https://www.thelotter.com/lottery-results/usa-powerball');
        foreach ($document_uspb('option') as $option_uspb) {
            $optval_euro['val'] = $option_uspb->getAttribute('value');
        }
        foreach ($document_uspb('select') as $option_uspb) {
            $optval_uspb['txt'] = $option_uspb->getPlainText();
        }
        $a_uspb = file_get_dom('https://www.thelotter.com/lottery-results/usa-powerball/?DrawNumber=' . $optval_euro["val"]);

        foreach ($a_uspb('span[class="results-ball-regular results-ball icon"]') as $element_uspb) {
            $data_uspb[] = $element_uspb->getPlainText();
        }

        foreach ($a_uspb('span[class="results-ball-additional results-ball icon"]') as $element_uspb) {
            $datapb_uspb[] = $element_uspb->getPlainText();
        }



        // Usmega million (pb)
        $this->set('optdata', $optval);
        $this->set('usball', $data);
        $this->set('uspball', $datapb);
        // EuroMillions (pb)
        $this->set('val_euro', $optval_euro);
        $this->set('data_eoro', $data_eoru);
        $this->set('datapb_euro', $datapb_eoru);
        // U.S Powerball (pb)
        $this->set('val_uspb', $optval_uspb);
        $this->set('data_uspb', $data_uspb);
        $this->set('datapb_uspb', $datapb_uspb);
    }

    /**
     * 
     */
    public function lotteryno() {
        $this->loadModel('Lottery');
        $id = $this->Auth->user('id');
        if ($id) {

            $lottery_data = $this->Lottery->find('first', array('conditions' => array('Lottery.user_id' => $id)));
            $this->set('lotterydata', $lottery_data);
        } else {
            $this->redirect("/users/login");
        }
    }

    /**
     * page
     */
    public function result_megamillion() {
        $uer_id = $this->Auth->user('id');
        require '../Vendor/Ganon/ganon.php';
        $document = file_get_dom('https://www.thelotter.com/lottery-results/usa-megamillions');
        foreach ($document('option') as $option) {
            $optval['val'] = $option->getAttribute('value');
        }
        foreach ($document('select') as $option) {
            $optval['txt'] = $option->getPlainText();
        }
        $a = file_get_dom('https://www.thelotter.com/lottery-results/usa-megamillions/?DrawNumber=' . $optval["val"]);
        foreach ($a('span[class="results-ball-regular results-ball icon"]') as $element) {
            $data[] = $element->getPlainText();
        }
        foreach ($a('span[class="results-ball-additional results-ball icon"]') as $element) {
            $datapb[] = $element->getPlainText();
        }
        foreach ($a('div[class="multiplyBallText"]') as $element) {
            $mul[] = $element->getPlainText();
        }

        $str = $a('body')[0]->html();
        $re = "/data\\s:\\s\\[(.|[\\r\\n])*?\\]/";
        preg_match($re, $str, $matches);
        $d1 = ltrim($matches[0], "data : ");
        $jsond = json_decode(str_replace("'", '"', addcslashes($d1, '"')));
        $this->loadModel('Finalwinner');
        $data_fw = $this->Finalwinner->find('first', array('conditions' => array('AND' => array('Finalwinner.uid' => $uer_id, 'Finalwinner.drawref' => $optval['val']))));
        if ($data_fw) {
            $d['win_data'] = $data_fw;
        } else {
            $d['win_data'] = "No Winner";
        }
        $this->set('win_data', $d);
        $this->set('jsondata', $jsond);
        $this->set('dataus', $data);
        $this->set('datauspb', $datapb);
        $this->set('optval', $optval);
        $this->set('multiple', $mul);
        $this->lotteryno();
    }

    /**
     * 
     */
    public function result_euromillion() {
        $uer_id = $this->Auth->user('id');
        require '../Vendor/Ganon/ganon.php';
        $document = file_get_dom('https://www.thelotter.com/lottery-results/euromillions-my-million');
        foreach ($document('option') as $option) {
            $optval['val'] = $option->getAttribute('value');
        }
        foreach ($document('select') as $option) {
            $optval['txt'] = $option->getPlainText();
        }
        $a = file_get_dom('https://www.thelotter.com/lottery-results/euromillions-my-million/?DrawNumber=' . $optval["val"]);
        foreach ($a('span[class="results-ball-regular results-ball icon"]') as $element) {
            $data[] = $element->getPlainText();
        }
        foreach ($a('span[class="results-ball-additional results-ball icon"]') as $element) {
            $datapb[] = $element->getPlainText();
        }
//        foreach ($a('div[class="multiplyBallText"]') as $element) {
//            $mul[] = $element->getPlainText();
//        }

        $str = $a('body')[0]->html();
        $re = "/data\\s:\\s\\[(.|[\\r\\n])*?\\]/";
        preg_match($re, $str, $matches);
        $d1 = ltrim($matches[0], "data : ");
        $jsond = json_decode(str_replace("'", '"', addcslashes($d1, '"')));

        $this->loadModel('Eurofinalwinner');

        $data_fw = $this->Eurofinalwinner->find('first', array('conditions' => array('AND' => array('Eurofinalwinner.uid' => $uer_id, 'Eurofinalwinner.drawref' => $optval['val']))));

        if ($data_fw) {
            $d['win_data'] = $data_fw;
        } else {
            $d['win_data'] = "No Winner";
        }

        $this->set('win_data', $d);
        $this->set('jsondata', $jsond);
        $this->set('dataus', $data);
        $this->set('datauspb', $datapb);
        $this->set('optval', $optval);
        // $this->set('multiple', $mul);
        $this->lotteryno();
    }

    /**
     * 
     */
    public function result_uspb() {
        $uer_id = $this->Auth->user('id');
        require '../Vendor/Ganon/ganon.php';
        $document = file_get_dom('https://www.thelotter.com/lottery-results/usa-powerball');
        foreach ($document('option') as $option) {
            $optval['val'] = $option->getAttribute('value');
        }
        foreach ($document('select') as $option) {
            $optval['txt'] = $option->getPlainText();
        }
        $a = file_get_dom('https://www.thelotter.com/lottery-results/usa-powerball/?DrawNumber=' . $optval["val"]);
        foreach ($a('span[class="results-ball-regular results-ball icon"]') as $element) {
            $data[] = $element->getPlainText();
        }
        foreach ($a('span[class="results-ball-additional results-ball icon"]') as $element) {
            $datapb[] = $element->getPlainText();
        }
//        foreach ($a('div[class="multiplyBallText"]') as $element) {
//            $mul[] = $element->getPlainText();
//        }

        $str = $a('body')[0]->html();
        $re = "/data\\s:\\s\\[(.|[\\r\\n])*?\\]/";
        preg_match($re, $str, $matches);
        $d1 = ltrim($matches[0], "data : ");
        $jsond = json_decode(str_replace("'", '"', addcslashes($d1, '"')));
        $this->loadModel('Pbfinalwinner');
        $data_fw = $this->Pbfinalwinner->find('first', array('conditions' => array('AND' => array('Pbfinalwinner.uid' => $uer_id, 'Pbfinalwinner.drawref' => $optval['val']))));

        if ($data_fw) {
            $d['win_data'] = $data_fw;
        } else {
            $d['win_data'] = "No Winner";
        }
        $this->set('win_data', $d);
        $this->set('jsondata', $jsond);
        $this->set('dataus', $data);
        $this->set('datauspb', $datapb);
        $this->set('optval', $optval);
        // $this->set('multiple', $mul);
        $this->lotteryno();
    }

    /**
     * cron job for u s megamillion   result like 5+pb crone job
     */
    public function winner_megaplier() {

        //$this->lotteryno();
        require '../Vendor/Ganon/ganon.php';
        $document = file_get_dom('https://www.thelotter.com/lottery-results/usa-megamillions');
        foreach ($document('option') as $option) {
            $optval['val'] = $option->getAttribute('value');
        }
        foreach ($document('select') as $option) {
            $optval['txt'] = $option->getPlainText();
        }
        $a = file_get_dom('https://www.thelotter.com/lottery-results/usa-megamillions/?DrawNumber=' . $optval["val"]);

        foreach ($a('span[class="results-ball-regular results-ball icon"]') as $element) {
            $data[] = $element->getPlainText();
        }

        foreach ($a('span[class="results-ball-additional results-ball icon"]') as $element) {
            $datapb[] = $element->getPlainText();
        }

        $this->loadModel('Lotteryresult');
        $this->Lotteryresult->data['Lotteryresult']['usmegamellion'] = serialize($data);
        $this->Lotteryresult->data['Lotteryresult']['megapowerball'] = serialize($datapb);
        $this->Lotteryresult->data['Lotteryresult']['ltryday'] = mysql_escape_string($optval['txt']);
        $this->Lotteryresult->data['Lotteryresult']['ltryval'] = $optval['val'];
        $val_data = $this->Lotteryresult->find('count', array('conditions' => array('Lotteryresult.ltryval' => $optval['val'])));

        if ($val_data == 0) {

            $this->Lotteryresult->save($this->Lotteryresult->data);
        }
        $this->loadModel('Lottery');
        $datas = $this->Lottery->find('all', array('conditions' => array('AND' => array('Lottery.active' => 1, 'Lottery.status' => 1))));


        if ($datas) {

            foreach ($datas as $d) {
                $usm = unserialize($d['Lottery']['usmegamellion']);
                $usp = unserialize($d['Lottery']['usmegapowerball']);
                $usid = $d['Lottery']['user_id'];

                $ak_cnt = count($usm);
                if ($ak_cnt > 1) {
                    $usm_data = $usm;
                } else {
                    $usm_data = explode(',', $usm[0]);
                }
                $cnt = count($usm_data);
                $count = 0;
                for ($i = 0; $i < $cnt; $i++) {

                    if ($usm_data[$i] == $data[$i]) {
                        $count++;
                    }
                }
                $count;
                if ($usp[0] == $datapb[0]) {
                    $var = "PB";
                    $f_data = $count . "+" . $var;
                } else {
                    $f_data = $count;
                }


                $this->loadModel('Winnerlist');
                $this->Winnerlist->data['Winnerlist']['uid'] = $usid;
                $this->Winnerlist->data['Winnerlist']['resdata'] = $f_data;
                $this->Winnerlist->data['Winnerlist']['ltryval'] = $optval['val'];
                $winoptval = $optval['val'];
                $win_data = $this->Winnerlist->find('count', array('conditions' => array('AND' => array('Winnerlist.ltryval' => $optval['val'], 'Winnerlist.uid' => $usid))));

                if ($win_data == 0) {

                    $qry = "INSERT INTO winnerlists(uid,resdata,ltryval,created) VALUES('$usid','$f_data','$winoptval',NOW())";
                    $this->Winnerlist->query($qry);
                }
            }
        } else {
            
        }
        exit;
    }

    /**
     * cron job for euro megamillion   result like 5+pb crone job
     */
    public function winner_megaplier_euro() {

        //$this->lotteryno();
        require '../Vendor/Ganon/ganon.php';
        $document = file_get_dom('https://www.thelotter.com/lottery-results/euromillions-my-million');
        foreach ($document('option') as $option) {
            $optval['val'] = $option->getAttribute('value');
        }
        foreach ($document('select') as $option) {
            $optval['txt'] = $option->getPlainText();
        }
        $a = file_get_dom('https://www.thelotter.com/lottery-results/euromillions-my-million/?DrawNumber=' . $optval["val"]);

        foreach ($a('span[class="results-ball-regular results-ball icon"]') as $element) {
            $data[] = $element->getPlainText();
        }

        foreach ($a('span[class="results-ball-additional results-ball icon"]') as $element) {
            $datapb[] = $element->getPlainText();
        }

        $this->loadModel('Eurolotteryresult');
        $this->Eurolotteryresult->data['Eurolotteryresult']['usmegamellion'] = serialize($data);
        $this->Eurolotteryresult->data['Eurolotteryresult']['megapowerball'] = serialize($datapb);
        $this->Eurolotteryresult->data['Eurolotteryresult']['ltryday'] = mysql_escape_string($optval['txt']);
        $this->Eurolotteryresult->data['Eurolotteryresult']['ltryval'] = $optval['val'];
        $val_data = $this->Eurolotteryresult->find('count', array('conditions' => array('Eurolotteryresult.ltryval' => $optval['val'])));

        if ($val_data == 0) {

            $this->Eurolotteryresult->save($this->Eurolotteryresult->data);
        }
        $this->loadModel('Lottery');
        $datas = $this->Lottery->find('all', array('conditions' => array('AND' => array('Lottery.active' => 1, 'Lottery.status' => 1))));


        if ($datas) {

            foreach ($datas as $d) {
                $usm = unserialize($d['Lottery']['euromillion']);
                $usp = unserialize($d['Lottery']['europb']);
                $usid = $d['Lottery']['user_id'];

                $ak_cnt = count($usm);
                if ($ak_cnt > 1) {
                    $usm_data = $usm;
                } else {
                    $usm_data = explode(',', $usm[0]);
                }

                $cnt = count($usm_data);
                $count = 0;
                for ($i = 0; $i < $cnt; $i++) {

                    if ($usm_data[$i] == $data[$i]) {
                        $count++;
                    }
                }



                $ak_cnt_pb = count($usp);
                if ($ak_cnt_pb > 1) {
                    $usm_data_pb = $usp;
                } else {
                    $usm_data_pb = explode(',', $usp[0]);
                }


                $cntpb = count($usm_data_pb);

                $cntpb_no = 0;
                for ($i = 0; $i < $cntpb; $i++) {

                    if ($usm_data_pb[$i] == $datapb[$i]) {
                        $cntpb_no++;
                    }
                }
                if ($cntpb_no == 0) {
                    $f_data = $count;
                } else if ($cntpb_no == 1) {
                    $f_data = $count . "+PB";
                } else {
                    $f_data = $count . "+" . $cntpb_no . "PB";
                }


                $this->loadModel('Eurowinnerlist');
                $this->Eurowinnerlist->data['Eurowinnerlist']['uid'] = $usid;
                $this->Eurowinnerlist->data['Eurowinnerlist']['resdata'] = $f_data;
                $this->Eurowinnerlist->data['Eurowinnerlist']['ltryval'] = $optval['val'];
                $winoptval = $optval['val'];
                $win_data = $this->Eurowinnerlist->find('count', array('conditions' => array('AND' => array('Eurowinnerlist.ltryval' => $optval['val'], 'Eurowinnerlist.uid' => $usid))));

                if ($win_data == 0) {

                    $qry = "INSERT INTO eurowinnerlists(uid,resdata,ltryval,created) VALUES('$usid','$f_data','$winoptval',NOW())";
                    $this->Eurowinnerlist->query($qry);
                }
            }
        } else {
            
        }
        exit;
    }

    /**
     * cron job for powerball   result like 5+pb crone job
     */
    public function winner_megaplier_pb() {

        //$this->lotteryno();
        require '../Vendor/Ganon/ganon.php';
        $document = file_get_dom('https://www.thelotter.com/lottery-results/usa-powerball');
        foreach ($document('option') as $option) {
            $optval['val'] = $option->getAttribute('value');
        }
        foreach ($document('select') as $option) {
            $optval['txt'] = $option->getPlainText();
        }
        $a = file_get_dom('https://www.thelotter.com/lottery-results/usa-powerball/?DrawNumber=' . $optval["val"]);

        foreach ($a('span[class="results-ball-regular results-ball icon"]') as $element) {
            $data[] = $element->getPlainText();
        }

        foreach ($a('span[class="results-ball-additional results-ball icon"]') as $element) {
            $datapb[] = $element->getPlainText();
        }

        $this->loadModel('Pblotteryresult');
        $this->Pblotteryresult->data['Pblotteryresult']['usmegamellion'] = serialize($data);
        $this->Pblotteryresult->data['Pblotteryresult']['megapowerball'] = serialize($datapb);
        $this->Pblotteryresult->data['Pblotteryresult']['ltryday'] = mysql_escape_string($optval['txt']);
        $this->Pblotteryresult->data['Pblotteryresult']['ltryval'] = $optval['val'];
        $val_data = $this->Pblotteryresult->find('count', array('conditions' => array('Pblotteryresult.ltryval' => $optval['val'])));

        if ($val_data == 0) {

            $this->Pblotteryresult->save($this->Pblotteryresult->data);
        }
        $this->loadModel('Lottery');
        $datas = $this->Lottery->find('all', array('conditions' => array('AND' => array('Lottery.active' => 1, 'Lottery.status' => 1))));


        if ($datas) {

            foreach ($datas as $d) {
                $usm = unserialize($d['Lottery']['uspb']);
                $usp = unserialize($d['Lottery']['pb']);
                $usid = $d['Lottery']['user_id'];

                $ak_cnt = count($usm);
                if ($ak_cnt > 1) {
                    $usm_data = $usm;
                } else {
                    $usm_data = explode(',', $usm[0]);
                }
                $cnt = count($usm_data);
                $count = 0;
                for ($i = 0; $i < $cnt; $i++) {

                    if ($usm_data[$i] == $data[$i]) {
                        $count++;
                    }
                }
                $count;
                if ($usp[0] == $datapb[0]) {
                    $var = "PB";
                    $f_data = $count . "+" . $var;
                } else {
                    $f_data = $count;
                }


                $this->loadModel('Pbwinnerlist');
                $this->Pbwinnerlist->data['Pbwinnerlist']['uid'] = $usid;
                $this->Pbwinnerlist->data['Pbwinnerlist']['resdata'] = $f_data;
                $this->Pbwinnerlist->data['Pbwinnerlist']['ltryval'] = $optval['val'];
                $winoptval = $optval['val'];
                $win_data = $this->Pbwinnerlist->find('count', array('conditions' => array('AND' => array('Pbwinnerlist.ltryval' => $optval['val'], 'Pbwinnerlist.uid' => $usid))));

                if ($win_data == 0) {

                    $qry = "INSERT INTO pbwinnerlists(uid,resdata,ltryval,created) VALUES('$usid','$f_data','$winoptval',NOW())";
                    $this->Pbwinnerlist->query($qry);
                }
            }
        } else {
            
        }
        exit;
    }

    /**
     * 
     * cron job for result declear for usmegamillion
     */
    public function result_declear() {

        //$this->lotteryno();
        require '../Vendor/Ganon/ganon.php';
        $document = file_get_dom('https://www.thelotter.com/lottery-results/usa-megamillions');
        foreach ($document('option') as $option) {
            $optval['val'] = $option->getAttribute('value');
        }
        $a = file_get_dom('https://www.thelotter.com/lottery-results/usa-megamillions/?DrawNumber=' . $optval["val"]);
        $str = $a('body')[0]->html();
        $re = "/data\\s:\\s\\[(.|[\\r\\n])*?\\]/";
        preg_match($re, $str, $matches);
        $d1 = ltrim($matches[0], "data : ");
        $jsond = json_decode(str_replace("'", '"', addcslashes($d1, '"')));
        $this->loadModel('Grabresultlist');
        $this->Grabresultlist->data['Grabresultlist']['result'] = serialize($jsond);
        $this->Grabresultlist->data['Grabresultlist']['drawref'] = $optval['val'];
        $val_data = $this->Grabresultlist->find('count', array('conditions' => array('Grabresultlist.drawref' => $optval['val'])));

        if ($val_data == 0) {

            $this->Grabresultlist->save($this->Grabresultlist->data);
        }
        $this->loadModel('Winnerlist');
        $data = $this->Winnerlist->find('all', array('conditions' => array('Winnerlist.ltryval' => $optval['val'])));
        $json_data = $this->Grabresultlist->find('all', array('conditions' => array('Grabresultlist.drawref' => $optval['val'])));
        $re_j_data = unserialize($json_data[0]['Grabresultlist']['result']);

        if ($data) {

            foreach ($data as $d) {
                foreach ($re_j_data as $jd) {
                    $var_res_data = '<div class="divPaddingFormatter">' . $d["Winnerlist"]["resdata"] . '</div>';


                    if ($var_res_data == $jd->GuessCountToDisplay) {
                        //winner
                        $win = $jd->LocalWinningAmountToDisplay;
                        $usid = $d['Winnerlist']['uid'];

                        //mega winner
                        $mwin = $jd->LocalWinningAmountMultiplyToDisplay;
                        $draref = $optval['val'];
                        $this->loadModel('Finalwinner');

                        $chk_d = $this->Finalwinner->find('count', array('conditions' => array('AND' => array('Finalwinner.drawref' => $optval['val'], 'Finalwinner.uid' => $usid))));

                        if ($chk_d == 0) {
                            $this->loadModel('User');
                            $userdata = $this->User->find('first', array('conditions' => array('User.id' => $usid), 'recursive' => -1, 'fields' => array('User.email')));


                            preg_match_all("|<[^>]+>(.*)</[^>]+>|U", $win, $out, PREG_PATTERN_ORDER);
                            $data_doller = ltrim($out[1][0], '$');

                            $data_doller = str_replace(',', '', $data_doller);

                            $this->loadModel('Wallet');
                            $this->loadModel('Commision');
                            $this->loadModel('Win');


                            $parent = $this->User->getPath($usid);
                            $commision_user = array_reverse($parent);

                            $fifty_per = $data_doller * 50 / 100;
                            $ten_per = $data_doller * 10 / 100;
                            $five_per = $data_doller * 5 / 100;
                            $qry = "INSERT INTO finalwinners(uid,win,mwin,drawref,mybal,created) VALUES('$usid','$data_doller','$mwin','$draref','$fifty_per',NOW())";
                            $this->Finalwinner->query($qry);

                            for ($i = 0; $i <= 6; $i++) {

                                $chldid = $commision_user[0]['User']['id'];

                                if ($i == 0 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1) {




                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    $commision_data = "INSERT INTO wins(user_id,child_user_id,amt,created) VALUES('$comm_id','$chldid','$fifty_per',NOW())";
                                    $this->Win->query($commision_data);
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$fifty_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have won the lottery !Please log in to see the result</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $fifty_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Instant Winner')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $fifty_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have won the lottery !Please log in to see the result</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $fifty_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Instant Winner')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 1 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1) {



                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,commisions,created) VALUES('$comm_id','$chldid','$ten_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$ten_per')";
                                        $this->Wallet->query($wqry);
                                         $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $ten_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                         $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 2 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1) {



                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,commisions,created) VALUES('$comm_id','$chldid','$ten_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$ten_per')";
                                        $this->Wallet->query($wqry);
                                         $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $ten_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                         $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 3 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1) {


                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,commisions,created) VALUES('$comm_id','$chldid','$ten_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$ten_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $ten_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 4 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1) {


                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,commisions,created) VALUES('$comm_id','$chldid','$ten_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$ten_per')";
                                        $this->Wallet->query($wqry);
                                         $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $ten_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                         $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 5 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1) {

                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,commisions,created) VALUES('$comm_id','$chldid','$five_per',NOW())";
                                    $this->Commision->query($commision_data);

                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$five_per')";
                                        $this->Wallet->query($wqry);
                                         $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $five_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $five_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $five_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 6 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1) {


                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,commisions,created) VALUES('$comm_id','$chldid','$five_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$five_per')";
                                        $this->Wallet->query($wqry);
                                       $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $five_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $five_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $five_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        exit;
    }

    /**
     * cron job for result declear for eoro million
     */
    public function result_declear_euro() {


        //$this->lotteryno();
        require '../Vendor/Ganon/ganon.php';
        $document = file_get_dom('https://www.thelotter.com/lottery-results/euromillions-my-million');
        foreach ($document('option') as $option) {
            $optval['val'] = $option->getAttribute('value');
        }
        $a = file_get_dom('https://www.thelotter.com/lottery-results/euromillions-my-million/?DrawNumber=' . $optval["val"]);
        $str = $a('body')[0]->html();
        $re = "/data\\s:\\s\\[(.|[\\r\\n])*?\\]/";
        preg_match($re, $str, $matches);
        $d1 = ltrim($matches[0], "data : ");
        $jsond = json_decode(str_replace("'", '"', addcslashes($d1, '"')));

        $this->loadModel('Eurograbresultlist');
        $this->Eurograbresultlist->data['Eurograbresultlist']['result'] = serialize($jsond);
        $this->Eurograbresultlist->data['Eurograbresultlist']['drawref'] = $optval['val'];
        $val_data = $this->Eurograbresultlist->find('count', array('conditions' => array('Eurograbresultlist.drawref' => $optval['val'])));

        if ($val_data == 0) {

            $this->Eurograbresultlist->save($this->Eurograbresultlist->data);
        }
        $this->loadModel('Eurowinnerlist');
        $data = $this->Eurowinnerlist->find('all', array('conditions' => array('Eurowinnerlist.ltryval' => $optval['val'])));
        $json_data = $this->Eurograbresultlist->find('all', array('conditions' => array('Eurograbresultlist.drawref' => $optval['val'])));
        $re_j_data = unserialize($json_data[0]['Eurograbresultlist']['result']);

        if ($data) {

            foreach ($data as $d) {
                foreach ($re_j_data as $jd) {
                    $var_res_data = '<div class="divPaddingFormatter">' . $d["Eurowinnerlist"]["resdata"] . '</div>';


                    if ($var_res_data == $jd->GuessCountToDisplay) {
                        //winner
                        $win = $jd->LocalWinningAmountToDisplay;
                        $usid = $d['Eurowinnerlist']['uid'];

                        //mega winner
                        $mwin = $jd->LocalWinningAmountMultiplyToDisplay;
                        $draref = $optval['val'];
                        $this->loadModel('Eurofinalwinner');

                        $chk_d = $this->Eurofinalwinner->find('count', array('conditions' => array('AND' => array('Eurofinalwinner.drawref' => $optval['val'], 'Eurofinalwinner.uid' => $usid))));

                        if ($chk_d == 0) {
                            $this->loadModel('User');
                            $userdata = $this->User->find('first', array('conditions' => array('User.id' => $usid), 'recursive' => -1, 'fields' => array('User.email')));


                            preg_match_all("|<[^>]+>(.*)</[^>]+>|U", $win, $out, PREG_PATTERN_ORDER);
                            $data_doller = ltrim($out[1][0], '€');

                            $data_doller = str_replace(',', '', $data_doller);
                            //$data_doller=  $this->currency($from_Currency='EUR',$to_Currency='USD', $amount=$data_doller);

                            $this->loadModel('Wallet');
                            $this->loadModel('Commision');
                            $this->loadModel('Win');

                            $parent = $this->User->getPath($usid);
                            $commision_user = array_reverse($parent);

                            $fifty_per = $data_doller * 50 / 100;
                            $ten_per = $data_doller * 10 / 100;
                            $five_per = $data_doller * 5 / 100;


                            $qry = "INSERT INTO eurofinalwinners(uid,win,mwin,drawref,mybal,created) VALUES('$usid','$data_doller','$mwin','$draref','$fifty_per',NOW())";
                            $this->Eurofinalwinner->query($qry);

                            for ($i = 0; $i <= 6; $i++) {

                                $chldid = $commision_user[0]['User']['id'];

                                if ($i == 0 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1) {

                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    $commision_data = "INSERT INTO wins(user_id,child_user_id,euroamt,created) VALUES('$comm_id','$chldid','$fifty_per',NOW())";
                                    $this->Win->query($commision_data);
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,euroammount) VALUES('$comm_id','$fifty_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have won the lottery !Please log in to see the result</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $fifty_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Instant Winner')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['euroammount'] + $fifty_per;
                                        $uwqry = "UPDATE wallets SET euroammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have won the lottery !Please log in to see the result</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $fifty_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Instant Winner')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 1 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1 && ($commision_user[$i]['User']['cml'] == 'gold' || $commision_user[$i]['User']['cml'] == 'platinum')) {



                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,eurocommisions,created) VALUES('$comm_id','$chldid','$ten_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,euroammount) VALUES('$comm_id','$ten_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['euroammount'] + $ten_per;
                                        $uwqry = "UPDATE wallets SET euroammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 2 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1 && ($commision_user[$i]['User']['cml'] == 'gold' || $commision_user[$i]['User']['cml'] == 'platinum')) {



                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,eurocommisions,created) VALUES('$comm_id','$chldid','$ten_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,euroammount) VALUES('$comm_id','$ten_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['euroammount'] + $ten_per;
                                        $uwqry = "UPDATE wallets SET euroammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 3 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1 && ($commision_user[$i]['User']['cml'] == 'gold' || $commision_user[$i]['User']['cml'] == 'platinum')) {


                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,eurocommisions,created) VALUES('$comm_id','$chldid','$ten_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,euroammount) VALUES('$comm_id','$ten_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['euroammount'] + $ten_per;
                                        $uwqry = "UPDATE wallets SET euroammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 4 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1 && ($commision_user[$i]['User']['cml'] == 'gold' || $commision_user[$i]['User']['cml'] == 'platinum')) {


                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,eurocommisions,created) VALUES('$comm_id','$chldid','$ten_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,euroammount) VALUES('$comm_id','$ten_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['euroammount'] + $ten_per;
                                        $uwqry = "UPDATE wallets SET euroammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 5 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1 && ($commision_user[$i]['User']['cml'] == 'gold' || $commision_user[$i]['User']['cml'] == 'platinum')) {

                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,eurocommisions,created) VALUES('$comm_id','$chldid','$five_per',NOW())";
                                    $this->Commision->query($commision_data);

                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,euroammount) VALUES('$comm_id','$five_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $five_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['euroammount'] + $five_per;
                                        $uwqry = "UPDATE wallets SET euroammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $five_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 6 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1 && ($commision_user[$i]['User']['cml'] == 'gold' || $commision_user[$i]['User']['cml'] == 'platinum')) {


                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,eurocommisions,created) VALUES('$comm_id','$chldid','$five_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,euroammount) VALUES('$comm_id','$five_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision !</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $five_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['euroammount'] + $five_per;
                                        $uwqry = "UPDATE wallets SET euroammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision !</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $five_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        exit;
    }

    /**
     * cron job for result declear for PB
     */
    public function result_declear_pb() {


        //$this->lotteryno();
        require '../Vendor/Ganon/ganon.php';
        $document = file_get_dom('https://www.thelotter.com/lottery-results/usa-powerball');
        foreach ($document('option') as $option) {
            $optval['val'] = $option->getAttribute('value');
        }
        $a = file_get_dom('https://www.thelotter.com/lottery-results/usa-powerball/?DrawNumber=' . $optval["val"]);
        $str = $a('body')[0]->html();
        $re = "/data\\s:\\s\\[(.|[\\r\\n])*?\\]/";
        preg_match($re, $str, $matches);
        $d1 = ltrim($matches[0], "data : ");
        $jsond = json_decode(str_replace("'", '"', addcslashes($d1, '"')));

        $this->loadModel('Pbgrabresultlist');
        $this->Pbgrabresultlist->data['Pbgrabresultlist']['result'] = serialize($jsond);
        $this->Pbgrabresultlist->data['Pbgrabresultlist']['drawref'] = $optval['val'];
        $val_data = $this->Pbgrabresultlist->find('count', array('conditions' => array('Pbgrabresultlist.drawref' => $optval['val'])));

        if ($val_data == 0) {

            $this->Pbgrabresultlist->save($this->Pbgrabresultlist->data);
        }


        $this->loadModel('Pbwinnerlist');
        $data = $this->Pbwinnerlist->find('all', array('conditions' => array('Pbwinnerlist.ltryval' => $optval['val'])));
        $json_data = $this->Pbgrabresultlist->find('all', array('conditions' => array('Pbgrabresultlist.drawref' => $optval['val'])));
        $re_j_data = unserialize($json_data[0]['Pbgrabresultlist']['result']);

        if ($data) {

            foreach ($data as $d) {
                foreach ($re_j_data as $jd) {
                    $var_res_data = '<div class="divPaddingFormatter">' . $d["Pbwinnerlist"]["resdata"] . '</div>';


                    if ($var_res_data == $jd->GuessCountToDisplay) {
                        //winner
                        $win = $jd->LocalWinningAmountToDisplay;
                        $usid = $d['Pbwinnerlist']['uid'];

                        //mega winner
                        $mwin = $jd->LocalWinningAmountMultiplyToDisplay;
                        $draref = $optval['val'];
                        $this->loadModel('Pbfinalwinner');

                        $chk_d = $this->Pbfinalwinner->find('count', array('conditions' => array('AND' => array('Pbfinalwinner.drawref' => $optval['val'], 'Pbfinalwinner.uid' => $usid))));

                        if ($chk_d == 0) {
                            $this->loadModel('User');
                            $userdata = $this->User->find('first', array('conditions' => array('User.id' => $usid), 'recursive' => -1, 'fields' => array('User.email')));


                            preg_match_all("|<[^>]+>(.*)</[^>]+>|U", $win, $out, PREG_PATTERN_ORDER);
                            $data_doller = ltrim($out[1][0], '$');

                            $data_doller = str_replace(',', '', $data_doller);
                            // $data_doller=  $this->currency($from_Currency='EUR',$to_Currency='USD', $amount=$data_doller);

                            $this->loadModel('Wallet');
                            $this->loadModel('Commision');
                            $this->loadModel('Win');

                            $parent = $this->User->getPath($usid);
                            $commision_user = array_reverse($parent);

                            $fifty_per = $data_doller * 50 / 100;
                            $ten_per = $data_doller * 10 / 100;
                            $five_per = $data_doller * 5 / 100;


                            $qry = "INSERT INTO pbfinalwinners(uid,win,mwin,drawref,mybal,created) VALUES('$usid','$data_doller','$mwin','$draref','$fifty_per',NOW())";
                            $this->Pbfinalwinner->query($qry);

                            for ($i = 0; $i <= 6; $i++) {

                                $chldid = $commision_user[0]['User']['id'];

                                if ($i == 0 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1) {

                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    $commision_data = "INSERT INTO wins(user_id,child_user_id,amt,created) VALUES('$comm_id','$chldid','$fifty_per',NOW())";
                                    $this->Win->query($commision_data);
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$fifty_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have won the lottery !Please log in to see the result</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $fifty_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Instant Winner')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $fifty_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have won the lottery !Please log in to see the result</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $fifty_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Instant Winner')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 1 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1 && $commision_user[$i]['User']['cml'] == 'platinum') {



                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,commisions,created) VALUES('$comm_id','$chldid','$ten_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$ten_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $ten_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 2 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1 && $commision_user[$i]['User']['cml'] == 'platinum') {



                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,commisions,created) VALUES('$comm_id','$chldid','$ten_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$ten_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $ten_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 3 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1 && $commision_user[$i]['User']['cml'] == 'platinum') {


                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,commisions,created) VALUES('$comm_id','$chldid','$ten_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$ten_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $ten_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 4 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1 && $commision_user[$i]['User']['cml'] == 'platinum') {


                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,commisions,created) VALUES('$comm_id','$chldid','$ten_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$ten_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $ten_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $ten_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 5 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1 && $commision_user[$i]['User']['cml'] == 'platinum') {

                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,commisions,created) VALUES('$comm_id','$chldid','$five_per',NOW())";
                                    $this->Commision->query($commision_data);

                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$five_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $five_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $five_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision!</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $five_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                } else if ($i == 6 && !empty($commision_user[$i]['User']['username']) && $commision_user[$i]['User']['status'] == 1 && $commision_user[$i]['User']['cml'] == 'platinum') {


                                    $comm_id = $commision_user[$i]['User']['id'];
                                    $commision_data = "INSERT INTO commisions(user_id,child_user_id,commisions,created) VALUES('$comm_id','$chldid','$five_per',NOW())";
                                    $this->Commision->query($commision_data);
                                    $wall_user = $this->Wallet->find('first', array('conditions' => array('Wallet.user_id' => $comm_id)));
                                    if (empty($wall_user)) {
                                        $wqry = "INSERT INTO wallets(user_id,ammount) VALUES('$comm_id','$five_per')";
                                        $this->Wallet->query($wqry);
                                        $ms = "<p>You have got  the commision !</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $five_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    } else {

                                        $total_amt = $wall_user['Wallet']['ammount'] + $five_per;
                                        $uwqry = "UPDATE wallets SET ammount='$total_amt' where user_id='$comm_id'";
                                        $this->Wallet->query($uwqry);

                                        $ms = "<p>You have got  the commision !</p>";
                                        $ms .= "<p>Ammount:$</p><p>" . $five_per . "</p>";
                                        $l = new CakeEmail('smtp');
                                        $l->emailFormat('html')->template('default', 'default')->subject('Commision')
                                                ->to($commision_user[$i]['User']['email'])->send($ms);
                                        $this->set('smtp_errors', "none");
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        exit;
    }

    /**
     * brackege plus play the lottery for crone job 
     * first I will check the plydate time for lottries table =status =1
     * check the startdate and end date if this is grater than 3 months then status =0
     * in the joining time check the lotery software date then update the startdate and enddate and play date
     * start date will be lottery start date when software will be accept for playing the lottery 
     * enddate will be end of date of my lottery
     * play date for status 1 and 0
     * on the renew the lottery time start date end date and play date will be change if my membership has been expired the play date will be update 
     * else play date will be not renew 
     */
    public function brackage() {
        $this->loadModel('Playlott');
       
        $var = $this->Playlott->find('all');
        array_walk($var, function ($val, $index) {
        $date1 = date_create(date("Y-m-d"));
        $date2 = date_create($val['Playlott']['enddate']);
        $diff = date_diff($date2,$date1);
        $days = $diff->format("%r%a")."<br/>";
        if($days>=90)
        {
        $udata=$this->User->find('first',array('conditions'=>array('User.id'=>$val['Playlott']['uid'])));
          
       $this->User->updateAll(array('User.fname'=>'xxxxx','User.lname'=>'xxxxx','User.username'=>'xxxxx','User.cor'=>'xxxxx','User.cmt'=>'xxxxx','User.cml'=>'xxxxx','User.currency'=>'xxxxx','User.plan'=>'xxxxx','User.email'=>'xxxxx','User.password'=>'xxxxx','User.status'=>0),array('User.id'=>$udata['User']['id']));
           
        }
          
        });
        exit;
    }
     /**
     * crone job
     */
    public function date_chk(){
        
         $this->loadModel('Startlott');
        $startlott = $this->Startlott->find('first');
        $current_Date = date("Y-m-d");
        $end_Date = $startlott["Startlott"]["enddate"];
        $date1 = date_create($end_Date);
        $date2 = date_create($current_Date);
        $diff = date_diff($date1,$date2);
        $days = $diff->format("%r%a");
       
           if($days==0)  {
             $start_Date=$end_Date;
            $end_Date= date("Y-m-d", strtotime($end_Date. "+ 28 days"));   
            $t['Startlott']['startdate']=$start_Date;
            $t['Startlott']['enddate']=$end_Date;
            $this->Startlott->id=1;
            $this->Startlott->save($t);
            
        }
        
        exit;
     }
  /**
   * for activate the lottery
   */
  public function playdateset(){
      
      $this->loadModel('Playlott');
      $this->loadModel("Lottery");
      $data=$this->Playlott->find('all');
      foreach($data as $d){
        
      
      $current_Date = date("Y-m-d");
      $end_Date = $d["Playlott"]["playdate"];
      $date1 = date_create($end_Date);
      $date2 = date_create($current_Date);
      $diff = date_diff($date1,$date2);
      $days = $diff->format("%r%a")."</br>";
      
      if($days==0)
      {
          
            $t['Lottery']['active']=1;
            $t['Lottery']['status']=1;
            $uid=$d["Playlott"]["uid"];
            $this->Lottery->updateAll(array('Lottery.active'=>1,'Lottery.status'=>1),array('Lottery.user_id'=>$uid));
      }
      }

      exit;
          
  }
  /**
   * cron job for the upgrade membership date for lottery
   */
  public function playupdatedate(){
      $this->loadModel('Startlott');
      $this->loadModel('Playlott');
      $this->loadModel("Lottery");
      $data=$this->Playlott->find('all');
      $startlott = $this->Startlott->find('first');
      
      foreach($data as $d){
        
      
      $current_Date = date("Y-m-d");
      $end_Date = $d["Playlott"]["upgradedate"];
      if($end_Date){
      $date1 = date_create($end_Date);
      $date2 = date_create($current_Date);
      $diff = date_diff($date1,$date2);
      $days = $diff->format("%r%a")."</br>";
      
      if($days==0)
      {
         $startlott = $this->Startlott->find('first');
         $start_Date = $startlott["Startlott"]["startdate"];
         $end_Date = $startlott["Startlott"]["enddate"];
         $t['Playlott']['startdate']=$start_Date;
         $t['Playlott']['enddate']=$end_Date;
         $t['Playlott']['upgradedate']="0000-00-00";
         
            $this->Playlott->id=$d["Playlott"]["id"];
            
            
            $this->Playlott->save($t);
            
            $uid=$d["Playlott"]["uid"];
            $this->Lottery->updateAll(array('Lottery.active'=>1,'Lottery.status'=>1),array('Lottery.user_id'=>$uid));
            
         
      }
        }
      }

      exit;
          
  }


  /**
     * 
     * @param type $from_Currency
     * @param type $to_Currency
     * @param type $amount
     * @return type
     */
    function currency($from_Currency = 'EUR', $to_Currency = 'USD', $amount = '1') {
        $amount = urlencode($amount);
        $from_Currency = urlencode($from_Currency);
        $to_Currency = urlencode($to_Currency);
        $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
        $get = explode("<span class=bld>", $get);
        $get = explode("</span>", $get[1]);
        $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
        return $converted_amount;
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Lotteryresult->exists($id)) {
            throw new NotFoundException(__('Invalid lottery result'));
        }
        $options = array('conditions' => array('Lotteryresult.' . $this->Lotteryresult->primaryKey => $id));
        $this->set('lotteryresult', $this->Lotteryresult->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Lotteryresult->create();
            if ($this->Lotteryresult->save($this->request->data)) {
                $this->Session->setFlash(__('The lottery result has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The lottery result could not be saved. Please, try again.'));
            }
        }
        $lotteries = $this->Lotteryresult->Lottery->find('list');
        $this->set(compact('lotteries'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Lotteryresult->exists($id)) {
            throw new NotFoundException(__('Invalid lottery result'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Lotteryresult->save($this->request->data)) {
                $this->Session->setFlash(__('The lottery result has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The lottery result could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Lotteryresult.' . $this->Lotteryresult->primaryKey => $id));
            $this->request->data = $this->Lotteryresult->find('first', $options);
        }
        $lotteries = $this->Lotteryresult->Lottery->find('list');
        $this->set(compact('lotteries'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Lotteryresult->id = $id;
        if (!$this->Lotteryresult->exists()) {
            throw new NotFoundException(__('Invalid lottery result'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Lotteryresult->delete()) {
            $this->Session->setFlash(__('The lottery result has been deleted.'));
        } else {
            $this->Session->setFlash(__('The lottery result could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Lotteryresult->recursive = 0;
        $this->set('lotteryResults', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Lotteryresult->exists($id)) {
            throw new NotFoundException(__('Invalid lottery result'));
        }
        $options = array('conditions' => array('Lotteryresult.' . $this->Lotteryresult->primaryKey => $id));
        $this->set('lotteryresult', $this->Lotteryresult->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Lotteryresult->create();
            if ($this->Lotteryresult->save($this->request->data)) {
                $this->Session->setFlash(__('The lottery result has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The lottery result could not be saved. Please, try again.'));
            }
        }
        $lotteries = $this->Lotteryresult->Lottery->find('list');
        $this->set(compact('lotteries'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Lotteryresult->exists($id)) {
            throw new NotFoundException(__('Invalid lottery result'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Lotteryresult->save($this->request->data)) {
                $this->Session->setFlash(__('The lottery result has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The lottery result could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Lotteryresult.' . $this->Lotteryresult->primaryKey => $id));
            $this->request->data = $this->Lotteryresult->find('first', $options);
        }
        $lotteries = $this->Lotteryresult->Lottery->find('list');
        $this->set(compact('lotteries'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Lotteryresult->id = $id;
        if (!$this->Lotteryresult->exists()) {
            throw new NotFoundException(__('Invalid lottery result'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Lotteryresult->delete()) {
            $this->Session->setFlash(__('The lottery result has been deleted.'));
        } else {
            $this->Session->setFlash(__('The lottery result could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function payment() {
        if ($this->request->is("post")) {


            $url = 'https://test.api.neteller.com/netdirect';
            $fields = $this->request->data;

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

            $output = curl_exec($ch);
            $info = curl_getinfo($ch);
            $error = '';
            $approval = '';


            if (($output == false) or ($output == '')) {
                $curlerror = curl_error($ch);
                $error = 'Server Error. ';
            } else {
                $response = simplexml_load_string($output);
                $approval = $response->approval;
            }


            curl_close($ch);

            pr($response);

            $accessToken = $this->_netellerAccess();
        } else {
            
        }
    }

    /**
     * 
     */
    public function test() {
    
        $accessToken = $this->_netellerAccess();
        $data_string = '{
            "paymentMethod": {
                "type": "neteller",
                "value": "454651018446"
            },
            "transaction": {
                "merchantRefId": "2336'.time().'",
                "amount": 7000,
                "currency": "USD"
            },
            "verificationCode": "270955"
        }';
      
        $token = $accessToken['accessToken'];
        $curl = curl_init();
        $headers = array("Content-Type:application/json", "Cache-Control:no-cache", "Authorization: Bearer $token");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_URL, "https://test.api.neteller.com/v1/transferIn");
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        echo $serverOutput = curl_exec($curl);


        exit;
    }

    public function auth() {
        echo "ok ";
        exit;
    }

}


